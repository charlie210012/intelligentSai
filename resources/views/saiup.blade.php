@extends('Layouts.saiAdmin')
@section('content')

    @include('nav.saiNav')

 <!-- Contenido principal -->
<div class="lg:flex-grow p-4" id="chat-body">
    <div class="py-2 px-4 lg:px-20 border-b">
        <div class="flex flex-wrap items-center">
          <div class="flex flex-grow mb-2 lg:mb-0">
            <div class="relative mr-4">
              <img src="{{ asset('storage/images/sai.png') }}" class="rounded-full w-12">
              <div class="absolute bg-green-300 p-1 rounded-full bottom-0 right-0 border-2 border-gray-800"></div>
            </div>
            <div>
              <p class="font-medium">SaiBot</p>
              <small class="text-gray-500">Online</small>
            </div>
          </div>
          <div class="flex">
            <svg class="w-6 mr-4 text-gray-500 hidden lg:block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <button class="lg:hidden">
              <svg class="w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
          <div class="ml-auto flex-shrink-0">
            <div class="flex items-center">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-800 font-bold px-4 py-2 hover:bg-gray-300 hover:text-gray-900">Salir</a>
            </div>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
    </div>
    <div class="py-2 px-4 sm:px-6 lg:px-8 h-3/4 overflow-auto" id="chat-message">
        <div v-for="message in messages" :class="{ 'flex mb-8 sm:mb-12': message.from === 'SaiBot', 'flex flex-row-reverse mb-8 sm:mb-12': message.from === 'Me' }">
          <img :src="message.img" :class="{ 'self-end rounded-full w-12 mr-4': message.from === 'SaiBot', 'self-end rounded-full w-12 ml-4': message.from === 'Me' }">
          <div class="flex flex-col w-full lg:w-1/2 xl:w-1/2">
            <div :class="{ 'bg-blue-500 text-white p-6 rounded-3xl rounded-br-none w-full sm:w-4/5 md:w-3/4 lg:w-full xl:w-full mb-2': message.from === 'SaiBot', 'bg-white p-6 rounded-3xl rounded-bl-none w-full sm:w-4/5 md:w-3/4 lg:w-full xl:w-full shadow-sm mb-2': message.from === 'Me' }">
              <p class="font-medium mb-1" v-if="message.from === 'Me'">{{ Auth::user()->name }}</p>
              <p class="font-medium mb-1" v-if="message.from !== 'Me'">@{{message.from}}</p>
              <template v-if="Array.isArray(message.text)">
                <div v-for="msg in message.text" :key="msg">
                  <small :class="{ 'block mb-1': message.from === 'SailBot', 'block text-gray-500 mb-1': message.from === 'Me' }">@{{ msg }}</small>
                </div>
              </template>
              <template v-else>
                <small :class="{ 'block mb-1': message.from === 'SailBot', 'block text-gray-500 mb-1': message.from === 'Me' }">@{{ message.text }}</small>
                <a target="__blanck" v-if ="message.link !== ''" :href="message.link">Ver reporte</a>
              </template>
              <template v-if="message.register || message.update">
                <br>
                <div id="formEmployee" v-if="showForm">
                    <!-- form -->
                    <form orm @submit.prevent="employeeAction" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                @{{ message.register ? 'Registrar' : 'Actualizar' }} empleado
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" @click="hideForm">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre completo</label>
                                    <input :disabled = "message.parameter !== 'name' && message.update && message.parameter !== 'data'" type="text" name="name" id="name" v-model="employee.name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie" required="">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="identification" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Identificación</label>
                                    <input :disabled = "message.parameter !== 'identification' && message.update && message.parameter !== 'data'" type="number" name="identification" id="identification" v-model="employee.identification" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Green" required="">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                                    <input :disabled = "message.parameter !== 'email' && message.update && message.parameter !== 'data'" type="email" name="email" id="email" v-model="employee.email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@company.com" required="">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                                    <input :disabled = "message.parameter !== 'phone' && message.update && message.parameter !== 'data'" type="number" name="phone" id="phone" v-model="employee.phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="e.g. +(12)3456 789" required="">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                                    <input :disabled = "message.parameter !== 'address' && message.update && message.parameter !== 'data'" type="text" name="address" id="address" v-model="employee.address" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Development" required="">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de nacimiento</label>
                                    <input :disabled = "message.parameter !== 'birthday' && message.update && message.parameter !== 'data'" type="date" name="birthday" id="birthday" v-model="employee.birthday" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123456" required="">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area</label>
                                    <select :disabled = "message.parameter !== 'area' && message.update && message.parameter !== 'data'" name="area" id="area" v-model="employee.area" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option v-for="area in areas" :value="area.id">@{{area.name}}</option>
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                                    <select  :disabled = "message.parameter !== 'role' && message.update && message.parameter !== 'data'" name="role" id="role" v-model="employee.role" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option v-for="role in roles" :value="role.id">@{{role.name}}</option>
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="dateOfHire" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de ingreso</label>
                                    <input :disabled = "message.parameter !== 'dateOfHire' && message.update && message.parameter !== 'data'" type="date" name="dateOfHire" id="dateOfHire" v-model="employee.dateOfHire" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123456" required="">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                                    <select :disabled = "message.parameter !== 'status' && message.update && message.parameter !== 'data'" name="status" id="status" v-model="employee.status" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option v-for="s in status" :value="s.id">@{{s.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button id="registerEmployee" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                @{{ message.register ? 'Guardar' : 'Actualizar' }}
                            </button>
                        </div>
                    </form>
                </div>


              </template>
            </div>
            <small :class="{ 'text-gray-500': message.from === 'SailBot', 'text-gray-500': message.from === 'Me' }">@{{ message.timestamp }}</small>
          </div>
        </div>
    </div>
    <form id="chat-form" class="flex flex-col md:flex-row py-2 px-4 md:px-20 border-t">
        <div class="w-full md:w-4/5 mb-4 md:mb-0 md:mr-4">
            <input type="text" id="chat-input" class="rounded-sm px-4 py-2 focus:outline-none bg-gray-100 w-full" placeholder="Escribe tu mensaje...">
        </div>
        <div class="w-full md:w-1/5 flex justify-end items-center">
            <svg class="w-6 mr-2 md:mr-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
            </svg>
            <svg class="w-6 mr-2 md:mr-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Enviar</button>
        </div>
    </form>
</div>
 <!-- Register Employee modal -->

@endsection

@section('scripts')
    <script>

        const format = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false, timeZone: 'America/Bogota' };


        // Inicializar la instancia de Vue.js
        var app = new Vue({
            el: '#chat-body',
            data: function() {
                return {
                    messages: [],
                    employee: {
                        name: '',
                        email: '',
                        phone: '',
                    },
                    showForm: true,
                    areas: [],
                    status: [],
                    roles: [],
                    actionEmployee: ''
                }
            },
            methods: {
                // Función para agregar un nuevo mensaje al chat
                addMessage(message) {
                    this.messages.push(message);
                    // Desplazarse al final del chat para mostrar el último mensaje
                    setTimeout(function() {
                        var chatBody = document.getElementById('chat-body');
                        chatBody.scrollTop = chatBody.scrollHeight;
                    }, 50);
                },
                showModal () {
                    this.$modal.show('registerEmployeeModal')
                },
                employeeAction(){
                    this.actionEmployee == 'addEmployee'?this.addEmployee() : this.updateEmployee();
                },
                addEmployee() {
                    axios.post('/employees', this.employee)
                    .then(response => {
                        this.messages.splice(this.messages.length-1,1);
                        if(response.data.process){
                            this.addMessage({
                                text: "¡Listo! Ya registramos a " + this.employee.name +", ¿en que mas te puedo ayudar?",
                                link: '',
                                from: 'SaiBot',
                                img: "{{asset('storage/images/sai.png')}}",
                                register: false,
                                update: false,
                                timestamp: new Date().toLocaleTimeString('es-ES',format)
                            });

                            this.employee = {
                                name: '',
                                email: '',
                                department: '',
                                company: ''
                            };

                            this.showForm = false;
                        }
                    });


                },
                updateEmployee(){
                    axios.post('/employees/'+app.employee.id, this.employee)
                    .then(response => {
                        this.messages.splice(this.messages.length-1,1);
                        if(response.data.process){
                            this.addMessage({
                                text: "¡Listo! Ya se actualizaron los datos de " + this.employee.name +", ¿en que mas te puedo ayudar?",
                                link: '',
                                from: 'SaiBot',
                                img: "{{asset('storage/images/sai.png')}}",
                                register: false,
                                update: false,
                                timestamp: new Date().toLocaleTimeString('es-ES',format)
                            });

                            this.employee = {
                                name: '',
                                email: '',
                                department: '',
                                company: ''
                            };



                            this.showForm = false;
                        }
                    });

                },
                hideForm(){
                    this.messages.splice(this.messages.length-1,1);
                    
                    this.addMessage({
                        text: "No te preocupes, podemos registrar cuando quieres un nuevo empleado, ¿en que mas te puedo ayudar?",
                        link: '',
                        from: 'SaiBot',
                        img: "{{asset('storage/images/sai.png')}}",
                        register: false,
                        timestamp: new Date().toLocaleTimeString('es-ES',format)
                    });

                    this.showForm = false;

                }
            },
            mounted: function () {

                //obtener las listas para los select
                axios.get('/employees/list')
                .then(response => {
                    console.log(response.data);
                    this.areas = response.data.areas;
                    this.roles = response.data.roles;
                    this.status = response.data.status;
                });

            }
                // Obtener el chat del servidor
                // axios.get('/sai/chat')
                // .then(response => {
                //     // Agregar los mensajes del servidor al chat
                //     response.data.forEach(message => {
                //         app.addMessage(message);
                //     });
                // });

        });




        setTimeout(function() {
            app.addMessage({
                text: "Bienvenido {{Auth::user()->name}}, yo soy Sai, tu asistente inteligente, pregunta por mis funcionalidades desarrolladas",
                link: '',
                from: 'SaiBot',
                img: "{{asset('storage/images/sai.png')}}",
                register: false,
                timestamp: new Date().toLocaleTimeString('es-ES',format)
            });
        }, 2000);


        // Obtener el formulario y los elementos de entrada
        const chatForm = document.getElementById('chat-form');
        const chatInput = document.getElementById('chat-input');

        // Agregar un controlador de eventos para el envío del formulario
        chatForm.addEventListener('submit', (e) => {
        e.preventDefault();

        // Obtener el mensaje de entrada y borrar el campo de entrada
        const message = chatInput.value;
        chatInput.value = '';

        // Agregar el mensaje al chat
        app.addMessage({
            text: message,
            from: 'Me',
            img: "{{asset('storage/images/intellisai.svg')}}",
            link: '',
            register:false,
            timestamp: new Date().toLocaleTimeString('es-ES', format)
        });

        setTimeout(() => {
            var chatBody = document.getElementById('chat-message');
            chatBody.scrollTop = chatBody.scrollHeight;
        }, 100);


        // Enviar el mensaje al servidor
        axios.post('/sai/send', {
            message: message
        })
            .then(response => {

                app.employee.name = response.data.employee?.name??'';
                app.employee.identification = response.data.employee?.identification??'';
                app.employee.email = response.data.employee?.email??'';
                app.employee.phone = parseInt(response.data.employee?.phone)??'';
                app.employee.address = response.data.employee?.address??'';
                app.employee.area = response.data.employee?.area??'';
                app.employee.role = response.data.employee?.role??'';
                app.employee.status = response.data.employee?.status??'';
                app.employee.birthday = response.data.employee?.birthday??'';
                app.employee.dateOfHire = response.data.employee?.dateOfHire??'';
                app.employee.id = response.data.employee?.id??0;

                app.actionEmployee = response.data.update == true ? 'updateEmployee' : 'addEmployee';

                app.showForm = true;

                // Agregar la respuesta del servidor al chat
                app.addMessage({
                    text: response.data.message,
                    link: response.data.link??'',
                    register: response.data.register??false,
                    update: response.data.update??false,
                    parameter: response.data.parameter??'',
                    from: 'SaiBot',
                    img: "{{asset('storage/images/sai.png')}}",
                    timestamp: new Date().toLocaleTimeString('es-ES', format)
                });

                if(response.data.register){
                    app.showForm = true;
                }

                setTimeout(() => {
                    var chatBody = document.getElementById('chat-message');
                    chatBody.scrollTop = chatBody.scrollHeight;
                }, 100);


            })
            .catch(error => {
            console.log(error);
            });
        });



        // Cargar la conversación del chat desde el servidor
        // axios.get('/sai/history')
        // .then(response => {

        // // Agregar los mensajes del servidor al chat
        // app.messages = response.data;

        // console.log(app.messages);
        // // Ocultar la pantalla de carga
        // $('.loading').hide();
        // // Desplazarse al final del chat para mostrar el último mensaje
        // var chatBody = document.getElementById('chat-body');
        // chatBody.scrollTop = chatBody.scrollHeight;
        // })
        // .catch(error => {
        // console.log(error);
        // });
    </script>
@endsection
