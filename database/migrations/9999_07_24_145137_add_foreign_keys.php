<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {

            // OPTION ONE (EXTENDED)
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            // OPTION TWO ("CONTRAINED")
            $table->foreignId('type_id')->constrained();

        });

      /*   // OPTION TWO ("CONTRAINED")
        Schema::table('types', function (Blueprint $table) {

            $table->foreignId('project_id')->constrained();

        }); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropForeign('projects_user_id_foreign');

            $table->dropColumn('user_id');

            $table->dropForeign('projects_type_id_foreign');

            $table->dropColumn('type_id');

        });

        /* Schema::table('types', function (Blueprint $table) {

            $table->dropForeign('types_project_id_foreign');

            $table->dropColumn('project_id');

        }); */
    }
};
