<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Management') }}
        </h2>
    </x-slot>

    @can('user-create')
    <x-slot name="actionButton">
        <a href="{{ route('users.create') }}">
            <x-button class="flex ">
                <i class="flex fi fi-rr-plus mr-2"></i>
                {{ __('Create New User') }}
            </x-button>
        </a>
    </x-slot>
    @endcan


    <div class="py-3">
        <div class="mx-auto">
            <x-table>
                <x-slot name="header">
                    <x-th>#</x-th>
                    <x-th>Name</x-th>
                    <x-th>Email</x-th>
                    <x-th>Department</x-th>
                    <x-th>Role</x-th>
                </x-slot>

                <x-slot name="row">
                    @forelse($data as $key => $user)
                    @if ($user->id != 1 || Auth::user()->id == 1)
                    <x-tr>
                        <x-td>
                            <div class="text-sm text-gray-700 font-semibold">{{ ++$i}}</div>
                        </x-td>

                        <x-td>
                            <div class="text-sm text-gray-700 font-semibold">{{ $user->name }}</div>
                        </x-td>

                        <x-td>
                            <div class="text-sm text-gray-700 font-semibold">{{ $user->email }}</div>
                        </x-td>

                        <x-td>
                            <div class="text-sm text-gray-700 font-semibold">{{ $user->department }}</div>
                        </x-td>

                        <x-td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="px-1 py-0.5 bg-green-500 rounded text-white text-xs">{{ $v }}</label>
                            @endforeach
                            @endif
                        </x-td>

                        <x-td>
                            <x-action {{-- view="{{ route('users.show',$user->id) }}" --}}
                                edit="{{ route('users.edit', $user->id) }}"
                                delete="{{ route('users.destroy', $user->id) }}" />
                        </x-td>
                    </x-tr>
                    @endif


                    @empty
                    <x-empty-row colspan=4 />
                    @endforelse
                </x-slot>
            </x-table>
        </div>
        {!! $data->render() !!}
    </div>
</x-admin-layout>