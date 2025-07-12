<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.view', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'document' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $user->update($request->only('name', 'email', 'phone', 'address'));

        if ($request->hasFile('document')) {
            // Delete old document
            if ($user->document_path) {
                Storage::delete($user->document_path);
            }

            $path = $request->file('document')->store('documents');
            $user->document_path = $path;
            $user->save();
        }

        return redirect()->route('profile.view')->with('success', 'Profile updated successfully.');
    }
}

