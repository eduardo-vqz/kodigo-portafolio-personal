<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first(); // sistema personal
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'title'  => 'required|string|max:255',
            'bio'    => 'required',
            'email'  => 'required|email',
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $profile = Profile::first();

        if (!$profile) {
            $profile = new Profile();
        }

        $profile->fill($request->only('name','title','bio','email','github','linkedin'));
        $profile->save();

        return redirect()->route('admin.profile.edit')
                         ->with('success', 'Perfil actualizado correctamente.');
    }
}
