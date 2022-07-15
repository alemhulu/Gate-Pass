<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Users') }}
        </h2>
    </x-slot>
    
    <!-- Create Post -->
    <div>
      {{-- <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
        <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
          <div class="mb-4">
            <h1 class="font-serif text-3xl font-bold underline decoration-gray-400">
              Create Post
            </h1>
          </div> --}}
           <x-jet-validation-errors class="mb-4" />
          <div class="w-full px-6 py-4 bg-gray-400 rounded shadow-md ring-1 ring-gray-900/10">
            <form method="POST" action="/admin/users">
              <!-- Title -->
              @csrf
              <div>
                <label class="block text-sm font-bold text-gray-700" for="Name" >
                  Name
                </label>

                <input
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-left focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  type="text" name="name" placeholder="Enter Name" />
              </div>
               
             <div>
              
                <div class="mt-4">
                <x-jet-label class="block text-sm font-bold text-gray-700" for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  placeholder="Enter Email"
                    required />
            </div></div>
               
              
                <div class="mt-4">
                <x-jet-label class="block text-sm font-bold text-gray-700" for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"  placeholder="Enter password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label class="block text-sm font-bold text-gray-700" for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation"  placeholder="confirm your password" required autocomplete="new-password" />
            </div>

                 

              {{-- <!-- Description -->
              <div class="mt-4">
                <label class="block text-sm font-bold text-gray-700" for="password">
                  Description
                </label>
                <textarea name="description"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                  rows="4" placeholder="400"></textarea>
              </div> --}}
                <div class="mt-4">
                <x-jet-label for="role_id" value="{{ __('Register as:') }}" />
                <select name="role_id" x-model="role_id"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    {{-- <option value="">Select User Type</option> --}}
                    <option value="2">receptionist</option>
                    <option value="3">staff</option>
                </select>
            </div>


              <div class="flex items-center justify-start mt-4 gap-x-2">
                <button type="submit"
                  class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                  Save
                </button>
                <button type="submit"
                  class="px-6 py-2 text-sm font-semibold text-gray-100 bg-red-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
 
</x-admin-layout>