@extends('Layouts.saiAdmin')
@section('content')

    @include('nav.saiNav')

<div class="bg-gray-100 xl:w-9/12 lg:w-8/12 hidden lg:block" id="chat-body">
    <div class="py-2 px-20 border-b">
        <div class="flex">
            <div class="flex flex-grow">
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
                <svg class="w-6 mr-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <svg class="w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="py-2 px-20 h-3/4 overflow-auto">
        <div v-for="message in messages" :class="{ 'flex mb-12': message.from === 'SailBot', 'flex flex-row-reverse mb-12': message.from === 'Me' }">
            <img :src="message.img" :class="{ 'self-end rounded-full w-12 mr-4': message.from === 'SailBot', 'self-end rounded-full w-12 ml-4': message.from === 'Me' }">
            <div class="flex flex-col">
                <div :class="{ 'bg-blue-500 text-white p-6 rounded-3xl rounded-br-none w-96 mb-2': message.from === 'SailBot', 'bg-white p-6 rounded-3xl rounded-bl-none w-96 shadow-sm mb-2': message.from === 'Me' }">
                    <p class="font-medium mb-1">@{{ message.from }}</p>
                    <small :class="{ 'inline-block mb-1': message.from === 'SailBot', 'inline-block text-gray-500 mb-1': message.from === 'Me' }">@{{ message.text }}</small>
                    <a target="__blanck" v-if ="message.link !== ''" :href="message.link">Ver reporte</a>
                </div>
                <small :class="{ 'text-gray-500 self-end': message.from === 'SailBot', 'text-gray-500': message.from === 'Me' }">@{{ message.timestamp }}</small>
            </div>
        </div>
        {{-- <div class="flex flex-row-reverse mb-12">
            <img src="{{ asset('storage/images/intellisai.svg') }}" class="self-end rounded-full w-12 ml-4">
            <div class="flex flex-col">
                <div class="bg-blue-500 text-white p-6 rounded-3xl rounded-br-none w-96 mb-2">
                    <p class="font-medium mb-1">@{{ message.from }}</p>
                    <small class="inline-block mb-1">@{{ message.text }}</small>
                </div>
                <small class="text-gray-500 self-end">@{{ message.timestamp }}</small>
            </div>
        </div> --}}
    </div>
    <form id="chat-form" class="flex py-2 px-20 border-t">
        <div class="w-4/5">
            <input type="text" id="chat-input" class="rounded-sm px-4 py-2 focus:outline-none bg-gray-100 w-full" placeholder="Escribe tu mensaje..."> 
        </div>
        <div class="w-1/5 flex justify-end">
            <svg class="w-6 mr-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
            </svg>
            <svg class="w-6 mr-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

            
            this.addMessage({
                text: "Bienvenido, yo soy Sai, tu asistente inteligente, estoy para ayudarte a resolver tus dudas, ¿en qué puedo ayudarte?",
                link: '',
                from: 'SailBot',
                img: "{{asset('storage/images/sai.png')}}",
                timestamp: new Date()
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
            timestamp: new Date()
        });

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
                from: 'SailBot',
                img: "{{asset('storage/images/sai.png')}}",
                timestamp: new Date()
            });
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