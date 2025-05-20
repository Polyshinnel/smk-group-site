<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;
use App\Service\Lk\ResearchResultService;

class ResultShowPage extends Controller
{
    private ResearchResultService $researchResultService;

    public function __construct(ResearchResultService $researchResultService)
    {
        $this->researchResultService = $researchResultService;
    }
    public function __invoke(int $research_id)
    {
        $researchResults = $this->researchResultService->getResearchResults($research_id);
        $pageInfo = [
            'title' => 'Личный кабинет | Результаты исследований '.$research_id,
            'description' => 'Страница результатов исследований '.$research_id
        ];

        return view('lk.work.result-page-details', compact('pageInfo', 'researchResults'));
    }
}
