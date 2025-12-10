<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
            'name'     => 'required|string|max:255',
            'title'    => 'nullable|string|max:255',
            'bio'      => 'nullable|string',
            'email'    => 'required|email|max:255',
            'github'   => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $profile = Profile::first() ?? new Profile();

        $profile->fill($request->only([
            'name',
            'title',
            'bio',
            'email',
            'github',
            'linkedin',
        ]));

        if ($request->hasFile('photo')) {
            // Borrar foto anterior si existe
            if ($profile->photo && Storage::disk('public')->exists($profile->photo)) {
                Storage::disk('public')->delete($profile->photo);
            }

            // Guardar nueva foto en storage/app/public/profile_photos
            $path = $request->file('photo')->store('profile_photos', 'public');
            $profile->photo = $path;
        }

        $profile->save();

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Perfil actualizado correctamente.');
    }
}
