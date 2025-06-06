<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description')">
    <link rel="icon" href="/assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/js/fancybox/fancybox.css">
    <link rel="stylesheet" href="assets/css/style.css?ver=123">
    <title>@yield('title')</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: sans-serif;
        }
        .layout {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #ffffff;
            color: #333;
            padding: 20px;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #ccc;
        }
        .sidebar-header {
            margin-bottom: 30px;
            text-align: center;
        }
        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .nav-item {
            margin-bottom: 10px;
        }
        .nav-link {
            color: #333;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .nav-link:hover {
            background-color: #f5f5f5;
        }
        .nav-link.active {
            background-color: #e8f5e9;
            color: #0E8309;
            font-weight: 500;
        }
        .nav-link.logout {
            margin-top: auto;
            color: #e74c3c;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #f5f6fa;
        }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Личный кабинет</h2>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="/lk/main" class="nav-link {{ request()->is('lk/main') ? 'active' : '' }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="/lk/bill" class="nav-link {{ request()->is('lk/bill') ? 'active' : '' }}">Счета</a>
                    </li>
                    <li class="nav-item">
                        <a href="/lk/closed-documents" class="nav-link {{ request()->is('lk/closed-documents') ? 'active' : '' }}">Закрывающие документы</a>
                    </li>
                    <li class="nav-item">
                        <a href="/lk/result" class="nav-link {{ request()->is('lk/result') ? 'active' : '' }}">Заказы</a>
                    </li>
                    
                </ul>
            </nav>
            <a href="/lk/logout" class="nav-link logout">Выход</a>
        </aside>
        <main class="main-content">
            @yield('content')
        </main>
    </div>
</body>
</html>
