<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Novo Livro</h2>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('livros.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            Livros
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 dark:text-gray-400">Novo</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>
    
    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Informações do Livro</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Preencha os dados do novo livro para cadastrá-lo na biblioteca</p>
            </div>
            
            <form method="POST" action="{{ route('livros.store') }}" class="px-6 py-6">
                @csrf
                <div class="space-y-6">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <x-input-label for="titulo" value="Título do Livro" />
                            <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" :value="old('titulo')" required autofocus placeholder="Digite o título do livro" />
                            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
                        </div>

                        <div>
                            <x-input-label for="ano_publicacao" value="Ano de Publicação" />
                            <x-text-input id="ano_publicacao" name="ano_publicacao" type="number" class="mt-1 block w-full" :value="old('ano_publicacao')" required placeholder="Ex: 2023" />
                            <x-input-error class="mt-2" :messages="$errors->get('ano_publicacao')" />
                        </div>

                        <div>
                            <x-input-label for="quantidade_disponivel" value="Quantidade Disponível" />
                            <x-text-input id="quantidade_disponivel" name="quantidade_disponivel" type="number" class="mt-1 block w-full" :value="old('quantidade_disponivel')" required placeholder="Ex: 5" />
                            <x-input-error class="mt-2" :messages="$errors->get('quantidade_disponivel')" />
                        </div>

                        <div>
                            <x-input-label for="genero" value="Gênero" />
                            <x-text-input id="genero" name="genero" type="text" class="mt-1 block w-full" :value="old('genero')" required placeholder="Ex: Romance, Ficção, Terror" />
                            <x-input-error class="mt-2" :messages="$errors->get('genero')" />
                        </div>

                        <div>
                            <x-input-label for="autor_id" value="Autor" />
                            <select id="autor_id" name="autor_id" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="">Selecione um autor</option>
                                @foreach($autores as $autor)
                                    <option value="{{ $autor->id }}" @selected(old('autor_id')==$autor->id)>{{ $autor->nome }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('autor_id')" />
                            @if($autores->isEmpty())
                                <p class="mt-2 text-sm text-amber-600 dark:text-amber-400">
                                    <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Nenhum autor cadastrado. <a href="{{ route('autores.create') }}" class="underline hover:no-underline">Cadastre um autor primeiro</a>.
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-end space-x-3">
                    <a href="{{ route('livros.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancelar
                    </a>
                    <x-primary-button>
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Salvar Livro
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
