<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        // No need for separate terms page - terms checkbox is on the register form
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'extension' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => ['required', 'accepted'],
        ], [
            'terms.required' => 'You must agree to the Terms of Service and Privacy Policy.',
            'terms.accepted' => 'You must agree to the Terms of Service and Privacy Policy.',
        ]);

        // Build the full name from parts
        $fullName = $this->buildFullName(
            $request->first_name,
            $request->middle_name,
            $request->surname,
            $request->extension
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
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'surname' => $request->surname,
            'extension' => $request->extension,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1, // Default role for applicants
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('user.index')->with('success', 'Registration successful! Welcome to CLSU ETEEAP.');
    }

    /**
     * Build full name from parts.
     */
    private function buildFullName($firstName, $middleName, $surname, $extension): string
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