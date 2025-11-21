<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="bg-[#F9FAFB] font-[Poppins] text-gray-800">
    
    @include('components-dashboard.notlogin-navbar')

    <!-- HERO SECTION -->
    <div id="notlogin-herowelcome">
        @include('components-dashboard.notlogin-herowelcome')
    </div>

    <!-- MENU SECTION -->
    <div id="notlogin-menu">
        @include('components-dashboard.notlogin-menu')
    </div>

    <!-- TENTANG KITA SECTION -->
    <div id="notlogin-tentangkita">
        @include('components-dashboard.notlogin-tentangkita')
    </div>

    <!-- ULASAN SECTION -->
    <div id="notlogin-ulasan">
        @include('components-dashboard.notlogin-ulasan')
    </div>

    @include('components.footer')
</body>
</html>
