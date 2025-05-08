<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaterialPdfToClassesTable extends Migration
{
    public function up()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->string('material_pdf')->nullable()->after('description');
        });
    }

    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->dropColumn('material_pdf');
        });
    }
}
