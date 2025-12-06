@extends('layouts.app')

@section('title', 'Detall de tasca')

@section('content')
<div class="p-8 max-w-xl mx-auto bg-white shadow-lg border rounded-lg">
    <h1 class="text-2xl font-bold mb-4">{{ $task->name }}</h1>

    <p class="text-gray-700 mb-6">{{ $task->description }}</p>

    <!-- Recuperem la categoria a partir del model Task, no es necessari passar-li a la vista 
    ja que tal com hem definit el model ja incorpora les categories -->
    <p class="text-gray-700 mb-6">{{ $task->category->name ?? 'Sense categoria' }}</p>


    <a href="{{ route('tasks.index') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg shadow">
        Tornar
    </a>
</div>
@endsection
