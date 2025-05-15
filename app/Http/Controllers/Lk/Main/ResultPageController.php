<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultPageController extends Controller
{
    public function __invoke()
    {
        $pageInfo = [
            'title' => 'Личный кабинет | Результаты исследований',
            'description' => 'Страница результатов исследований'
        ];

        return view('lk.work.result-page', compact('pageInfo'));
    }
}
