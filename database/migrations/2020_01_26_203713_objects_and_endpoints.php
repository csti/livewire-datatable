<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ObjectsAndEndpoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->index();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('model_name')->nullable();
            $table->schemalessAttributes('options');
            $table->integer('database_connection_id')->unsigned()->nullable()->default(null);
            $table->timestamps();
            $table->unique(['database_connection_id', 'slug'], 'data_types_unique');
        });

        Schema::create('object_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('object_id')->unsigned()->nullable()->default(null);
            $table->foreign('object_id')->references('id')->on('objects');
            $table->string('name');
            $table->string('type');
            $table->schemalessAttributes('options');
            $table->timestamps();
        });

        Schema::create('endpoints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('object_id')->unsigned()->nullable()->default(null);
            $table->string('name');
            $table->string('uri');
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->timestamps();
        });
        Schema::create('endpoint_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('endpoint_id')->unsigned()->index();
            $table->string('verb');
            $table->string('action');
            $table->tinyInteger('active')->default(1);
            $table->schemalessAttributes('conditions');
            $table->schemalessAttributes('validations');
            $table->schemalessAttributes('transformation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('objects');
        Schema::drop('object_fields');
    }
}
