<div class="space-y-2">
    <input type="number" id="value" name="value" class="w-full p-1 rounded-lg font-bold font-josefin text-black"
        placeholder="Cantidad de monedas">
    <button id="btn_pagar"
        class="block uppercase font-josefin tracking-wide w-full rounded-md bg-rose-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm">
        Comprar monedas
    </button>

    <script src="https://checkout.culqi.com/js/v4"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        const btn_pagar = document.getElementById('btn_pagar');

        btn_pagar.addEventListener('click', function(e) {
            // Abre el formulario si el el input tiene un valor
            if (document.getElementById('value').value == '') {
                alert('Ingrese un valor');
                return;
            }
            let val = document.getElementById('value').value;
            Culqi.publicKey = "{{ env('CULQI_PUBLIC_KEY') }}";
            Culqi.settings({
                title: 'Culqi Store',
                currency: 'PEN',
                amount: val * 100,
            });

            Culqi.options({
                lang: "auto",
                installments: false,
                paymentMethods: {
                    tarjeta: true,
                    yape: false,

                },
            });

            Culqi.open();
            e.preventDefault();
        })

        function culqi() {
            if (Culqi.token) {
                const token = Culqi.token.id;
                $.ajax({
                    url: "{{ route('api.buy.money') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        token: token,
                        amount: document.getElementById('value').value * 100,
                        user_id: "{{ auth()->user()->id }}"
                    },
                    success: function(data) {
                        document.getElementById('value').value = '';
                        console.log(data);
                        Culqi.close();
                    },
                    error: function(error) {
                        //const obj = JSON.parse(error)
                        const err = JSON.stringify(error)
                        console.log(err)
                    }
                });

            } else {
                // Mostramos JSON de objeto error en consola
                console.log('Error : ', Culqi.error);
            }
        };
    </script>
</div>
