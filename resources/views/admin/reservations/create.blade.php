<x-admin-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex m-2 p-2">
                    <a href="{{ route('admin.reservations.index')}}" class=" text-gray-700 dark:text-white px-4 py-2 bg-indigo-500 hover:bg-indigo-500 rounded-lg">
                    Reservation Index
                    </a>
                </div>
                <div class="m-2 p-2 "> 
                <div class="flex space-y-8 divide-y divide-gray-200 w-1/2 mt-10  bg-slate-700 rounded">
                    <form method="POST" action=" {{ route('admin.reservations.store') }}" class="m-2">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="first_name" class="block text-sm font-medium text-white p2 ">First Name</label>
                            <div class="mt-1">
                                <input type="text" id="first_name" name="first_name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('first_name')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="last_name" class="block text-sm font-medium text-white p2 ">Last Name</label>
                            <div class="mt-1">
                                <input type="text" id="last_name" name="last_name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('last_name')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-white p2 ">Email</label>
                            <div class="mt-1">
                                <input type="email" id="email" name="email" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('email')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="no_tel" class="block text-sm font-medium text-white p2 ">Phone number</label>
                            <div class="mt-1">
                                <input type="text" id="no_tel" name="no_tel" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('no_tel')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="res_date" class="block text-sm font-medium text-white p2 ">Reservation Date</label>
                            <div class="mt-1">
                                <input type="datetime-local" id="res_date" name="res_date" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('res_date')
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
                        <label for="table_id" class="block text-sm font-medium text-white p2">Table </label>
                        <div class="mt-1">
                            <select name="table_id" id="table_id" class="form-multiselect block w-full mt-1 rounded-lg">
                            @foreach($tables as $table)
                                <Option value="{{ $table->id }}"> {{ $table->name }} ({{ $table->guest_number }})</Option>
                                @endforeach
                            </select>
                            @error('table_id')
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