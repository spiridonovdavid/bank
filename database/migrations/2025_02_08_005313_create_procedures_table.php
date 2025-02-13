<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('name');
            $table->string('patronymic')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('case_number')->nullable();
            $table->string('court_name')->nullable();
            $table->string('inn')->nullable();
            $table->string('snils')->nullable();
            $table->enum('manager', ['Иван Иванов', 'Анатолий Анатольев'])->nullable();;
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('procedures');
    }
};
