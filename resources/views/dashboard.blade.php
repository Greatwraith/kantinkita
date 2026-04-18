<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body class="bg-[#F9FAFB] font-[Poppins] text-gray-800">
    
    @include('components.navbar')

   
        @include('components.dashboard.login-herowelcome')
   

 
        @include('components.dashboard.login-menu')
  


        @include('components.dashboard.login-tentangkita')
 
        @include('components.dashboard.login-ulasan')


    @include('components.footer')
</body>
</html>
