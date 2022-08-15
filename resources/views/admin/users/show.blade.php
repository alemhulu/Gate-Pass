<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('update user information') }}
        </h2>
    </x-slot>

    <!-- show Post -->

    <div>
        <form class="w-full">
            <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">

                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

                    <!-- Title -->
                    <div>
                        <label class=" mt-3 block text-sm font-bold text-gray-700" for="Name">
                            Name :
                        </label>
                        <p class="mt-3
                         ">{{ $user->name }}</p>

                    </div>

                    <div>
                        <label class=" mt-3 block text-sm font-bold text-gray-700" for="Email">
                            Email :
                        </label>

                        <p class="mt-3
                         ">{{ $user->email }}</p>
                    </div>

                    <div>
                        <label class=" mt-3 block text-sm font-bold text-gray-700" for="Department">
                            Department :
                        </label>
                        <p class="mt-3
                         ">{{ $user->department }}</p>
                    </div>

                    <div>
                        <label class=" mt-3 block text-sm font-bold text-gray-700" for="Department">
                            <strong> Role :</strong>
                        </label>


                        >{{ $user->getRoleNames() }}
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-2 text-sm font-semibold align:right text-gray-100 bg-red-700 rounded-md shadow-md hover:bg-red-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                            <a href="{{ route('users.index') }}">Back</a>
                        </button>
                    </div>


                </div>
            </div>
        </form>
    </div>


</x-admin-layout>
