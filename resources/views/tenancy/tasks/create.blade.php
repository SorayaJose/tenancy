<x-tenancy-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tareas
        </h2>
    </x-slot>

    <x-container class="py-6">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('tasks.store')}}" enctype="multipart/form-data" >
                    @csrf
                    
                    <div class="mb-4">
                        <x-input-label class="mb-2">
                            Nombre
                        </x-input-label>

                        <x-text-input name="name" type="text" value="{{old('name')}}" class="w-full mt-2" placeholder="Ingrese el nombre" />

                        <x-input-error :messages="$errors->first('name')" />

                    </div>

                    <div class="mb-4">
                        <x-input-label class="mb-2">
                            Descripción
                        </x-input-label>

                        <textarea class="form-control w-full mt-2" name="description" placeholder="Ingrese la descripción">{{old('description')}}</textarea>

                        <x-input-error :messages="$errors->first('description')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label class="mb-2">
                            Imagen
                        </x-input-label>

                        <input type="file" name="image_url" class="mt-2">
                        
                        <x-input-error :messages="$errors->first('image_url')" />
                    </div>
                    
                    <div class="flex justify-end">
                        <button class="btn btn-blue">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    
    </x-container>
</x-tenancy-layout>