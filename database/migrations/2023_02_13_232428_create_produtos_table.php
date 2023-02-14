<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {            
                $table->bigIncrements('id');
                $table->uuid('uuid');
                $table->string('titulo');
                $table->string('thumb_legenda')->nullable(); 
                $table->string('slug');
                $table->string('thumb')->nullable();
                $table->integer('status')->default(1);
                $table->bigInteger('views')->default(0);
                $table->double('valor', 10, 2);
                $table->text('descricao')->nullable();    
                $table->timestamps();
        });
    
        Schema::create('categorias_produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('produto_id');

            $table->foreign('categoria_id')
                        ->references('id')
                        ->on('cat_produtos')
                        ->onDelete('cascade');
            $table->foreign('produto_id')
                        ->references('id')
                        ->on('produtos')
                        ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
