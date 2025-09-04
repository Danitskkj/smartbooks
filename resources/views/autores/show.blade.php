<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $autor->nome }}</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Informações do Autor -->
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Informações do Autor</h3>
            </div>
            <div class="px-6 py-4 space-y-3">
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Nome:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100">{{ $autor->nome }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Nacionalidade:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100">{{ $autor->nacionalidade }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Ano de Nascimento:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-100">{{ $autor->ano_nascimento }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Total de Livros:</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        {{ $autor->livros()->count() }} livros
                    </span>
                </div>
            </div>
        </div>

        <!-- Livros do Autor -->
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Livros Cadastrados</h3>
            </div>
            <div class="px-6 py-4">
                @if($autor->livros->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($autor->livros as $livro)
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                                <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">{{ $livro->titulo }}</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Ano: {{ $livro->ano_publicacao }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Gênero: {{ $livro->genero }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $livro->quantidade_disponivel > 0 ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                        {{ $livro->quantidade_disponivel }} disponível
                                    </span>
                                    <a href="{{ route('livros.show', $livro) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 text-xs font-medium">
                                        Ver detalhes →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center py-8">Nenhum livro cadastrado para este autor.</p>
                @endif
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('autores.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                ← Voltar para Autores
            </a>
        </div>
    </div>
</x-app-layout>
