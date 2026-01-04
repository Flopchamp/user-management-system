<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Management System</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Figtree', sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
            }

            .container {
                max-width: 1200px;
                padding: 40px;
                text-align: center;
            }

            .logo {
                font-size: 72px;
                font-weight: bold;
                margin-bottom: 20px;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            }

            .subtitle {
                font-size: 24px;
                margin-bottom: 40px;
                opacity: 0.9;
            }

            .features {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 30px;
                margin: 50px 0;
            }

            .feature-card {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                padding: 30px;
                border-radius: 15px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                transition: transform 0.3s;
            }

            .feature-card:hover {
                transform: translateY(-5px);
                background: rgba(255, 255, 255, 0.15);
            }

            .feature-icon {
                font-size: 48px;
                margin-bottom: 15px;
            }

            .feature-title {
                font-size: 20px;
                font-weight: 600;
                margin-bottom: 10px;
            }

            .feature-description {
                font-size: 14px;
                opacity: 0.9;
            }

            .auth-buttons {
                display: flex;
                gap: 20px;
                justify-content: center;
                margin-top: 40px;
            }

            .btn {
                padding: 15px 40px;
                font-size: 18px;
                font-weight: 600;
                border-radius: 10px;
                text-decoration: none;
                transition: all 0.3s;
                display: inline-block;
            }

            .btn-primary {
                background: white;
                color: #667eea;
            }

            .btn-primary:hover {
                background: #f0f0f0;
                transform: scale(1.05);
            }

            .btn-secondary {
                background: transparent;
                color: white;
                border: 2px solid white;
            }

            .btn-secondary:hover {
                background: rgba(255, 255, 255, 0.1);
                transform: scale(1.05);
            }

            .dashboard-link {
                background: rgba(255, 255, 255, 0.2);
                padding: 15px 30px;
                border-radius: 10px;
                text-decoration: none;
                color: white;
                font-weight: 600;
            }

            .dashboard-link:hover {
                background: rgba(255, 255, 255, 0.3);
            }

            @media (max-width: 768px) {
                .logo {
                    font-size: 48px;
                }

                .subtitle {
                    font-size: 18px;
                }

                .auth-buttons {
                    flex-direction: column;
                }

                .btn {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Top Navigation -->
            @if (Route::has('login'))
                <div style="position: absolute; top: 20px; right: 40px;">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="dashboard-link">
                            Dashboard →
                        </a>
                    @else
                        <a href="{{ route('login') }}" style="color: white; text-decoration: none; margin-right: 20px; font-weight: 600;">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color: white; text-decoration: none; font-weight: 600;">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <!-- Hero Section -->
            <div class="logo">👥 User Management</div>
            <div class="subtitle">Complete User Administration System</div>

            <!-- Features Grid -->
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">🔐</div>
                    <div class="feature-title">Secure Authentication</div>
                    <div class="feature-description">
                        Built-in login and registration system with password encryption
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">👨‍💼</div>
                    <div class="feature-title">Role-Based Access</div>
                    <div class="feature-description">
                        Admin and User roles with protected routes and permissions
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">✏️</div>
                    <div class="feature-title">Full CRUD Operations</div>
                    <div class="feature-description">
                        Create, Read, Update, and Delete users with ease
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <div class="feature-title">Beautiful UI</div>
                    <div class="feature-description">
                        Modern, responsive design built with Tailwind CSS
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🛡️</div>
                    <div class="feature-title">Form Validation</div>
                    <div class="feature-description">
                        Server-side validation to ensure data integrity
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <div class="feature-title">Fast & Efficient</div>
                    <div class="feature-description">
                        Built on Laravel framework for optimal performance
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            @guest
                <div class="auth-buttons">
                    <a href="{{ route('register') }}" class="btn btn-primary">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-secondary">
                        Sign In
                    </a>
                </div>
            @else
                <div class="auth-buttons">
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                        Go to Dashboard
                    </a>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                            Manage Users
                        </a>
                    @endif
                </div>
            @endguest

            <!-- Footer Info -->
            <div style="margin-top: 60px; opacity: 0.8; font-size: 14px;">
                <p>Built with Laravel • Secure • Scalable • Modern</p>
            </div>
        </div>
    </body>
</html>