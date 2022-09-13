<x-admin-layout>

    <x-form-card action="{{ route('purpose.index', $visit->id) }}" title="Create New Visit" method="PUT">
        <fieldset class="form-group">
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <textarea id="address" rows="4" class="text-capitalize round form-control @error('address') is-invalid @enderror"
                name="address" placeholder="Company Address" required autocomplete="address" autofocus>{{ old('address') }}</textarea>
        </fieldset>
    </x-form-card>
</x-admin-layout>
