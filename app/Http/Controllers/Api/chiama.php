<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class chiama extends Controller
{
    function index(){
        $projects = Project::with('type', 'technologies')->paginate('8');
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);

    }

    function show($slug){
        $projects = Project::with('type', 'technologies')->where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);

    }
}
