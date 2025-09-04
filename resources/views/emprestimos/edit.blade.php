<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Editar Empréstimo</h2>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('emprestimos.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            Empréstimos
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
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Editar Empréstimo</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Atualize as informações do empréstimo</p>
            </div>
            
            <form method="POST" action="{{ route('emprestimos.update', $emprestimo) }}" class="px-6 py-6">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div>
                        <x-input-label for="livro_id" value="Livro" />
                        <select id="livro_id" name="livro_id" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            @foreach($livros as $livro)
                                <option value="{{ $livro->id }}" @selected(old('livro_id', $emprestimo->livro_id)==$livro->id)>
                                    {{ $livro->titulo }} ({{ $livro->autor->nome }}) - {{ $livro->quantidade_disponivel }} disponível(is)
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('livro_id')" />
                    </div>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <x-input-label for="data_retirada" value="Data de Retirada" />
                            <x-text-input id="data_retirada" name="data_retirada" type="date" class="mt-1 block w-full" :value="old('data_retirada', $emprestimo->data_retirada)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('data_retirada')" />
                        </div>

                        <div>
                            <x-input-label for="data_devolucao" value="Data de Devolução" />
                            <x-text-input id="data_devolucao" name="data_devolucao" type="date" class="mt-1 block w-full" :value="old('data_devolucao', $emprestimo->data_devolucao)" />
                            <x-input-error class="mt-2" :messages="$errors->get('data_devolucao')" />
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Deixe em branco se ainda não foi devolvido</p>
                        </div>
                    </div>

                    <div>
                        <x-input-label for="status" value="Status do Empréstimo" />
                        <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="pendente" @selected(old('status', $emprestimo->status)=='pendente')>
                                Pendente (Livro não foi devolvido)
                            </option>
                            <option value="devolvido" @selected(old('status', $emprestimo->status)=='devolvido')>
                                Devolvido (Livro já foi devolvido)
                            </option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
                    </div>

                    <div>
                        <x-input-label for="user_id" value="Usuário" />
                        <select id="user_id" name="user_id" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="">Selecione um usuário</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" @selected(old('user_id', $emprestimo->user_id)==$usuario->id)>
                                    {{ $usuario->name }} ({{ $usuario->email }})
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Criado em: {{ $emprestimo->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-end space-x-3">
                    <a href="{{ route('emprestimos.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancelar
                    </a>
                    <x-primary-button>
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Atualizar Empréstimo
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
