<!doctype html>
<html>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>

    <body>
        <nav class="bg-gray-300">
            <div class="container mx-auto flex items-center justify-between p-4">
                <a href="/" class="text-2xl font-semibold">TreinaWeb</a>

                <ul class="font-medium flex">
                    <li class="px-4"> <a href="{{ route('clientes.index') }}" class="font-semibold">Lista de Clientes</a></li>
                </ul>
            </div>
        </nav>

        <div class="container mx-auto">
            <h1 class="text-4xl font-bold text-center my-4">
                {{ $title }}
            </h1>
             <!-- tratamento de erros de validação -->
            @if ($errors->any())
                <div id="error-alert" class="mb-6 rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-700 dark:border-red-700 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <div class="flex items-center gap-2 mb-2">
                        <!-- Ícone -->
                        <svg class="h-5 w-5 shrink-0 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="font-semibold">Erros de Validação:</span>
                    </div>

                    <ul class="list-disc list-inside space-y-1 pl-1">
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- conteudo da pagina --}}
            @if (session('success'))
                <div id="success-alert" class="mb-6 rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-700 dark:border-green-700 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <div class="flex items-center gap-2 mb-2">
                        <!-- Ícone -->
                        <svg class="h-5 w-5 shrink-0 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM8.75 14.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm-.75-2.25a1.25 1.25 0 1 1 0-2.5A1.25 1.25 0 0 1 8 12Zm3.75-.25a.75.75 0 1 1 .75-.75v-.5a2.25 2.25 0 1 0-4.5-.001V11a.75.75 0 1 1-1.5-.001v-.5a3.75 3.75 0 1 1 7.5-.001V11a2.25 2.25 0 0 1-2.25 2.25Z" />
                        </svg>
                        <span class="font-semibold">Sucesso:</span>
                    </div>

                    <p>{{ session('success') }}</p>
                </div>
            @endif
            {{ $slot }}

        </div>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        @if (session('success'))
            <script>
                setTimeout(() => {
                    document.getElementById('success-alert')?.remove();
                }, 5000);
            </script>
        @endif
        @if ($errors->any())
            <script>
                setTimeout(() => {
                    document.getElementById('error-alert')?.remove();
                }, 10000);
            </script>
        @endif
    </body>
</html>
