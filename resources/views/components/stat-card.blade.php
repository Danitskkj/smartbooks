@props(['title', 'value', 'icon', 'color' => 'blue'])

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 bg-{{ $color }}-100 dark:bg-{{ $color }}-900 rounded-lg flex items-center justify-center">
                    {{ $icon }}
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ $title }}</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $value }}</p>
            </div>
        </div>
    </div>
</div>
