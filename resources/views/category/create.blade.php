@extends('layouts.app')

@section('title', 'Crear categoria')

@section('content')
<div class="p-8 max-w-xl mx-auto">

    <div class="bg-white border border-gray-200 shadow-xl rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Crear nova categoria</h1>

        {{-- Missatges d’errors --}}
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg">
                <ul class="list-disc pl-6">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulari --}}
        <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nom de la categoria --}}
            <div>
                <label for="name" class="block font-semibold mb-1 text-gray-700">Nom de la categoria</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Botons --}}
            <div class="flex justify-end space-x-3">
                <a href="{{ url()->previous() }}"
                   class="text-gray-600 hover:text-gray-800 hover:underline">
                    Cancel·lar
                </a>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow hover:shadow-lg transition">
                    Guardar categoria
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

