<?php

namespace App\Service\Lk;

use App\Models\ResearchResult;
use Illuminate\Support\Collection;

class ResearchResultService
{
    public function getResearchResults(int $researchId): ?Collection
    {
        return ResearchResult::where('research_id', $researchId)->get();
    }
}
