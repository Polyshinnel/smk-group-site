<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\PageInfoService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public CategoryService $categoryService;
    public PageInfoService $pageInfoService;

    public function __construct(CategoryService $categoryService, PageInfoService $pageInfoService)
    {
        $this->categoryService = $categoryService;
        $this->pageInfoService = $pageInfoService;
    }
}
