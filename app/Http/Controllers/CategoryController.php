<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Task;

class CategoryController extends Controller
{
    public function store(Request $request)
    {

        $categoryValidated =$request->validate([
            'name' => 'required|min:3|max:10',
        ], [
            'name.required' => 'El nom de la categoria és obligatori.',
            'name.min'      => 'El nom ha de tenir com a mínim 3 caràcters.',
            'name.max'      => 'El nom no pot superar els 10 caràcters.',
        ]);

        Category::create($categoryValidated);

        return redirect()
            ->route('tasks.index')       //torna a mostrar totes les tasques 
            ->with('success', 'Tasca creada correctament!');
    }

    public function create() {
        return view ('category.create');
    }
}
