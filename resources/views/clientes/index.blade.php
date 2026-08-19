
<x-layout title="Lista de Clientes">
    <div class="flex justify-end my-3">
        <a href="{{ route('clientes.create') }}" class="bg-blue-500 border rounded-md p-2 px-3 text-white">Novo Cliente</a>
    </div>

    <div class="relative overflow-x-auto">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Endereço
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Descrição
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Projetos
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Ação
                    </th>
                </tr>
            </thead>
            
            <tbody>
                @forelse ($clientes as $cliente)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4"> {{ $cliente->nome }} </th>
                    <td class="px-6 py-4"> {{ $cliente->endereco }} </td>
                    <td class="px-6 py-4"> {{ $cliente->descricao }} </td>
                    <td class="px-6 py-4"> 
                        @forelse ($cliente->projects as $project)
                            <p>{{ $project->nome }}</p>
                        @empty
                            Nenhum projeto encontrado
                        @endforelse
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                            <button id="dropdownActionButton-{{ $cliente->id }}" data-dropdown-toggle="dropdownAction-{{$cliente->id }}"
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                type="button">
                                <span class="sr-only">Action button</span>
                                Ações
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownAction-{{ $cliente->id }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownActionButton">
                                    <li>
                                        <a href="{{ route('clientes.edit', ['id' => $cliente->id]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editar</a>
                                    </li>
                                    <li>
                                        <form method="post" action="{{ route('clientes.destroy', ['id' => $cliente->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="block w-full px-4 py-2 text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Deletar</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center">Nenhum cliente encontrado</td>
                </tr>
                @endforelse
            </tbody>
            

        </table>
        <div class="my-4">
            {{ $clientes->links() }}
        </div>
        
    </div>
</x-layout>