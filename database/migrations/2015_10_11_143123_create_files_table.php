<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    // database/migrations/2015_03_05_004850_create_files_table.php

    public function up()
    {
        Schema::create('files', function(Blueprint $table)
        {
            $table->string('id', 36)->primary();
            $table->string('mime', 255);
            $table->string('filename', 255);
            $table->bigInteger('size')->unsigned();
            $table->string('storage_path')->unique();
            $table->string('disk', 10);
            $table->boolean('status');
            $table->timestamps();
        });
    }
}
