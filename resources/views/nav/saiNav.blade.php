<div class="bg-white xl:w-4/12 lg:w-4/12 md:w-5/12 w-full p-6">
    <div class="row mb-8">
        <h3 class="text-2xl mr-4">IntelliSai</h3>
        <img src="{{ asset('storage/images/imgCloud.svg')}}" width="120px" alt="Logo de la plataforma" class="hidden lg:block">
    </div>            
    <div class="flex overflow-auto mb-8">
        <div class="mr-4 text-center self-center">
            <div class="relative w-12 mb-2">
                <img src="{{ asset('storage/images/sai.png') }}" class="rounded-full">
                <div class="absolute bg-green-300 p-1 rounded-full bottom-0 right-0 border-2 border-gray-800"></div>
            </div>
            <small>SaiBot</small>
        </div>
        <img src="{{ asset('storage/images/imgCloud.svg')}}" width="120px" alt="Logo de la plataforma" class="block lg:hidden">
    </div>
    <div class="overflow-auto h-4/5">
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
        
    </div>
</div>
