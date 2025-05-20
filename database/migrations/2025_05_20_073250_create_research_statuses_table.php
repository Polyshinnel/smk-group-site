<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('research_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color');
            $table->boolean('researched')->default(false);
            $table->timestamps();
        });

        $data_items = [
            [
                'name' => 'Не исследован',
                'color' => '#83090E',
            ],
            [
                'name' => 'На исследовании',
                'color' => '#E6B800',
            ],
            [
                'name' => 'Исследован',
                'color' => '#0E8309',
                'researched' => true,
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('research_statuses')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_statuses');
    }
};
