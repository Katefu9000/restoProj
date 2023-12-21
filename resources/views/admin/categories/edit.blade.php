<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.categories.index')}}" class=" text-gray-700 dark:text-white px-4 py-2 bg-indigo-500 hover:bg-indigo-500 rounded-lg">
                Category Index
                </a>
            </div>
            <div class="m-2 p-2"> 
            <div class="flex space-y-8 divide-y divide-gray-200 w-1/2 mt-10  bg-slate-700 rounded">
                <form method="POST" action="{{ route('admin.categories.update', $category->id)}}" enctype="multipart/form-data" class="m-2">
                    @csrf 
                    @method('PUT')
                    <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-white p2">Name </label>
                    <div class="mt-1">
                        <input type="text" id="name" name="name" value="{{ $category->name }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('name')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="sm:col-span-6">
                    <label for="image" class="block text-sm font-medium text-white">Image </label>
                    <div>
                        <img src="{{ Storage::url($category->image) }}  " class="w-20 h-20 rounded">
                    </div>
                    <div class="mt-1">
                        <input type="file" id="image" name="image" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('image')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="sm:col-span-6 pt-5">
                    <label for="description" class="block text-sm font-medium text-white">Description</label>
                    <div class="mt-1">
                        <textarea id="description" rows="3" name="description" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            {{ $category->description }}
                        </textarea>
                    </div>
                    @error('description')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mt-2 p-2">
                        <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-lg">Update</button>
                    </div>
                    
                </form>
                </div>

            </div>


        </div>
    </div>
</x-admin-layout>