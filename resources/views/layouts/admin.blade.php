<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('system_title', 'CLSU ETEEAP Admin') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome 6 (for modern icon syntax) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Font Awesome 4 (for backward compatibility with existing icons) -->
    <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Inspinia CSS Files -->
    <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">

    @yield('styles')

    <style>
        /* Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap');
        
        /* Admin Layout Core Styles */
        html, body {
            height: 100%;
            overflow-x: hidden;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f8fdf8 0%, #f0f7f0 50%, #e8f5e8 100%);
            min-height: 100vh;
        }
        
        #wrapper {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }
        
        #page-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
            background: transparent !important;
            width: 100%;
        }
        
        .wrapper-content {
            flex: 1;
            padding: 0;
        }
        
        /* Modern Card Styles */
        .modern-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 102, 51, 0.08), 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .modern-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 102, 51, 0.15), 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        /* Glassmorphism Effect */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .glass-dark {
            background: rgba(0, 102, 51, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #006633 0%, #00994d 50%, #D4AF37 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Animated Gradient Background */
        .animated-gradient {
            background: linear-gradient(-45deg, #006633, #008844, #00994d, #D4AF37);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Floating Animation */
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        /* Pulse Animation */
        .pulse-soft {
            animation: pulseSoft 2s ease-in-out infinite;
        }
        
        @keyframes pulseSoft {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        /* Shimmer Effect */
        .shimmer {
            position: relative;
            overflow: hidden;
        }
        
        .shimmer::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: shimmer 2s infinite;
        }
        
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        /* Modern Button Styles */
        .btn-modern {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-modern:hover::before {
            left: 100%;
        }
        
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 102, 51, 0.4);
        }
        
        /* Input Focus Effects */
        .input-modern {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid rgba(0, 102, 51, 0.1);
        }
        
        .input-modern:focus {
            border-color: #006633;
            box-shadow: 0 0 0 4px rgba(0, 102, 51, 0.1), 0 4px 12px rgba(0, 102, 51, 0.15);
            transform: translateY(-1px);
        }
        
        /* Stats Card Hover */
        .stat-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
        }
        
        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .stat-icon {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Table Row Hover */
        .table-row-modern {
            transition: all 0.2s ease;
        }
        
        .table-row-modern:hover {
            background: linear-gradient(90deg, rgba(0, 102, 51, 0.03) 0%, rgba(212, 175, 55, 0.03) 100%);
            transform: scale(1.002);
        }
        
        /* Badge Styles */
        .badge-modern {
            position: relative;
            overflow: hidden;
        }
        
        .badge-modern::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.3) 50%, transparent 70%);
            animation: badgeShine 3s infinite;
        }
        
        @keyframes badgeShine {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(100%) rotate(45deg); }
        }
        
        /* Responsive adjustments */
        @media (max-width: 1023px) {
            #wrapper {
                flex-direction: column;
            }
            
            #page-wrapper {
                width: 100% !important;
                margin-left: 0 !important;
                padding-left: 0 !important;
            }
            
            /* Ensure sidebar is hidden on mobile until toggled */
            #mobile-sidebar {
                position: fixed !important;
                left: 0 !important;
                right: auto !important;
            }
        }
        
        @media (min-width: 1024px) {
            #wrapper {
                flex-direction: row;
            }
            
            #page-wrapper {
                margin-left: 0;
                flex: 1;
                width: calc(100% - 280px);
            }
            
            #mobile-sidebar {
                position: static !important;
                transform: translateX(0) !important;
                flex-shrink: 0;
            }
        }
        
        /* Print styles */
        @media print {
            #wrapper {
                display: block;
            }
            
            #mobile-sidebar,
            .no-print,
            nav,
            aside,
            footer {
                display: none !important;
            }
            
            #page-wrapper {
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
                background: white !important;
            }
            
            .wrapper-content {
                padding: 0 !important;
            }
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom selection color */
        ::selection {
            background: rgba(0, 102, 51, 0.2);
            color: #004d26;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #006633, #004d26);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #008844, #006633);
        }
        
        /* Loading Skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s infinite;
        }
        
        @keyframes skeleton-loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        
        /* Tooltip Styles */
        .tooltip-modern {
            position: relative;
        }
        
        .tooltip-modern::after {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(-5px);
            padding: 8px 12px;
            background: #1a1a1a;
            color: white;
            font-size: 12px;
            border-radius: 8px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .tooltip-modern:hover::after {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(-10px);
        }
        
        /* Notification Dot */
        .notification-dot {
            position: relative;
        }
        
        .notification-dot::after {
            content: '';
            position: absolute;
            top: -2px;
            right: -2px;
            width: 10px;
            height: 10px;
            background: #ef4444;
            border-radius: 50%;
            border: 2px solid white;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }
    </style>

</head>
<body class="antialiased">

<div id="wrapper">
    @include('admin.includes.sidebar')  <!-- Load Sidebar -->

    <div id="page-wrapper">
        @include('admin.includes.header')  <!-- Load Header -->

        <div class="wrapper-content">
            @yield('content')  <!-- Page content goes here -->
        </div>

        @include('admin.includes.footer')  <!-- Load Footer -->
    </div>
</div>
@include('partials.footer')
<!-- Inspinia JS Files -->



    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('inspinia/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('inspinia/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('inspinia/js/inspinia.js') }}"></script>

@yield('scripts')
</body>
</html>
