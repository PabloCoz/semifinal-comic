<x-app-layout>
    <div class="max-w-4xl mx-auto">
        <div class="overflow-hidden bg-white rounded-lg shadow-md mt-6">
            <div class="px-4 py-6">
                <div class="my-2">
                    <h1 class="text-3xl font-bold">CREAR NUEVO COMIC</h1>
                </div>
                {!! Form::open(['route' => 'creator.comics.store', 'files' => true]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                {!! Form::hidden('profile_id', auth()->user()->profile->id) !!}
                @include('creator.comics.partials.form')

                <div class="flex justify-end mt-3">
                    {!! Form::submit('Crear', ['class' => 'rounded-full text-white bg-green-600 font-bold p-2 cursor-pointer']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
    <x-slot name="js">
        <script src="{{ asset('js/form.js') }}"></script>
    </x-slot>
</x-app-layout>
