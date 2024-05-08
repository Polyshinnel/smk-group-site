<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index() {
        $pageName = 'index';
        $pageInfo = $this->pageInfoService->getPageInfo($pageName);
        $categories = $this->categoryService->getCategoryData();

        return view('index', ['pageInfo' => $pageInfo, 'categories' => $categories]);
    }
}
