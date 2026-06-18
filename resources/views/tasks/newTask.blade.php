<x-app-layout>
    <x-slot name="header">
        <a href="{{ url()->previous() }}" class="uppercase text-md px-4 py-2 text-white border border-blue-700 hover:border-blue-500 rounded bg-blue-700 hover:bg-blue-500">
            Atrás
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 text-gray-900">
                    Nueva tarea
                </div> 
            </div> 

            <div class="p-6 text-gray-900 bg-white shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{ route('tasks.save', ['groupId' => $group->id]) }}">
                        @csrf
                        @method('POST')

                        <div class="mb-4">
                            <x-input-label for="titulo" :value="__('nombre de la tarea')" />
                            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" required autofocus />
                            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="estado" :value="__('Estado')" />
                            <dropdown class="block mt-1 w-full" required>
                                <select name="estado" id="estado" class="block mt-1 w-full">
                                    <option value="pendiente">Pendiente</option>
                                    <option value="en_progreso">En progreso</option>
                                    <option value="completada">Completada</option>
                                </select>
                            </dropdown>
                            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="deadline" :value="__('Fecha límite')" />
                            <x-text-input id="deadline" class="block mt-1 w-full" type="date" name="deadline" required />
                            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Crear tarea') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</x-app-layout>
