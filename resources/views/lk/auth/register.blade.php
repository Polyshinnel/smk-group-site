@extends('lk.auth.layer.layer')
@section('title', $pageInfo['title'])
@section('description', $pageInfo['description'])

@section('content')
<style>
    * {
        font-family: "Sans Serif", sans-serif;
    }

    .auth-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .auth-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .auth-header h3 {
        color: #333;
        margin: 0;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #555;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: #4a90e2;
    }

    .error-message {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        width: 100%;
        margin-bottom: 10px;
    }

    .btn-primary {
        background: #0E8309;
        color: white;
    }

    .btn-primary:hover {
        background: #0a5d06;
    }

    .btn-secondary {
        background: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background: #5a6268;
    }

    .login-link {
        display: block;
        text-align: center;
        color: #0E8309;
        text-decoration: underline;
        margin-top: 15px;
        font-size: 14px;
    }

    .login-link:hover {
        text-decoration: none;
    }

    .is-invalid {
        border-color: #dc3545;
    }
</style>

<div class="auth-container">
    <div class="auth-header">
        <h3>Регистрация</h3>
    </div>

    <form method="POST" action="{{ route('register_user') }}">
        @csrf
        <div class="form-group">
            <label for="organization">Организация</label>
            <input type="text"
                   class="form-control @error('organization') is-invalid @enderror"
                   id="organization"
                   name="organization"
                   value="{{ old('organization') }}"
                   required>
            @error('organization')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   id="name"
                   name="name"
                   value="{{ old('name') }}"
                   required>
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="tel"
                   class="form-control @error('phone') is-invalid @enderror"
                   id="phone"
                   name="phone"
                   value="{{ old('phone') }}"
                   required>
            @error('phone')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Почта</label>
            <input type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   id="email"
                   name="email"
                   value="{{ old('email') }}"
                   required>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   id="password"
                   name="password"
                   required>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Повторите пароль</label>
            <input type="password"
                   class="form-control"
                   id="password_confirmation"
                   name="password_confirmation"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
    <a href="{{ route('login') }}" class="login-link">Уже есть аккаунт? Войти</a>
</div>
@endsection


