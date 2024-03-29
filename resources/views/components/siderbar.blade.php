<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <i class="fa-solid fa-bars text-black text-2xl"></i>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar" aria-hidden="true">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.home') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 @routeIs('admin.home') bg-gray-300 @endif">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 @routeIs('admin.users.index') bg-gray-300 @endif">
                    <i class="fa-solid fa-users"></i>
                    <span class="flex-1 ml-3">Usuarios</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.roles.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 @routeIs('admin.roles.index') bg-gray-300 @endif">
                    <i class="fa-solid fa-lock-open"></i>
                    <span class="flex-1 ml-3">Roles y Permisos</span>

                </a>
            </li>
            <li>
                <a href="{{ route('admin.comics.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 @routeIs('admin.comics.index') bg-gray-300 @endif">
                    <i class="fa-regular fa-folder"></i>
                    <span class="flex-1 ml-3">Comics</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.comics.revision') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 @routeIs('admin.comics.revision') bg-gray-300 @endif">
                    <i class="fa-regular fa-folder"></i>
                    <span class="flex-1 ml-3">Comics en revisión</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.sliders.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 @routeIs('admin.sliders.index') bg-gray-300 @endif">
                    <i class="fa-solid fa-users-viewfinder"></i>
                    <span class="flex-1 ml-3">Administracion de vistas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 @routeIs('admin.categories.index') bg-gray-300 @endif">
                    <i class="fa-solid fa-layer-group"></i>
                    <span class="flex-1 ml-3">Categorias</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.plans.index') }}"
                    class="flex w-full items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 @routeIs('admin.plans.index') bg-gray-300 @endif">
                    <i class="fa-solid fa-table-list"></i>
                    <span class="flex-1 ml-3">Planes de suscripcion</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.questions.index') }}"
                    class="flex w-full items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 @routeIs('admin.questions.index') bg-gray-300 @endif">
                    <i class="fa-solid fa-question"></i>
                    <span class="flex-1 ml-3">FAQ</span>
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}"
                    class="flex w-full items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200">
                    <i class="fa-solid fa-house"></i>
                    <span class="flex-1 ml-3">Inicio</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
