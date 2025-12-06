@extends('layouts.app')

@section('title', 'Llista de tasques')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 border border-green-300 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Llista de tasques</h1>
        <div class="flex gap-3">
            <a href="{{ route('categories.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow hover:shadow-lg transition">
                + Crear categoria
            </a>

            <a href="{{ route('tasks.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow hover:shadow-lg transition">
                + Crear tasca
            </a>
        </div>
    </div>

    <table class="min-w-full bg-white border border-gray-300 shadow-xl rounded-lg overflow-hidden">
        <thead class="bg-blue-700 text-white border-b border-gray-300">
            <tr>
                <th class="py-3 px-4 text-left border-r border-blue-500">Nom de la tasca</th>
                <th class="py-3 px-4 text-left border-r border-blue-500">Descripció</th>
                <th class="py-3 px-4 text-center font-semibold">Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr class="even:bg-gray-50 odd:bg-white hover:bg-blue-100 transition-colors border-b border-gray-200">
                <td class="py-3 px-4 border-r border-gray-200">{{$task->name}}</td>
                <td class="py-3 px-4">{{$task->description}}</td>

                <td class="py-3 px-4 text-center space-x-2 flex justify-center">

                    {{-- BOTÓ DETALL --}}
                    <a href="{{ route('tasks.show', $task->id) }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white py-1 px-3 rounded-lg shadow transition">
                        Detall
                    </a>

                    {{-- BOTÓ EDITAR --}}
                    <a href="{{ route('tasks.edit', $task->id) }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-1 px-3 rounded-lg shadow transition">
                        Editar
                    </a>

                    {{-- BOTÓ ELIMINAR --}}
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                        onsubmit="return confirm('Segur que vols eliminar aquesta tasca?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-lg shadow transition">
                            Esborrar
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection