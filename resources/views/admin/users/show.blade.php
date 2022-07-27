<x-admin-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('update user information') }}
    </h2>
  </x-slot>

  <!-- Edit Post -->
  <div class="flex justify-end">
    <button type="submit"
      class="px-6 py-2 text-sm font-semibold align:right text-gray-100 bg-red-700 rounded-md shadow-md hover:bg-red-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
      <a href="{{ route('admin-users.index') }}">Back</a>
    </button>
  </div>
  <div>
    <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">

      <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

        <!-- Title -->
        <div>
          <label class="block text-sm font-bold text-gray-700" for="Name">
            Name:
          </label>
          <p>{{ $user->name }}</p>

        </div>

        <div>
          <label class="block text-sm font-bold text-gray-700" for="Email">
            Email
          </label>

          <p>{{ $user->email }}</p>
        </div>

        <div>
          <label class="block text-sm font-bold text-gray-700" for="Department">
            Department
          </label>
          <p>{{ $user->department }}</p>
        </div>



        <div class="flex items-center justify-start mt-4 gap-x-2">

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