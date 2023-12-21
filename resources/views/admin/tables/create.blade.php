    <x-admin-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex m-2 p-2">
                    <a href="{{ route('admin.tables.index')}}" class=" text-gray-700 dark:text-white px-4 py-2 bg-indigo-500 hover:bg-indigo-500 rounded-lg">
                    Table Index
                    </a>
                </div>
                <div class="m-2 p-2 "> 
                <div class="flex space-y-8 divide-y divide-gray-200 w-1/2 mt-10  bg-slate-700 rounded">
                    <form method="POST" action=" {{ route('admin.tables.store') }}" class="m-2">
                        @csrf
                        <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-white p2 ">Name </label>
                        <div class="mt-1">
                            <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                            @error('name')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                        <label for="guest_number" class="block text-sm font-medium text-white p2">Guest Number </label>
                        <div class="mt-1">
                            <input type="number" id="guest_number" name="guest_number" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                            @error('guest_number')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                        <label for="status" class="block text-sm font-medium text-white p2">Status </label>
                        <div class="mt-1">
                            <select name="status" id="status" class="form-multiselect block w-full mt-1 rounded-lg">
                            @foreach(App\Enums\TableStatus::cases() as $status)
                                
                                
                                <Option value="{{ $status->value }}"> {{ $status->name }} </Option>
                                @endforeach
                            </select>
                            </div>
                            @error('status')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                        <label for="location" class="block text-sm font-medium text-white p2">location 
                            
                        </label>
                        <div class="mt-1">
                            <select name="location" id="location" class="form-multiselect block w-full mt-1 rounded-lg">
                                @foreach(App\Enums\TableLocation::cases() as $location)
                                
                                
                                <Option value="{{ $location->value }}"> {{ $location->name }} </Option>
                                @endforeach
                            </select>
                            </div>
                            @error('location')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        

                        <div class="mt-2 p-2">
                            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-lg">Store</button>
                        </div>
                        
                    </form>
                    </div>

                </div>


            </div>
        </div>
    </x-admin-layout>