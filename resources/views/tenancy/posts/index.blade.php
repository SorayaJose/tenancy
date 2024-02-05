<x-tenancy-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h2>
    </x-slot>

    <x-container class="py-6">
        <div class="flex justify-end mb-6">
            <a href="{{ route('posts.create') }}" class="btn btn-blue">
                Nuevo
            </a>
        </div>


        <div class="card">
            <div class="card-body">

                @if ($posts->count())
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Body
                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $posts->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $posts->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $post->body }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-end space-x-1">
                                            <a href="{{ route('posts.show', $post) }}" class="btn btn-blue">Ver</a>
                                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-green">Editar</a>
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-red">Eliminar</button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$posts->links()}}
                @else
                    <p class="text-center">No hay posteos</p>
                @endif
            </div>
        </div>

        </div>

    </x-container>
</x-tenancy-layout>
