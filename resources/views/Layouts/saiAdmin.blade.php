<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntelliSai</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <section class="flex flex-col h-screen overflow-hidden lg:flex-row">
        @yield('content')
     
    </section> 
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>

@yield('scripts')


<style>
    body {
    font-family: 'Poppins', sans-serif;
    }

    .section {
        overflow-y: scroll;
    }

    @media only screen and (max-width: 600px) {
        .section {
            overflow-y: scroll;
        }
    }



</style>
</html>