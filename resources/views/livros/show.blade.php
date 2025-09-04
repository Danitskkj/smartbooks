<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Livro: {{ $livro->titulo }}</h2>
    </x-slot>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Informações do Livro -->
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Informações do Livro</h3>
            </div>
            <div class="px-6 py-4 space-y-3">
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Título:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100">{{ $livro->titulo }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Ano de Publicação:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100">{{ $livro->ano_publicacao }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Gênero:</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">{{ $livro->genero }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Autor:</span>
                    <a href="{{ route('autores.show', $livro->autor) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 text-sm font-medium">
                        {{ $livro->autor->nome }}
                    </a>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Quantidade Disponível:</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $livro->quantidade_disponivel > 0 ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                        {{ $livro->quantidade_disponivel }}
                    </span>
                </div>
            </div>
        </div>
        <!-- Empréstimos do Livro -->
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Histórico de Empréstimos</h3>
            </div>
            <div class="px-6 py-4">
                @if($livro->emprestimos->count() > 0)
                    <div class="space-y-3">
                        @foreach($livro->emprestimos as $emprestimo)
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8">
                                            <div class="h-8 w-8 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                                <span class="text-xs font-medium text-gray-700 dark:text-gray-300">
                                                    {{ substr($emprestimo->usuario->name, 0, 1) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $emprestimo->usuario->name }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $emprestimo->usuario->email }}</p>
                                        </div>
                                    </div>
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $emprestimo->status == 'devolvido' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                                        {{ ucfirst($emprestimo->status) }}
                                    </span>
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    Retirada: {{ \Carbon\Carbon::parse($emprestimo->data_retirada)->format('d/m/Y H:i') }}
                                    @if($emprestimo->data_devolucao)
                                        | Devolução: {{ \Carbon\Carbon::parse($emprestimo->data_devolucao)->format('d/m/Y H:i') }}
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center py-8">Nenhum empréstimo registrado para este livro.</p>
                @endif
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('livros.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                ← Voltar para Livros
            </a>
        </div>
    </div>
</x-app-layout>
