<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = Project::all();

        $projects = Project::with("type", "technologies")->paginate(4);

        $response = [
            "success" => true,
            "results" => $projects
        ];

        return response()->json($response);
    }

    public function show($id) {

        $project = Project::with("type", "technologies")->find($id);
        
        $response = [
            "success" => true,
            "results" => $project
        ];

        return response()->json($response);

    }
}
