<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4"> Olá <strong>{{ Auth::user()->name }}</strong></p>
                </div>
            </div>

            <div class=" overflow-hidden shadow-sm sm:rounded-lg mt-4 grid">

                <div class="bg-white p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Clientes Cadastrados:  {{count($clientes)}}</p>
                </div>

                <div class="bg-white p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Usuários Cadastrados: {{count($users)}}}</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
