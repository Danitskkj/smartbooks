<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Empréstimo: {{ $emprestimo->livro->titulo }}</h2>
    </x-slot>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Informações do Empréstimo -->
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Informações do Empréstimo</h3>
            </div>
            <div class="px-6 py-4 space-y-3">
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Livro:</span>
                    <a href="{{ route('livros.show', $emprestimo->livro) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 text-sm font-medium">
                        {{ $emprestimo->livro->titulo }}
                    </a>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Autor:</span>
                    <a href="{{ route('autores.show', $emprestimo->livro->autor) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 text-sm font-medium">
                        {{ $emprestimo->livro->autor->nome }}
                    </a>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Usuário:</span>
                    <div class="text-sm text-gray-900 dark:text-gray-100">
                        <div class="flex flex-col items-end">
                            <div class="font-medium">{{ $emprestimo->usuario->name }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $emprestimo->usuario->email }}</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Data de Retirada:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100">{{ \Carbon\Carbon::parse($emprestimo->data_retirada)->format('d/m/Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Data de Devolução:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100">
                        @if($emprestimo->data_devolucao)
                            {{ \Carbon\Carbon::parse($emprestimo->data_devolucao)->format('d/m/Y') }}
                        @else
                            <span class="text-yellow-600 dark:text-yellow-400 font-medium">Não devolvido</span>
                        @endif
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Status:</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        {{ ucfirst($emprestimo->status) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Outros Empréstimos do Usuário -->
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Outros Empréstimos do Usuário</h3>
            </div>
            <div class="px-6 py-4">
                @php
                    $outrosEmprestimos = $emprestimo->usuario && $emprestimo->usuario->emprestimos 
                        ? $emprestimo->usuario->emprestimos->where('id', '!=', $emprestimo->id) 
                        : collect();
                @endphp
                @if($outrosEmprestimos->count() > 0)
                    <div class="space-y-3">
                        @foreach($outrosEmprestimos->take(5) as $outroEmprestimo)
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center">
                                        <a href="{{ route('livros.show', $outroEmprestimo->livro) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 font-medium">
                                            {{ $outroEmprestimo->livro->titulo }}
                                        </a>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 ml-2">por {{ $outroEmprestimo->livro->autor->nome }}</span>
                                    </div>
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $outroEmprestimo->status == 'devolvido' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' }}">
                                        {{ ucfirst($outroEmprestimo->status) }}
                                    </span>
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    Retirada: {{ \Carbon\Carbon::parse($outroEmprestimo->data_retirada)->format('d/m/Y') }}
                                    @if($outroEmprestimo->data_devolucao)
                                        | Devolução: {{ \Carbon\Carbon::parse($outroEmprestimo->data_devolucao)->format('d/m/Y') }}
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center py-8">Este é o único empréstimo deste usuário.</p>
                @endif
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('emprestimos.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                ← Voltar para Empréstimos
            </a>
        </div>
    </div>
</x-app-layout>
