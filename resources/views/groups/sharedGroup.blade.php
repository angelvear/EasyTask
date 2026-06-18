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
                    Unirme al grupo
                </div> 
            </div> 

            <div class="p-6 text-gray-900 bg-white shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{ route('groups.join') }}">
                        @csrf
                        @method('POST')

                        <div class="mb-4">
                            <x-input-label for="key" :value="__('Key del grupo')" />
                            <x-text-input id="key" class="block mt-1 w-full" type="text" name="key" required autofocus />
                            <x-input-error :messages="$errors->get('key')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Unirme al grupo') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</x-app-layout>
