@extends('layouts.app')

@section('title', 'Crear nova tasca')

@section('content')
<div class="p-8 max-w-xl mx-auto">

    <div class="bg-white border border-gray-200 shadow-xl rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Crear nova tasca</h1>

        {{-- MISSATGES D’ERROR --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg">
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORMULARI --}}
        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- NOM --}}
            <div>
                <label for="name" class="block font-semibold mb-1 text-gray-700">Nom de la tasca</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- DESCRIPCIÓ --}}
            <div>
                <label for="description" class="block font-semibold mb-1 text-gray-700">Descripció</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
            </div>

            {{-- BOTONS --}}
            <div class="flex justify-end space-x-3">
                <a href="{{ route('tasks.index') }}"
                   class="px-4 py-2 rounded-lg text-gray-600 hover:text-gray-800 hover:underline">
                    Cancel·lar
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow hover:shadow-lg transition">
                    Guardar tasca
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
