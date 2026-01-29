<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{

   public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

 
   public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

   


 public function update(Request $request, $id)
 {
     $user = User::findOrFail($id);
    
    $validated = $request->validate([
        'first_name' => ['required','string','max:255'],
        'middle_name' => ['nullable','string','max:255'],
        'surname' => ['required','string','max:255'],
        'extension' => ['nullable','string','max:50'],
        'email' => ['required','email','max:255', Rule::unique('users','email')->ignore($user->id)],
        'role' => ['required','integer'],
        'password' => ['nullable','confirmed','min:8'],
    ]);

    $user->first_name = $validated['first_name'];
    $user->middle_name = $validated['middle_name'] ?? null;
    $user->surname = $validated['surname'];
    $user->extension = $validated['extension'] ?? null;
    $user->email = $validated['email'];
    $user->role = $validated['role'];

    // Also update the name field (combined full name)
    $user->name = $this->buildFullName(
        $validated['first_name'],
        $validated['middle_name'] ?? null,
        $validated['surname'],
        $validated['extension'] ?? null
    );

    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }

    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
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
