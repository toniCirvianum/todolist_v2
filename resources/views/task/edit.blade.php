@extends('layouts.app')

@section('title', 'Editar tasca')

@section('content')
<div class="p-8 max-w-xl mx-auto bg-white shadow-lg border rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Editar tasca</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="font-semibold">Nom</label>
            <input type="text" name="name" value="{{ $task->name }}"
                class="w-full border rounded-lg shadow-sm">
        </div>

        <div>
            <label class="font-semibold">Descripció</label>
            <textarea name="description" rows="4"
                class="w-full border rounded-lg shadow-sm">{{ $task->description }}</textarea>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:underline">Cancel·lar</a>

            <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold py-2 px-4 rounded-lg shadow">
                Actualitzar
            </button>
        </div>
    </form>
</div>
@endsection
