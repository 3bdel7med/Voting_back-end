<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|image|max:2048', // Validate the image
        ]);

    // Save the image and get the file path
    $imagePath = $request->file('image')->store('public/images');

    // Create a new resource
    $skill = Skill::create([
        'name' => $validatedData['name'],
        'file' => $imagePath, // Store the image path
    ]);

    // Return the created resource as a JSON response
    return response()->json($skill, 201);

    }
}
