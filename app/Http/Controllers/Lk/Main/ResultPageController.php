<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Lk\ResearchResultService;
use App\Service\Lk\ResearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultPageController extends Controller
{
    private ResearchService $researchService;

    public function __construct(ResearchService $researchService)
    {
        $this->researchService = $researchService;
    }

    public function __invoke()
    {
        $userId = Auth::id();
        $user = User::find($userId);

        $researchResult = $this->researchService->getAllUserResearch($user);

        $pageInfo = [
            'title' => 'Личный кабинет | Результаты исследований',
            'description' => 'Страница результатов исследований'
        ];

        return view('lk.work.result-page', compact('pageInfo', 'researchResult'));
    }
}
