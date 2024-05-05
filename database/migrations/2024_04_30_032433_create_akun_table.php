<?php

// database/migrations/{timestamp}_create_akun_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunTable extends Migration
{
    public function up()
    {
        Schema::create('akuns', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('role');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('akuns');
    }
}
