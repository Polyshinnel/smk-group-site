<?php

namespace App\Services;

use App\Models\PageInfo;

class PageInfoService
{
    public function getPageInfo(string $pageName): array {
        return PageInfo::where(['page_name' => $pageName])->first()->toArray();
    }
}
