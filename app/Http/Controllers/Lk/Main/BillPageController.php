<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillPageController extends Controller
{
    public function __invoke()
    {
        $pageInfo = [
            'title' => 'Личный кабинет | Счета',
            'description' => 'Страница счетов'
        ];

        return view('lk.work.bill-page', compact('pageInfo'));
    }
}
