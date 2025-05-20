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
        Schema::create('bill_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color');
            $table->boolean('payed')->default(false);
            $table->timestamps();
        });

        $data_items = [
            [
                'name' => 'Не оплачен',
                'color' => '#83090E',
            ],
            [
                'name' => 'Оплачен',
                'color' => '#0E8309',
                'payed' => true,
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('bill_statuses')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_statuses');
    }
};
