@extends('layouts.app')

@section('content')
<style>
    .register-container {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
    }

    .register-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="%23ff6b35" stop-opacity="0.1"/><stop offset="100%" stop-color="%23ff6b35" stop-opacity="0"/></radialGradient></defs><circle cx="200" cy="200" r="150" fill="url(%23a)"/><circle cx="800" cy="300" r="200" fill="url(%23a)"/><circle cx="400" cy="700" r="180" fill="url(%23a)"/></svg>') no-repeat center center;
        background-size: cover;
        opacity: 0.3;
    }

    .register-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        max-width: 900px;
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 600px;
        position: relative;
        z-index: 2;
    }

    .register-left {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        overflow: hidden;
    }

    .register-left::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M20,20 Q50,5 80,20 Q95,50 80,80 Q50,95 20,80 Q5,50 20,20" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/><path d="M10,50 Q30,30 50,50 Q70,70 90,50" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.3"/></svg>') repeat;
        animation: float 20s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }

    .register-left-content {
        text-align: center;
        color: white;
        z-index: 2;
        position: relative;
    }

    .register-left h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .register-left p {
        font-size: 1.1rem;
        opacity: 0.9;
        line-height: 1.6;
    }

    .register-right {
        padding: 50px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .register-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .register-header .logo {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        color: white;
        font-size: 20px;
        font-weight: bold;
    }

    .register-header h3 {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .register-header p {
        color: #666;
        font-size: 0.9rem;
    }

    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 12px 18px;
        border: 2px solid #e1e5e9;
        border-radius: 10px;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
        display: block;
        font-size: 14px;
    }

    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 13px;
        margin-top: 4px;
    }

    .btn-register {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .login-link {
        text-align: center;
        margin-top: 15px;
    }

    .login-link p {
        color: #666;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .login-link a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
    }

    .login-link a:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    .social-register {
        text-align: center;
        margin-top: 15px;
    }

    .social-register p {
        color: #666;
        font-size: 13px;
        margin-bottom: 12px;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 12px;
    }

    .social-icon {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .social-icon:hover {
        background: #667eea;
        color: white;
        transform: translateY(-2px);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .register-card {
            grid-template-columns: 1fr;
            margin: 20px;
        }

        .register-left {
            display: none;
        }

        .register-right {
            padding: 40px 30px;
        }

        .register-header h3 {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .register-container {
            padding: 20px 10px;
        }

        .register-right {
            padding: 30px 20px;
        }
    }
</style>

<div class="register-container">
    <div class="register-card">
        <div class="register-left">
            <div class="register-left-content">
                <h2>Join SHIPEX Today</h2>
                <p>Create your account and start experiencing world-class shipping services. Connect with our global network of logistics solutions.</p>
            </div>
        </div>
        
        <div class="register-right">
            <div class="register-header">
                <div class="logo">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h3>Create Account</h3>
                <p>Join thousands of satisfied customers</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="form-group">
                    <label for="name" class="form-label">{{ __('Full Name') }}</label>
                    <input id="name" 
                           type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required 
                           autocomplete="name" 
                           autofocus
                           placeholder="Enter your full name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" 
                           type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="email"
                           placeholder="name@example.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" 
                           type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           name="password" 
                           required 
                           autocomplete="new-password"
                           placeholder="Create a strong password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" 
                           type="password" 
                           class="form-control" 
                           name="password_confirmation" 
                           required 
                           autocomplete="new-password"
                           placeholder="Confirm your password">
                </div>

                <button type="submit" class="btn-register">
                    {{ __('Create Account') }}
                </button>
            </form>

            <div class="login-link">
                <p>Already have an account?</p>
                <a href="{{ route('login') }}">Sign in here</a>
            </div>

            <div class="social-register">
                <p>Follow us</p>
                <div class="social-icons">
                    <a href="#" class="social-icon" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon" target="_blank">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection