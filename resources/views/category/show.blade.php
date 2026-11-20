@extends('layouts.app')

@section('title', 'Llista de categories')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 border border-green-300 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Llista de categories</h1>
    </div>

    <table class="min-w-full bg-white border border-gray-300 shadow-xl rounded-lg overflow-hidden">
        <thead class="bg-blue-700 text-white border-b border-gray-300">
            <tr>
                <th class="py-3 px-4 text-left border-r border-blue-500">Nom de la categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr class="even:bg-gray-50 odd:bg-white hover:bg-blue-100 transition-colors border-b border-gray-200">
                <td class="py-3 px-4 border-r border-gray-200">{{$category->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
 <div class="mt-4">
        <a href="{{ route('tasks.index') }}"
           class="inline-block bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg shadow">
            Tornar
        </a>
    </div>
</div>


@endsection