<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyMembersTable extends Migration
{
    public function up()
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->foreignId('father_id')->nullable()->constrained('family_members')->onDelete('cascade');
            $table->foreignId('mother_id')->nullable()->constrained('family_members')->onDelete('cascade');
            $table->foreignId('spouse_id')->nullable()->constrained('family_members')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('family_members');
    }
}
