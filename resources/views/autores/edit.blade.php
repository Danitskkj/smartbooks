<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Editar Autor</h2>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('autores.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            Autores
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 dark:text-gray-400">Editar</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>
    
    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Editar Informações do Autor</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Atualize os dados do autor "{{ $autor->nome }}"</p>
            </div>
            
            <form method="POST" action="{{ route('autores.update', $autor) }}" class="px-6 py-6">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div>
                        <x-input-label for="nome" value="Nome Completo" />
                        <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" :value="old('nome', $autor->nome)" required autofocus placeholder="Digite o nome completo do autor" />
                        <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                    </div>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <x-input-label for="nacionalidade" value="Nacionalidade" />
                            <x-text-input id="nacionalidade" name="nacionalidade" type="text" class="mt-1 block w-full" :value="old('nacionalidade', $autor->nacionalidade)" required placeholder="Ex: Brasileira, Americana" />
                            <x-input-error class="mt-2" :messages="$errors->get('nacionalidade')" />
                        </div>

                        <div>
                            <x-input-label for="ano_nascimento" value="Ano de Nascimento" />
                            <x-text-input id="ano_nascimento" name="ano_nascimento" type="number" class="mt-1 block w-full" :value="old('ano_nascimento', $autor->ano_nascimento)" required placeholder="Ex: 1965" />
                            <x-input-error class="mt-2" :messages="$errors->get('ano_nascimento')" />
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-end space-x-3">
                    <a href="{{ route('autores.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancelar
                    </a>
                    <x-primary-button>
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Atualizar Autor
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
