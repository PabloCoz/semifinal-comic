<div>
    @foreach ($this->observations as $observation)
        <div class="bg-gray-200 p-2 rounded-lg w-full">
            <h1>{{ $observation->body }}</h1>
        </div>
    @endforeach
</div>
