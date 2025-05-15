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
        text-align: center;
    }

    .auth-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .auth-header h1 {
        color: #333;
        margin: 20px 0;
        font-size: 28px;
    }

    .auth-header h2 {
        color: #555;
        margin: 15px 0;
        font-size: 18px;
        font-weight: normal;
        line-height: 1.5;
    }

    .warning-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto;
    }

    .btn {
        display: block;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        width: calc(100% - 40px);
        margin: 20px auto 0;
    }

    .btn-primary {
        background: #0E8309;
        color: white;
    }

    .btn-primary:hover {
        background: #0a5d06;
    }

    .email-link {
        color: #0E8309;
        text-decoration: none;
    }

    .email-link:hover {
        text-decoration: underline;
    }
</style>

<div class="auth-container">
    <div class="auth-header">
        <svg class="warning-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM13 17H11V15H13V17ZM13 13H11V7H13V13Z" fill="#0E8309"/>
        </svg>
        <h1>Внимание!</h1>
        <h2>Вы еще не авторизованы для входа в личный кабинет. Обычно авторизация проходит в течении нескольких дней. Если этого не случилось, свяжитесь по почте:<br><a href="mailto:info@smk-service40.ru" class="email-link">info@smk-service40.ru</a></h2>
    </div>
    <a href="{{ route('login') }}" class="btn btn-primary">Авторизация</a>
</div>
@endsection
