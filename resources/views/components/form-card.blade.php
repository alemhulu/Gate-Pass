@props(['title', 'subTitle', 'action', 'enctype' => 'multipart/form-data', 'method' => 'POST', 'publish'])
<div>
    <div class="py-3">
        <div class="mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form enctype="{{ $enctype }}" action="{{ $action }}" method="POST">
                        @csrf
                        @method($method)
                        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        {{ $title ?? 'form'}}
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        {{ $subTitle ?? 'This information will be displayed publicly so be careful what you share.' }}
                                    </p>
                                </div>

                                @if ( isset($publish))
                                <div class="flex items-center gap-x-2" x-data="{ toggle: {{ $publish}} }">
                                    <span x-text="toggle === 1 ? 'Published' : 'Publish'"> </span>
                                    <button @can('content-publish') x-on:click="toggle === 0 ? toggle = 1  : toggle = 0"
                                        @endcan type="button"
                                        class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200"
                                        :class="toggle && 'bg-indigo-600'" role="switch" aria-checked="0">
                                        <span class="sr-only">Use setting</span>
                                        <span aria-hidden="true"
                                            class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"
                                            :class="toggle && 'translate-x-5'"></span>
                                    </button>
                                    <input type="hidden" name="is_published" class="hidden" x-model.number="toggle" />
                                </div>
                                @endif
                            </div>


                            <div class="py-3 space-y-3">
                                {{ $body }}
                            </div>


                            <div class="pt-5">
                                <div class="flex justify-end">
                                    <x-button type="button" btnType="secondary" class="">
                                        Cancel
                                    </x-button>
                                    <x-button type="submit" class="ml-3">
                                        Save
                                    </x-button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>