<div class="py-2 px-4 hidden lg:block lg:px-5 border-b lg:border-b-0 lg:border-r lg:w-85">
    <div class="row mb-8 flex items-center">
        <h3 class="text-5xl mr-4">IntelliSai</h3>
        <img src="{{ asset('storage/images/imgCloud.svg')}}" width="120px" alt="Logo de la plataforma" class="hidden lg:block xl:block">
    </div>
    <div class="flex overflow-auto mb-8">
        <a href="{{url('/sai')}}">
            <div class="mr-4 text-center self-center">
                <div class="relative w-12 mb-2">
                    <img src="{{ asset('storage/images/sai.png') }}" class="rounded-full">
                    <div class="absolute bg-green-300 p-1 rounded-full bottom-0 right-0 border-2 border-gray-800"></div>
                </div>
                <small>SaiBot</small>
            </div>
        </a>
    </div>
    <div class="overflow-auto h-4/5">
        <div class="flex bg-gray-100 mb-4 p-4 rounded" data-toggle="tooltip" data-placement="top" title="Aqui podra gestionar a los usuarios del sistema">
            <img src="{{asset('storage/images/user.svg')}}" class="self-start rounded-full w-12 mr-4">
            <div class="w-full overflow-hidden">
                <div class="flex mb-1">
                    <a href="{{route('employees.index')}}">
                        <p class="font-medium flex-grow">Gestión de Usuarios</p>
                        <small class="text-gray-500">Administración</small>
                    </a>
                </div>
                <small class="overflow-ellipsis overflow-hidden block whitespace-nowrap text-gray-500">Aqui podra gestionar a los usuarios del sistema</small>
            </div>
        </div>
        {{-- <div class="flex bg-gray-100 mb-4 p-4 rounded">
            <img src="{{asset('storage/images/inventary.svg')}}" class="self-start rounded-full w-12 mr-4">
            <div class="w-full overflow-hidden">
                <div class="flex mb-1">
                    <p class="font-medium flex-grow">Gestión de inventario</p>
                    <small class="text-gray-500">Administración</small>
                </div>
                <small class="overflow-ellipsis overflow-hidden block whitespace-nowrap text-gray-500">Aqui podra gestionar el inventario del sistema</small>
            </div>
        </div>
        <div class="flex bg-gray-100 mb-4 p-4 rounded" data-toggle="tooltip" data-placement="top" title="Aqui podra gestionar a los usuarios del sistema">
            <img src="{{asset('storage/images/user.svg')}}" class="self-start rounded-full w-12 mr-4">
            <div class="w-full overflow-hidden">
                <div class="flex mb-1">
                    <p class="font-medium flex-grow">Gestión de Usuarios</p>
                    <small class="text-gray-500">Administración</small>
                </div>
                <small class="overflow-ellipsis overflow-hidden block whitespace-nowrap text-gray-500">Aqui podra gestionar a los usuarios del sistema</small>
            </div>
        </div>
        <div class="flex bg-gray-100 mb-4 p-4 rounded">
            <img src="{{asset('storage/images/inventary.svg')}}" class="self-start rounded-full w-12 mr-4">
            <div class="w-full overflow-hidden">
                <div class="flex mb-1">
                    <p class="font-medium flex-grow">Gestión de inventario</p>
                    <small class="text-gray-500">Administración</small>
                </div>
                <small class="overflow-ellipsis overflow-hidden block whitespace-nowrap text-gray-500">Aqui podra gestionar el inventario del sistema</small>
            </div>
        </div>
        <div class="flex bg-gray-100 mb-4 p-4 rounded" data-toggle="tooltip" data-placement="top" title="Aqui podra gestionar a los usuarios del sistema">
            <img src="{{asset('storage/images/user.svg')}}" class="self-start rounded-full w-12 mr-4">
            <div class="w-full overflow-hidden">
                <div class="flex mb-1">
                    <p class="font-medium flex-grow">Gestión de Usuarios</p>
                    <small class="text-gray-500">Administración</small>
                </div>
                <small class="overflow-ellipsis overflow-hidden block whitespace-nowrap text-gray-500">Aqui podra gestionar a los usuarios del sistema</small>
            </div>
        </div>
        <div class="flex bg-gray-100 mb-4 p-4 rounded">
            <img src="{{asset('storage/images/inventary.svg')}}" class="self-start rounded-full w-12 mr-4">
            <div class="w-full overflow-hidden">
                <div class="flex mb-1">
                    <p class="font-medium flex-grow">Gestión de inventario</p>
                    <small class="text-gray-500">Administración</small>
                </div>
                <small class="overflow-ellipsis overflow-hidden block whitespace-nowrap text-gray-500">Aqui podra gestionar el inventario del sistema</small>
            </div>
        </div> --}}

    </div>
</div>

<!-- Botón de menú desplegable -->
<button class="lg:hidden block fixed bottom-4 right-4 z-50 bg-gray-800 text-white rounded-full p-4" id="mobile-menu-button">
    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z"/>
    </svg>
</button>

<div id ="overlay" style="display: none;" class="lg:hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-40"></div>
<div id="menu-overlay" class="lg:block fixed inset-y-0 left-0 z-50 bg-white w-90 py-4 px-8  transition duration-300 ease-in-out">
    <div class="row mb-8 flex items-center">
        <h3 class="text-5xl mr-4">IntelliSai</h3>
        <img src="{{ asset('storage/images/imgCloud.svg')}}" width="120px" alt="Logo de la plataforma" class="hidden lg:block">
    </div>
    <div class="flex overflow-auto mb-8">
        <a href="{{url('/sai')}}">
            <div class="mr-4 text-center self-center">
                <div class="relative w-12 mb-2">
                    <img src="{{ asset('storage/images/sai.png') }}" class="rounded-full">
                    <div class="absolute bg-green-300 p-1 rounded-full bottom-0 right-0 border-2 border-gray-800"></div>
                </div>
                <small>SaiBot</small>
            </div>
        </a>
    </div>
    <div class="overflow-auto h-auto" style="max-height: 300px;">
        <div class="flex bg-gray-100 mb-4 p-4 rounded" data-toggle="tooltip" data-placement="top" title="Aqui podra gestionar a los usuarios del sistema">
            <img src="{{asset('storage/images/user.svg')}}" class="self-start rounded-full w-12 mr-4">
            <div class="w-full overflow-hidden">
                <div class="flex mb-1">
                    <a href="{{route('employees.index')}}">
                        <p class="font-medium flex-grow">Gestión de Usuarios</p>
                        <small class="text-gray-500">Administración</small>
                    </a>
                </div>
                <small class="overflow-ellipsis overflow-hidden block whitespace-nowrap text-gray-500">Aqui podra gestionar a los usuarios del sistema</small>
            </div>
        </div>
        {{-- <div class="flex bg-gray-100 mb-4 p-4 rounded">
            <img src="{{asset('storage/images/inventary.svg')}}" class="self-start rounded-full w-12 mr-4">
            <div class="w-full overflow-hidden">
                <div class="flex mb-1">
                    <p class="font-medium flex-grow">Gestión de inventario</p>
                    <small class="text-gray-500">Administración</small>
                </div>
                <small class="overflow-ellipsis overflow-hidden block whitespace-nowrap text-gray-500">Aqui podra gestionar el inventario del sistema</small>
            </div>
        </div>
        <div class="flex bg-gray-100 mb-4 p-4 rounded">
            <img src="{{asset('storage/images/inventary.svg')}}" class="self-start rounded-full w-12 mr-4">
            <div class="w-full overflow-hidden">
                <div class="flex mb-1">
                    <p class="font-medium flex-grow">Gestión de inventario</p>
                    <small class="text-gray-500">Administración</small>
                </div>
                <small class="overflow-ellipsis overflow-hidden block whitespace-nowrap text-gray-500">Aqui podra gestionar el inventario del sistema</small>
            </div>
        </div>
        <div class="flex bg-gray-100 mb-4 p-4 rounded">
            <img src="{{asset('storage/images/inventary.svg')}}" class="self-start rounded-full w-12 mr-4">
            <div class="w-full overflow-hidden">
                <div class="flex mb-1">
                    <p class="font-medium flex-grow">Gestión de inventario</p>
                    <small class="text-gray-500">Administración</small>
                </div>
                <small class="overflow-ellipsis overflow-hidden block whitespace-nowrap text-gray-500">Aqui podra gestionar el inventario del sistema</small>
            </div>
        </div>
        <div class="flex bg-gray-100 mb-4 p-4 rounded">
            <img src="{{asset('storage/images/inventary.svg')}}" class="self-start rounded-full w-12 mr-4">
            <div class="w-full overflow-hidden">
                <div class="flex mb-1">
                    <p class="font-medium flex-grow">Gestión de inventario</p>
                    <small class="text-gray-500">Administración</small>
                </div>
                <small class="overflow-ellipsis overflow-hidden block whitespace-nowrap text-gray-500">Aqui podra gestionar el inventario del sistema</small>
            </div>
        </div> --}}
    </div>
</div>


