<x-slide.slide2>
    @foreach ($testimonies as $testimony)
    <x-slide.carousel2 image="{{ $testimony->image }}" name="{{ $testimony->name }}" quote="{{ $testimony->quote }}"
        position="{{ $testimony->position }}" />
    @endforeach
</x-slide.slide2>