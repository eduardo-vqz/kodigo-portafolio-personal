<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile  = Profile::first(); // sistema personal: un solo perfil
        $skills   = Skill::orderBy('category')->orderBy('name')->get();
        $projects = Project::orderByDesc('is_featured')
                           ->orderByDesc('project_date')
                           ->get();

        return view('portfolio.index', compact('profile', 'skills', 'projects'));
    }
}
