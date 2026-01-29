<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'ETEEAP - CLSU')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS with CLSU Configuration -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'clsu': {
                            'green': '#087A29',
                            'green-dark': '#065a1f',
                            'green-light': '#0a9e35',
                            'gold': '#F9B233',
                            'gold-dark': '#d4962b',
                            'gold-light': '#ffc107',
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Animation CSS -->
    <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
    
    <!-- Alpine.js cloak style to prevent flash -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('styles')
</head>

<body class="font-sans antialiased bg-gray-50">
    <script>
        var isEditOrView = @json(Route::is('application.edit') || Route::is('application/*/view*'));
    </script>

    @if (!request()->is('application/*/view*'))
        @include('partials.navbar')
    @endif

    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        var isCreatePage = {{ (request()->routeIs('user.application.information') || request()->routeIs('user.application.create')) ? 'true' : 'false' }};
    </script>
    <script src="{{ asset('js/autosave.js') }}"></script>
    
    @stack('scripts')
</body>
</html>