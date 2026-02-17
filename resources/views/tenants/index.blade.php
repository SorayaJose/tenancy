<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inquilinos
        </h2>
    </x-slot>

    <x-container class="py-6">
        @if(session('success'))
            <div class="mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-6">
            <a href="{{ route('tenants.create') }}" class="btn btn-blue">
                Nuevo
            </a>
        </div>


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Dominio
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                   
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tenants as $tenant)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $tenant->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $tenant->domains->first()->domain ?? '' }}
                    </td>
                    <td class="px-6 py-4">
                        @if($tenant->delegated_to_cloud)
                            <span class="px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded">
                                Delegado a la nube
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold text-gray-700 bg-gray-200 rounded">
                                Local
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-2">
                            @if(!$tenant->delegated_to_cloud)
                                <form action="{{route('tenants.delegate', $tenant)}}" method="POST" onsubmit="return confirm('¿Está seguro de que desea delegar este inquilino al agente en la nube?');">
                                    @csrf
                                    <button class="btn btn-blue">
                                        Delegar al agente en la nube
                                    </button>
                                </form>
                            @endif

                            <form action="{{route('tenants.destroy', $tenant)}}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este inquilino?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-red">
                                    Eliminar
                                </button>
                            </form>
                            
                            <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-green">
                                Editar
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


    </x-container>
</x-app-layout>