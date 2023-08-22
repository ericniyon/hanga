<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFullTextSearchOnClientAndApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement('ALTER TABLE clients ADD "document_vectors" tsvector;');
        DB::statement('CREATE INDEX idx_fts_doc_vec ON clients USING gin(document_vectors);');
        DB::statement('ALTER TABLE applications ADD "document_vectors" tsvector;');
        DB::statement('CREATE INDEX idx_fts_doc_vec_applications ON applications USING gin(document_vectors);');
        DB::statement('UPDATE clients SET document_vectors = (to_tsvector(name));');
        DB::statement('UPDATE applications SET document_vectors = (to_tsvector(bio));');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
