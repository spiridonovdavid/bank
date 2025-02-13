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
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('case_number');
            $table->string('court_name');
            $table->string('inn');
            $table->string('snils');
            $table->enum('manager', ['Иван Иванов', 'Анатолий Анатольев']);
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('procedures');
    }
};
