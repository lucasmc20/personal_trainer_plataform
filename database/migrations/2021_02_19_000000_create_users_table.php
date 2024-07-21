<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean("admin")->default(0);
            $table->date("data_nascimento")->nullable();
            $table->string("profissao")->nullable();
            $table->boolean('pagamento')->default(0);
            $table->string('telemovel')->nullable();
            $table->string("altura")->nullable();
            $table->rememberToken();
            $table->foreignId("avaliacao_inicial_id")->nullable()->constrained("avaliacao_inicials");
            $table->foreignId('tipo_servico_id')->constrained('tipo_servicos');
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
        Schema::dropIfExists('users');
    }
}
