<x-admin-layout>
    <div class="flex items-center justify-between">
        <h1 class="font-bold text-2xl">Lista de planes</h1>

        @livewire('admin.plans.plan-create')
    </div>
    @if (session()->has('success-plan'))
        <div class="my-5">
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('success-plan') }}</span>
            </div>
        </div>
    @elseif(session()->has('delete-plan'))
        <div class="my-5">
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">{{ session('delete-plan') }}</span>
            </div>
        </div>
    @endif

    <div class="mt-14">

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre de plan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Frecuencia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tiempo de duracion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $plan->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $plan->interval }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $plan->interval_count }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $plan->price }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('api.plan.destroy', $plan) }}" class="form-delete"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white font-bold rounded-md px-3 py-2"
                                        type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    @push('sweet')
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Sweet alert
            $('.form-delete').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        </script>
    @endpush
</x-admin-layout>
