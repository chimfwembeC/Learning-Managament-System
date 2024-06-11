<?php

namespace App\Http\Controllers;

use App\Models\Quizze;
use Illuminate\Http\Request;
use Inertia\Inertia;
class QuizzeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $quizzes = Quizze::latest()->get();

        return Inertia::render("Admin/Quizzes/Index",[
            'quizzes' => $quizzes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' =>'required',
            'description' =>'required',
        ]);

        $quizze = Quizze::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'quiz created successfully',
            'quiz' => $quizze
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quizze $quizze)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quizze $quizze)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quizze $quizze)
    {
        //
        $request->validate([
            'title' =>'required',
            'description' =>'required',
        ]);

        $quizze->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
           'message' => 'quiz updated successfully',
            'quiz' => $quizze
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quizze $quizze)
    {
        //
        $quizze->delete();
        return response()->json([
            'message' => 'quiz deleted successfully',
             'quiz' => $quizze
         ]);
    }
}
