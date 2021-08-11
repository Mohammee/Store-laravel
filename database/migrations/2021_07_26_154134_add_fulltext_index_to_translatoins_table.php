<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFulltextIndexToTranslatoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('translatoins', function (Blueprint $table) {
        });
        // Because Laravel doesn't support full text search migration
        \Illuminate\Support\Facades\DB::statement(
            'Alter Table translations ADD FULLTEXT INDEX
                    translation_name_description_index
                   (name , description , url)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('translatoins', function (Blueprint $table) {
            $table->dropIndex('translation_name_description_index');
        });
    }
}
