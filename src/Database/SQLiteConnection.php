<?php namespace Ottowayne\SQLiteMigrationFix\Database;

use Illuminate\Database\SQLiteConnection as OriginalSQLiteConnection;
use Ottowayne\SQLiteMigrationFix\Database\SQLiteGrammar as SchemaGrammar;

class SQLiteConnection extends OriginalSQLiteConnection
{

    /**
     * Get the default schema grammar instance.
     *
     * @return \Illuminate\Database\Schema\Grammars\SQLiteGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SchemaGrammar);
    }
}
