<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Lk\ClosedDocumentsService;
use Illuminate\Support\Facades\Auth;

class ClosedDocumentsPage extends Controller
{
    private ClosedDocumentsService $closedDocumentsService;

    public function __construct(ClosedDocumentsService $closedDocumentsService)
    {
        $this->closedDocumentsService = $closedDocumentsService;
    }

    public function __invoke()
    {
        $userId = Auth::id();
        $user = User::find($userId);

        $closedDocuments = $this->closedDocumentsService->getClosedDocuments($user);

        $pageInfo = [
            'title' => 'Личный кабинет | Закрывающие документы',
            'description' => 'Закрывающие документы'
        ];

        return view('lk.work.closed-doc-page', compact('pageInfo', 'closedDocuments'));
    }
}
