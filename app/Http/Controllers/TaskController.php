<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task.view', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); 
        return view('task.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $taskValidated = $request->validate(
            [
                'name' => 'required|min:3|max:10',
                'description' => 'nullable|max:500',
                'category_id' => 'string'
            ],
            [   //exemple de personalització dels errors de validació
                'name.required' => 'El nom de la tasca és obligatori.',
                'name.min' => 'El nom ha de tenir com a mínim 3 caràcters.',
                'name.max' => 'El nom no pot superar els 10 caràcters.',
                'description.max' => 'La descripció no pot superar els 500 caràcters.',
            ]
        );


        Task::create($taskValidated);

        return redirect()->route('tasks.index')->with('success', 'Tasca creada correctament');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //recuperem l'objecte categoria associat a category_id
        $category = $task->category();
        
        return view('task.show', compact('task','category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Validació
        $taskValidated = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|max:500',
        ], [
            'name.required' => 'El nom de la tasca és obligatori.',
            'name.min'      => 'El nom ha de tenir com a mínim 3 caràcters.',
            'name.max'      => 'El nom no pot superar els 255 caràcters.',
            'description.max' => 'La descripció no pot superar els 500 caràcters.',
        ]);

        // Actualitzar la tasca amb les dades validades
        $task->update($taskValidated);

        // Tornar a l’índex amb missatge d’èxit
        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tasca actualitzada correctament!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tasca eliminada correctament!');
    }
}
