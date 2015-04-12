<?php namespace Ottowayne\SQLiteMigrationFix\Database;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\SQLiteGrammar as OriginalSQLiteGrammar;
use Illuminate\Support\Fluent;

class SQLiteGrammar extends OriginalSQLiteGrammar
{
    /**
     * Get the SQL for a nullable column modifier.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $column
     * @return string|null
     */
    protected function modifyNullable(Blueprint $blueprint, Fluent $column)
    {
        // return $column->nullable ? ' null' : ' not null';
        return ' null';
    }
}
