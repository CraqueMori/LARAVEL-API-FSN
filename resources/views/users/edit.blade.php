<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edição do Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Editando o Nivel de acesso do usuário <strong>{{$user->name}}</strong></p>
                    <p class="mb-4">Nivel de Acesso atual: <strong> {{ $user->level }}</strong></p>
                </div>

                <div class="p-6 text-gray-900">
                    <form action="{{route('users.update', $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="level">Selecione o Nivel</label>
                        <select name="level" id="" required class="py-1 px-8" rounded>
                            <option value="" selected disabled>Selecione uma opção </option>
                            <option value="user">Commun</option>
                            <option value="admin">ADM</option>

                        </select>
                        <button type="submit" class="bg-red-600  text-white rounded py-2 px-4">Salvar Alterações</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
