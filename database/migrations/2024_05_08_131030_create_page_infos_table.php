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
        Schema::create('page_infos', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });

        $dataItems = [
            [
                'page_name' => 'index',
                'title' => 'СМК Сервис - Центр сертификации и СМК',
                'description' => 'Сертификация - это просто. СМК, ISO, ТР - ТС. Решаем вопросы сертификации',
            ]
        ];
        foreach ($dataItems as $item) {
            DB::table('page_infos')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_infos');
    }
};
