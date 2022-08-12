<x-admin-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Users Management') }}
    </h2>
  </x-slot>

  <x-slot name="actionButton">
    <a href="{{ route('users.index') }}">
      <x-button class="flex ">
        <i class="flex fi-rr-arrow-left mr-2"></i>
        {{ __('Back') }}
      </x-button>
    </a>
  </x-slot>

  <x-form-card action="{{ route('users.update', $user->id) }}" title="Edit User" method="PUT">
    <x-slot name="body">
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
        <x-label for="name" value="Name" />
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <x-input type="text" name="name" id="name" value="{{ $user->name }}" />
          <x-input-error for="name" />
        </div>
      </div>

      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
        <x-label for="email" value="Email" />
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <x-input type="text" name="email" id="email" value="{{ $user->email }}" />
          <x-input-error for="email" />
        </div>
      </div>

      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
        <x-label for="department" value="Department" />
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <x-input type="text" name="department" id="department" value="{{ $user->department }}" />
          <x-input-error for="department" />
        </div>
      </div>

      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
        <x-label for="password" value="Password" />
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <x-input type="password" name="password" id="password" />
          <x-input-error for="password" />
        </div>
      </div>

      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
        <x-label for="confirm-password" value="Password Confirmation" />
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <x-input type="password" name="confirm-password" id="confirm-password" />
          <x-input-error for="confirm-password" />
        </div>
      </div>

      {{-- @can('role-edit') --}}
      <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
        <x-label for="title" value="Assign Roles" />
        <div class="mt-1 sm:mt-0 sm:col-span-2">
          <x-select name="roles[]" id="roles[]" multiple="multiple" value="{{ old('roles[]') }}">
            <option value="" class="text-gray-400">select one or more</option>
            @foreach ( $roles as $key =>$role )
            <option value="{{ $role }}" {{ $role==($userRole[$key] ?? '' ) ? ' selected="selected"' : '' }}>
              {{ $role }}
            </option>
            @endforeach
          </x-select>
          <x-input-error for="roles[]" />
        </div>
      </div>
      {{-- @endcan --}}

    </x-slot>
  </x-form-card>
</x-admin-layout>