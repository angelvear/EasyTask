<x-app-layout>
    <x-slot name="header">
            <a href="{{ url()->previous() }}" class="uppercase text-md px-4 py-2 text-white border border-blue-700 hover:border-blue-500 rounded bg-blue-700 hover:bg-blue-500">
                Atrás
            </a>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-4">
                {{ __('Código para compartir: ') }} {{ $groups->share }}
            </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 bg-white shadow-sm sm:rounded-lg">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Tareas</th>
                                <th class="px-4 py-2">Estado</th>
                                <th class="px-4 py-2">Fecha Límite</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="border px-4 py-2">{{ $task->titulo }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $task->estatus }}</td>
                                    <td class="border px-4 py-2">{{ $task->fecha_limite }}</td>
                                    <td class="border px-4 py-2"><a href="{{ route('tasks.delete', $task->tarea_id) }}" class="text-red-500 hover:bg-red-700 hover:text-white border border-red-500 p-2 rounded">Eliminar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</x-app-layout>
