<div class="mt-6">
    <div class="flex justify-between items-center">
        <h1 class="text-lg font-bold font-josefin uppercase">Mis tarjetas asociadas</h1>
        <button id="btn_pagar"
            class="block uppercase font-josefin tracking-wide rounded-md bg-blue-600 px-3 py-2 text-center text-xs font-semibold text-white shadow-sm">
            <i class="fa-solid fa-plus"></i> Añadir tarjeta
        </button>
    </div>
    @forelse ($card as $item)
        <div class="flex justify-between items-center mt-4">
            <div class="flex items-center space-x-3">
                <i class="fa-brands fa-cc-{{ Str::lower($item->brand) }} text-3xl"></i>
                <p class="font-bold font-josefin uppercase">****{{ $item->four_digits }}</p>
            </div>
            <div class="flex items-center">
                @if(!$item->default)
                <button wire:click="setDefaultCard({{ $item->id }})"
                    class="block uppercase font-josefin tracking-wide rounded-md bg-yellow-400 px-3 py-2 text-center text-xs font-semibold shadow-sm">
                    <i class="fa-solid fa-star"></i>
                </button>
                @endif
                <button wire:click="deleteCard({{ $item->id }})"
                    class="ml-2 block uppercase font-josefin tracking-wide rounded-md bg-red-600 px-3 py-2 text-center text-xs font-semibold text-white shadow-sm">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>

        </div>
    @empty
        <div class="flex justify-center items-center mt-4">
            <p class="font-bold font-josefin uppercase">No tienes tarjetas asociadas</p>
        </div>
    @endforelse

    <script src="https://checkout.culqi.com/js/v4"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        const btn_pagar = document.getElementById('btn_pagar');
        btn_pagar.addEventListener("click", function(e) {
            Culqi.publicKey = "{{ env('CULQI_PUBLIC_KEY') }}";
            Culqi.settings({
                title: 'Baps Comics',
                currency: 'PEN',
                amount: 100
            });

            Culqi.options({
                lang: "auto",
                installments: false,
                paymentMethods: {
                    tarjeta: true,
                    yape: false,
                    bancaMovil: false,
                    agente: false,
                    billetera: false,
                    cuotealo: false,
                },
            });

            Culqi.open();
            e.preventDefault();
        })

        function culqi() {
            if (Culqi.token) {
                // Objeto Token creado exitosamente!
                const token = Culqi.token.id;
                console.log("Se ha creado un Token: ", token);
                $.ajax({
                    url: "{{ route('api.buy.card') }}",
                    method: "POST",
                    data: {
                        token: token,
                        _token: "{{ csrf_token() }}",
                        user_id: {{ auth()->user()->id }},
                    },
                    success: function(response) {
                        Culqi.close();
                        console.log(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            } else {
                // Mostramos JSON de objeto error en consola
                console.log("Error : ", Culqi.error);
            }
        }
    </script>

</div>
