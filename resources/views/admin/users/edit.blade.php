<x-admin-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('update user information') }}
    </h2>
  </x-slot>


  <div class="flex justify-end">
    <button type="submit"
      class="px-6 py-2 text-sm font-semibold align:right text-gray-100 bg-red-700 rounded-md shadow-md hover:bg-red-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
      <a href="{{ route('admin-users.index') }}">Back</a>
    </button>
  </div>
  <!-- Edit Post -->
  <div>
    <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
      @if (count($errors)>0)
      @foreach ($errors->all() as $error )
      <p class="text-red-500">
        {{ $error }}
      </p>

      @endforeach

      @endif

      <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
        <form method="POST" action="{{ route('admin-users.update', $user->id) }}">
          @csrf
          @method('PATCH')
          <!-- Title -->
          <div>
            <label class="block text-sm font-bold text-gray-700" for="Name">
              Name
            </label>

            <input
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              type="text" name="name" value="{{ $user->name }}" />
          </div>

          <div>
            <label class="block text-sm font-bold text-gray-700" for="email">
              Email
            </label>

            <input
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              type="text" name="email" value="{{ $user->email }}" />
          </div>

          <div>
            <label class="block text-sm font-bold text-gray-700" for="department">
              Department
            </label>

            <input
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              type="text" name="department" value="{{ $user->department }}" />
          </div>

          <div>
            <label class="block text-sm font-bold text-gray-700" for="Password">
              Password
            </label>

            <input
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              type="password" name="password" value="{{ $user->password }}" />
          </div>

          <div>
            <label class="block text-sm font-bold text-gray-700" for="Confirm password">
              Confirm password
            </label>

            <input
              class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              type="password" name="confirm-password" placeholder="180" value="{{ $user->password }}" />
          </div>


          <div class="flex items-center justify-start mt-4 gap-x-2">
            <button type="submit"
              class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
              Update
            </button>
            <button type="submit"
              class="px-6 py-2 text-sm font-semibold text-gray-100 bg-gray-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>

  </div>
  </div>
  </div>
  </div>
</x-admin-layout>