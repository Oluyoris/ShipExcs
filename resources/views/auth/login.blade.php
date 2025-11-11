@extends('layouts.app')

@section('content')
<style>
    .login-container {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
    }

    .login-container::before {
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

    .login-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        max-width: 900px;
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 500px;
        position: relative;
        z-index: 2;
    }

    .login-left {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        overflow: hidden;
    }

    .login-left::before {
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

    .login-left-content {
        text-align: center;
        color: white;
        z-index: 2;
        position: relative;
    }

    .login-left h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .login-left p {
        font-size: 1.1rem;
        opacity: 0.9;
        line-height: 1.6;
    }

    .login-right {
        padding: 60px 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .login-header .logo {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: white;
        font-size: 24px;
        font-weight: bold;
    }

    .login-header h3 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .login-header p {
        color: #666;
        font-size: 1rem;
    }

    .form-group {
        margin-bottom: 25px;
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #e1e5e9;
        border-radius: 10px;
        font-size: 16px;
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
        margin-bottom: 8px;
        display: block;
    }

    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }

    .form-check {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .form-check-input {
        margin-right: 8px;
    }

    .form-check-label {
        color: #666;
        font-size: 14px;
    }

    .forgot-password {
        color: #667eea;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
    }

    .forgot-password:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    .btn-login {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .social-login {
        text-align: center;
        margin-top: 20px;
    }

    .social-login p {
        color: #666;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-icon:hover {
        background: #667eea;
        color: white;
        transform: translateY(-2px);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .login-card {
            grid-template-columns: 1fr;
            margin: 20px;
        }

        .login-left {
            display: none;
        }

        .login-right {
            padding: 40px 30px;
        }

        .login-header h3 {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .login-container {
            padding: 20px 10px;
        }

        .login-right {
            padding: 30px 20px;
        }
    }
</style>

<div class="login-container">
    <div class="login-card">
        <div class="login-left">
            <div class="login-left-content">
                <h2>Welcome to SHIPEX</h2>
                <p>Your trusted partner in global logistics and courier services. Experience seamless shipping solutions worldwide.</p>
            </div>
        </div>
        
        <div class="login-right">
            <div class="login-header">
                <div class="logo">
                    <i class="fas fa-shipping-fast"></i>
                </div>
                <h3>Hello, Welcome!</h3>
                <p>Sign in to your account</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" 
                           type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="email" 
                           autofocus
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
                           autocomplete="current-password"
                           placeholder="Enter your password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-check">
                    <div>
                        <input class="form-check-input" 
                               type="checkbox" 
                               name="remember" 
                               id="remember" 
                               {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn-login">
                    {{ __('Login') }}
                </button>
            </form>

            <div class="social-login">
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