@extends('Layouts.sai')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card chat-card">
        <div class="card-header bg-primary text-light" style="text-align: center">
          <h4 class="card-title">{{$title}}</h4>
        </div>
        <div class="card-body chat-body" id="chat-body">
          <div class="loading">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
            <p class="text-center">Cargando conversación...</p>
          </div>
          <div v-for="message in messages" class="chat-message" :class="{ sent: message.from === 'me', received: message.from === 'SailBot' }">
            <div class="chat-meta">
              <span class="chat-from">@{{ message.from }}</span>
              <span class="chat-time">@{{ message.timestamp }}</span>
            </div>
            <div class="chat-text">@{{ message.text }}</div>
          </div>
        </div>
        <div class="card-footer chat-footer">
          <form id="chat-form">
            <div class="input-group">
              <input type="text" class="form-control" id="chat-input" placeholder="Escribe un mensaje...">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<!-- Librerías de JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>

  <!-- Script para manejar el chat -->
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
      }
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
        timestamp: new Date()
      });

      // Enviar el mensaje al servidor
      axios.post('/sai/send', {
        message: message
      })
        .then(response => {
          // Agregar la respuesta del servidor al chat
          app.addMessage({
            text: response.data.message,
            from: 'SailBot',
            timestamp: new Date()
          });
        })
        .catch(error => {
          console.log(error);
        });
    });

    // Cargar la conversación del chat desde el servidor
    axios.get('/sai/history')
    .then(response => {
      
      // Agregar los mensajes del servidor al chat
      app.messages = response.data;

      console.log(app.messages);
      // Ocultar la pantalla de carga
      $('.loading').hide();
      // Desplazarse al final del chat para mostrar el último mensaje
      var chatBody = document.getElementById('chat-body');
      chatBody.scrollTop = chatBody.scrollHeight;
    })
    .catch(error => {
      console.log(error);
    });
  </script>

<!-- Estilos CSS -->
<style>
 /* Estilos para el chat */
.chat-card {
  margin-top: 25px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.chat-card .card-header {
  background-color: #f8f9fa;
  border-bottom: none;
}

.chat-card .card-body {
  height: 350px;
  overflow-y: auto;
  padding: 0px;
}

.chat-card .chat-message {
  display: flex;
  align-items: center;
  margin: 10px;
  max-width: 80%;
  word-break: break-word;
}

.chat-card .chat-message .chat-meta {
  color: #999;
  font-size: 12px;
  margin-right: 10px;
}

.chat-card .chat-message .chat-from {
  font-weight: bold;
}

.chat-card .chat-message .chat-time {
  margin-left: 5px;
}

.chat-card .chat-message .chat-text {
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  border-radius: 10px;
  font-size: 14px;
}

.chat-card .chat-message.sent .chat-text {
  background-color: #28a745;
  color: #fff;
  margin-left: auto;
}

.chat-card .chat-message.received .chat-text {
  background-color: #176222;
  color: #fff;
  margin-right: auto;
}

.chat-card .chat-footer {
  background-color: #f8f9fa;
  border-top: none;
  padding: 10px;
}

.chat-card .chat-footer form {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.chat-card .chat-footer form input[type="text"] {
  border: none;
  outline: none;
  flex: 1;
  margin-right: 10px;
}

.chat-card .chat-footer form button[type="submit"] {
  border: none;
  outline: none;
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border-radius: 10px;
  font-size: 14px;
  cursor: pointer;
  transition: background-color 0.2s;
}

.chat-card .chat-footer form button[type="submit"]:hover {
  background-color: #0062cc;
}

.chat-card .loading {
  text-align: center;
  margin-top: 20px;
}

.chat-card .no-messages {
  text-align: center;
  margin-top: 20px;
  color: #999;
}

</style>


@endsection

