<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $rules = [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ];

        if (!empty($user->password)) { // التحقق إذا كان المستخدم لديه كلمة مرور

            $rules['current_password'] = ['required', 'current_password'];
        }
        $validated = $request->validateWithBag('updatePassword', $rules);
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password Updated');
    }
}
