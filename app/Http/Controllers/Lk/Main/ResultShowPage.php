<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Lk\ResearchResultService;
use App\Service\Lk\BillService;
use App\Service\Lk\ClosedDocumentsService;
use Illuminate\Support\Facades\Auth;

class ResultShowPage extends Controller
{
    private ResearchResultService $researchResultService;
    private BillService $billService;
    private ClosedDocumentsService $closedDocumentsService;

    public function __construct(
        ResearchResultService $researchResultService,
        BillService $billService,
        ClosedDocumentsService $closedDocumentsService
    ) {
        $this->researchResultService = $researchResultService;
        $this->billService = $billService;
        $this->closedDocumentsService = $closedDocumentsService;
    }

    public function __invoke(int $research_id)
    {
        $userId = Auth::id();
        $user = User::find($userId);

        $researchResults = $this->researchResultService->getResearchResults($research_id);
        $invoices = $this->billService->getBills($user)->where('research_id', $research_id);
        $closingDocuments = $this->closedDocumentsService->getClosedDocuments($user)->where('research_id', $research_id);

        $pageInfo = [
            'title' => 'Личный кабинет | Результаты исследований '.$research_id,
            'description' => 'Страница результатов исследований '.$research_id
        ];

        return view('lk.work.result-page-details', compact('pageInfo', 'researchResults', 'invoices', 'closingDocuments'));
    }
}
