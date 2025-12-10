<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'profiles'  => Profile::count(),
            'skills'    => Skill::count(),
            'projects'  => Project::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
