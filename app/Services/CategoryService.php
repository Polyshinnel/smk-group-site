<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getCategoryData(): array {
        $categories = Category::all();
        $categoryData = [];
        if($categories) {
            foreach ($categories as $category) {
                $services = $category->services;
                $serviceList = [];
                if($services) {
                    $counter = 1;
                    foreach ($services as $service) {
                        $serviceList[] = [
                            'counter' => $counter,
                            'title' => $service->title,
                            'description' => $service->description,
                            'price' => $service->price,
                            'example' => $service->example
                        ];
                        $counter++;
                    }
                }
                $categoryData[] = [
                    'category_title' => $category->category_title,
                    'id_name' => $category->id_name,
                    'class_name' => $category->class_name,
                    'services' => $serviceList
                ];
            }
        }

        return $categoryData;
    }
}
