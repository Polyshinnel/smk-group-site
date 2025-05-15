<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function __invoke()
    {
        $pageInfo = [
            'title' => 'Личный кабинет | Главная',
            'description' => 'Главная страница кабинета'
        ];

        return view('lk.work.main-page', compact('pageInfo'));
    }
}
