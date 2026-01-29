<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
   
    public function index()
    {
        $applications = ApplicationForm::with('user')->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('user.index', compact('applications'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

 
    public function update(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'surname' => 'required|string|max:255',
            'extension' => 'nullable|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->first_name = $validated['first_name'];
        $user->middle_name = $validated['middle_name'] ?? null;
        $user->surname = $validated['surname'];
        $user->extension = $validated['extension'] ?? null;
        $user->email = $validated['email'];

        // Also update the name field
        $user->name = $this->buildFullName(
            $validated['first_name'],
            $validated['middle_name'] ?? null,
            $validated['surname'],
            $validated['extension'] ?? null
        );

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        try {
            $user->save();
            Session::flash('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            Session::flash('error', 'An error occurred while updating the profile.');
        }

        return redirect()->route('user.profile.edit');
    }

    /**
     * Show the registration form.
     */
    public function create(Request $request)
    {
        if (!$request->has('agree')) {
            return redirect()->route('terms')->with('error', 'You must agree to the terms and conditions before registering.');
        }

        return view('auth.register');
    }

    /**
     * Handle the registration request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'extension' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required', 'accepted'],
        ]);

        // Build the full name from parts
        $fullName = $this->buildFullName(
            $validated['first_name'],
            $validated['middle_name'] ?? null,
            $validated['surname'],
            $validated['extension'] ?? null
        );

        // Generate unique_id (format: YYYYMMDD + 3-digit sequence)
        $today = now()->format('Ymd');
        $lastUser = User::where('unique_id', 'like', $today . '%')
            ->orderBy('unique_id', 'desc')
            ->first();
        
        if ($lastUser && $lastUser->unique_id) {
            $lastSequence = (int) substr($lastUser->unique_id, -3);
            $newSequence = str_pad($lastSequence + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newSequence = '001';
        }
        $uniqueId = $today . $newSequence;

        $user = User::create([
            'unique_id' => $uniqueId,
            'name' => $fullName,
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'] ?? null,
            'surname' => $validated['surname'],
            'extension' => $validated['extension'] ?? null,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 1, // Default role for applicants
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('user.index')->with('success', 'Registration successful! Welcome to CLSU ETEEAP.');
    }

    /**
     * Build full name from parts.
     */
    private function buildFullName($firstName, $middleName, $surname, $extension)
    {
        $nameParts = [$firstName];
        
        if ($middleName) {
            $nameParts[] = $middleName;
        }
        
        $nameParts[] = $surname;
        
        if ($extension) {
            $nameParts[] = $extension;
        }
        
        return implode(' ', $nameParts);
    }
}