<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Enums\Enums;

class ExtendAppealsTable extends Migration
{
    public function up()
    {
        Schema::table('appeals', function (Blueprint $table) {
            $table->string('surname', 40);
            $table->string('patronymic', 20)->nullable();
            $table->unsignedTinyInteger('age');
            $table->enum('gender', array_values(Enums::Gender));
        });
    }

    public function down()
    {
        Schema::table('appeals', function (Blueprint $table) {
            $table->dropColumn(['surname', 'patronymic', 'age', 'gender']);
        });
    }
}
