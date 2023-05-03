<div>
    <div class="shrink-0 flex items-center justify-center">
        <x-application-mark />
    </div>

    <x-validation-errors class="mb-4" />

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label class="font-bold text-sm tracking-wider">Nombre de Usuario</label>
            <input id="username"
                class="block mt-1 w-full rounded-full border focus:border-black ring-0 focus:ring-black" type="text"
                name="username" required autofocus />
        </div>

        <div class="mt-4">
            <label class="font-bold text-sm tracking-wider">Contraseña</label>
            <input id="password"
                class="block mt-1 w-full rounded-full border focus:border-black ring-0 focus:ring-black" type="password"
                name="password" required autocomplete="current-password" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <x-checkbox id="remember_me" name="remember" />
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button
                class="ml-4 bg-rose-500 px-3 py-3 text-xs uppercase text-white tracking-wider font-extrabold rounded-full">
                Iniciar Sesión
            </button>


        </div>
    </form>


</div>
