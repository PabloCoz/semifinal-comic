<div>
    @forelse ($this->observations as $observation)
        <div class="bg-gray-200 p-2 rounded-lg w-full">
            <h1>{{ $observation->observations }}</h1>
        </div>
    @empty
        <div class="bg-gray-200 p-2 rounded-lg w-full">
            <h1>No hay observaciones</h1>
        </div>
    @endforelse
</div>
