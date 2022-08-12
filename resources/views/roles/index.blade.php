<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Management') }}
        </h2>
    </x-slot>

    <x-slot name="actionButton">
        <a href="{{ route('roles.create') }}">
            <x-button class="flex ">
                <i class="flex fi fi-rr-plus mr-2"></i>
                {{ __('Create New Role') }}
            </x-button>
        </a>
    </x-slot>

    <div class="py-3">
        <div class="mx-auto">
            <x-table>
                <x-slot name="header">
                    <x-th>#</x-th>
                    <x-th>Name</x-th>
                    <x-th>Permissions</x-th>
                </x-slot>

                <x-slot name="row">
                    @forelse($roles as $key => $role)
                    <x-tr>
                        <x-td>
                            <div class="text-sm text-gray-700 font-semibold">{{ ++$i}}</div>
                        </x-td>

                        <x-td>
                            <div class="text-sm text-gray-700 font-semibold">{{ $role->name }}</div>
                        </x-td>

                        <x-td>
                            <div class="text-sm text-gray-500 font-semibold"> {{ $role->permissions->count() }}</div>
                        </x-td>

                        <x-td>
                            <x-action {{-- view="{{ route('roles.show',$role->id) }}" --}}
                                edit="{{ route('roles.edit', $role->id) }}"
                                delete="{{ route('roles.destroy', $role->id) }}" />
                        </x-td>
                    </x-tr>
                    @empty
                    <x-empty-row colspan=4 />
                    @endforelse
                </x-slot>
            </x-table>
        </div>
        {!! $roles->render() !!}
    </div>
</x-admin-layout>