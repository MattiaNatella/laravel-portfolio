<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            //cancello la colonna type
            $table->dropColumn('type');

            //la rricreo definendola come ForeignKey della tabela types
            $table->foreignId('type_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {


            //ricreo la colonna type come da migration precedente
            $table->string('type')->nullable()->after('summary');

            //elimino il vincolo constraint dalla chiave esterna
            $table->dropForeign('type_id');

            //elimino la colonna type_id
            $table->dropColumn('type_id');
        });
    }
};
