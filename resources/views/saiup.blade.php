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

@endsection

@section('scripts')
    <script>
        const format = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: false, timeZone: 'America/Bogota' };
        // Inicializar la instancia de Vue.js
        var app = new Vue({
            el: '#chat-body',
            data: function() {
                return {
                    messages: []
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
                }
            },
            mounted: function () {

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
                timestamp: new Date().toLocaleTimeString('es-ES',format)
            });
        }, 4000);


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
                console.log(response);
                // Agregar la respuesta del servidor al chat
                app.addMessage({
                    text: response.data.message,
                    link: response.data.link??'',
                    from: 'SaiBot',
                    img: "{{asset('storage/images/sai.png')}}",
                    timestamp: new Date().toLocaleTimeString('es-ES', format)
                });

                setTimeout(() => {
                    var chatBody = document.getElementById('chat-message');
                    chatBody.scrollTop = chatBody.scrollHeight;
                }, 100);

            
            })
            .catch(error => {
            console.log(error);
            });
        });

       


        // document.getElementById('sidebar').classList.toggle('hidden');

        const menuDesplegable = document.getElementById('menu-overlay');
        menuDesplegable.style.transform = 'translateX(-100%)';

        const overlay = document.getElementById('overlay');

        const btnMenu = document.getElementById('mobile-menu-button');

        btnMenu.addEventListener("click", () => {
            if (menuDesplegable.style.transform === 'translateX(-100%)') {
                overlay.style.display = 'block';
                menuDesplegable.style.transform = 'translateX(0%)';
            } else {
                overlay.style.display = 'none';
                menuDesplegable.style.transform = 'translateX(-100%)';
            }
            
        });

        overlay.addEventListener("click", () => {
            overlay.style.display = 'none';
            menuDesplegable.style.transform = 'translateX(-100%)';
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