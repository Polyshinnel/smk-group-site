<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_name');
            $table->string('class_name');
            $table->string('category_title');
            $table->timestamps();
        });

        $dataItems = [
            [
                'name' => 'iso',
                'id_name' => 'iso',
                'class_name' => 'service-block-1',
                'category_title' => 'УСЛУГИ ПО ISO И СМК'
            ],
            [
                'name' => 'smk',
                'id_name' => 'smk',
                'class_name' => 'service-block-2',
                'category_title' => 'АУТСОРСИНГ СМК'
            ],
            [
                'name' => 'tr-ts',
                'id_name' => 'tr-ts',
                'class_name' => 'service-block-3',
                'category_title' => 'СЕРТИФИКАТЫ И ДЕКЛАРАЦИИ О СООТВЕТСВИИ ПРОДУКЦИИ'
            ],
        ];
        foreach ($dataItems as $item) {
            DB::table('categories')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
