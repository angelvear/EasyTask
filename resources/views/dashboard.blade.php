<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grupos creados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        <a href="{{ route('groups.form') }}" class="text-white">Nuevo grupo</a>
                    </button>
                </div>

                <div class="p-6 text-gray-900 bg-white shadow-sm sm:rounded-lg">
                    <table class="table-auto w-full border-none border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-start border-none "></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                                <tr class="border border-gray-200">
                                    <td class="border px-4 py-2 border-none">{{ $group->titulo }}</td>
                                    <td class="border px-4 py-2 border-none"><a href="{{ route('tasks.view', $group->id) }}" class="text-blue-500 hover:bg-blue-700 hover:text-white border border-blue-500 p-2 rounded">ver tareas</a></td>
                                    <td class="border px-4 py-2 border-none"><a href="{{ route('tasks.create', $group->id) }}" class="text-blue-500 hover:bg-blue-700 hover:text-white border border-blue-500 p-2 rounded">crear tarea</a></td>
                                    <td class="border px-4 py-2 border-none"><a href="{{ route('groups.delete', $group->id) }}" class="text-red-500 hover:bg-red-700 hover:text-white border border-red-500 p-2 rounded">Eliminar</a></td>
                                </tr>
                                <tr class="border-none">
                                    <td class="border px-4 py-2 border-none"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</x-app-layout>
