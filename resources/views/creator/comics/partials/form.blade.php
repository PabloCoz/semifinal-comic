<div class="mb-4">
    {!! Form::label('title', 'Título del comic') !!}
    {!! Form::text('title', null, [
        'class' => 'rounded-full w-full mt-1' . ($errors->has('title') ? ' border-red-600' : ''),
    ]) !!}

    @error('title')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
    <div class="">
        {!! Form::label('slug', 'Slug del comic') !!}
        {!! Form::text('slug', null, ['class' => 'rounded-full w-full mt-1', 'readonly']) !!}

        @error('slug')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
    <div>
        {!! Form::label('category_id', 'Categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'rounded-full w-full mt-1']) !!}
    </div>
</div>


<div class="mb-4">
    {!! Form::label('description', 'Descripcion del comic') !!}
    {!! Form::textarea('description', null, [
        'class' => 'rounded-lg w-full mt-1' . ($errors->has('description') ? ' border-red-600' : ''),
    ]) !!}

    @error('description')
        <strong class="text-xs text-red-500">{{ $message }}</strong>
    @enderror
</div>



<h1 class="text-2xl font-bold mt-8 mb-2">Portada principal</h1>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    <figure>
        @isset($comic->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($comic->image->url) }}"
                alt="">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="" alt="">
        @endisset
    </figure>

    <div>
        {!! Form::file('file', ['class' => 'rounded w-full ', 'id' => 'file', 'accept' => 'image/*']) !!}

        <p class="font-bold text-blue-600 italic text-sm">
            Todas las imágenes deben tener un tamaño de 1920px X 1080px (horizontal)
        </p>

        @error('file')
            <strong class="text-xs text-red-500">{{ $message }}</strong>
        @enderror
    </div>
</div>

@if (auth()->user()->profile->is_original == 1)
    <h1 class="text-2xl font-bold mt-8 mb-2">Imagen de portada horizontal</h1>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <figure>
            @isset($comic->img)
                <img id="portada" class="w-full h-64 object-cover object-center" src="{{ Storage::url($comic->img) }}"
                    alt="">
            @else
                <img id="portada" class="w-full h-64 object-cover object-center" src="" alt="">
            @endisset
        </figure>

        <div>
            {!! Form::file('img', ['class' => 'rounded w-full ', 'id' => 'img', 'accept' => 'image/*']) !!}

            <p class="font-bold text-blue-600 italic text-sm">
                Todas las imágenes deben tener un tamaño de 1920px X 1080px (horizontal)
            </p>

            @error('img')
                <strong class="text-xs text-red-500">{{ $message }}</strong>
            @enderror
        </div>
    </div>
@else
    <h1 class="text-2xl font-bold mt-8 mb-2">Imagen de portada horizontal</h1>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <figure>
            @isset($comic->img)
                <img id="portada" class="w-48 h-64 object-cover object-center" src="{{ Storage::url($comic->img) }}"
                    alt="">
            @else
                <img id="portada" class="w-48 h-64 object-cover object-center" src="" alt="">
            @endisset
        </figure>

        <div>
            {!! Form::file('img', ['class' => 'rounded w-full ', 'id' => 'img', 'accept' => 'image/*']) !!}

            <p class="font-bold text-red-600 italic text-sm">
                Todas las imágenes deben tener un tamaño de 192px X 256px
            </p>

            @error('img')
                <strong class="text-xs text-red-500">{{ $message }}</strong>
            @enderror
        </div>
    </div>
@endif
