<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div class="text-center mb-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Criar Conta</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Registre-se para começar</p>
        </div>

        <div>
            <x-input-label for="name" value="Nome Completo" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
            <x-text-input id="name"
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm" />
        </div>

        <div>
            <x-input-label for="email" value="Email" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
            <x-text-input id="email"
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" />
        </div>

        <div>
            <x-input-label for="password" value="Senha" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
            <x-text-input id="password"
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                type="password"
                name="password"
                required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" />
        </div>

        <div>
            <x-input-label for="password_confirmation" value="Confirmar Senha" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
            <x-text-input id="password_confirmation"
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm" />
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                Cadastrar
            </button>
        </div>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Já tem conta?
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 font-medium">
                    Entrar
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
