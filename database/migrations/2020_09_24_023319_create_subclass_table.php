<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubclassTable extends Migration
{

    public function up()
    {
        Schema::create('subclass', function (Blueprint $table) {
            $table->increments('idsubclass');
            $table->integer('idclass');
            $table->string('headmateri');
            $table->softDeletes();
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }


    public function down()
    {
        Schema::dropIfExists('subclass');
    }
}
