<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('abbreviation');
            $table->string('name');
            $table->string('reference_code')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('description')->nullable();
            $table->date('date_inserted');
            $table->date('date_updated');
            $table->string('status');
            $table->integer('section_owner');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
}
