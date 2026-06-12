<x-app-layout>
    <x-slot name="header">
        <x-back-button class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ url()->previous() }}">Back</a>
        </x-back-button>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</x-app-layout>
