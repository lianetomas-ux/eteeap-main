<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'CLSU ETEEAP' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }
        
        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }
        
        .email-header {
            background: linear-gradient(135deg, #006633 0%, #004d26 100%);
            padding: 30px 20px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        
        .email-logo {
            max-width: 120px;
            height: auto;
            margin-bottom: 15px;
        }
        
        .email-title {
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .email-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
        }
        
        .email-body {
            padding: 40px 30px;
        }
        
        .email-content {
            color: #333333;
            font-size: 16px;
            line-height: 1.8;
        }
        
        .email-button {
            display: inline-block;
            padding: 14px 32px;
            background: linear-gradient(135deg, #006633 0%, #004d26 100%);
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            margin: 20px 0;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 102, 51, 0.3);
        }
        
        .email-button:hover {
            background: linear-gradient(135deg, #008844 0%, #006633 100%);
        }
        
        .email-footer {
            background-color: #f8f9fa;
            padding: 25px 30px;
            text-align: center;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            border-top: 1px solid #e5e7eb;
        }
        
        .email-footer-text {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 10px;
        }
        
        .email-footer-link {
            color: #006633;
            text-decoration: none;
        }
        
        .email-info-box {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border-left: 4px solid #006633;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .email-info-box.warning {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            border-left-color: #6b7280;
        }
        
        .email-info-box.neutral {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-left-color: #64748b;
        }
        
        .email-info-box.info {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            border-left-color: #2563eb;
        }
        
        .email-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e5e7eb, transparent);
            margin: 30px 0;
        }
        
        @media only screen and (max-width: 600px) {
            .email-body {
                padding: 30px 20px;
            }
            
            .email-title {
                font-size: 20px;
            }
            
            .email-button {
                display: block;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div style="padding: 20px;">
        <div class="email-wrapper">
            <!-- Header -->
            <div class="email-header">
                <img src="{{ asset('images/cl.png') }}" alt="CLSU Logo" class="email-logo">
                <h1 class="email-title">CLSU ETEEAP</h1>
                <p class="email-subtitle">Central Luzon State University</p>
            </div>
            
            <!-- Body -->
            <div class="email-body">
                @yield('content')
            </div>
            
            <!-- Footer -->
            <div class="email-footer">
                <p class="email-footer-text">
                    <strong>Central Luzon State University</strong><br>
                    Science City of Muñoz, Nueva Ecija
                </p>
                <p class="email-footer-text" style="margin-top: 15px;">
                    This is an automated email. Please do not reply directly to this message.<br>
                    If you have any questions, please contact us at 
                    <a href="mailto:support@clsu.edu.ph" class="email-footer-link">support@clsu.edu.ph</a>
                </p>
                <p class="email-footer-text" style="margin-top: 15px; font-size: 12px; color: #9ca3af;">
                    © {{ date('Y') }} CLSU ETEEAP. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
