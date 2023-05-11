<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntelliSai</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <section class="lg:flex lg:flex-row lg:h-full">
        @yield('content')

    </section>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>



<script>
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
</script>

@yield('scripts')


<style>
    body {
    font-family: 'Poppins', sans-serif;
    }

    #mobile-menu-button {
        z-index: 999;
    }



</style>
</html>
