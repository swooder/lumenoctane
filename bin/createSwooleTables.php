<?php

use Laravel\Octane\Tables\TableFactory;
use Swoole\Table;

require_once __DIR__ . '/../src/Tables/TableFactory.php';

$tables = [];

foreach ($serverState['octaneConfig']['tables'] ?? [] as $name => $columns) {
    $table = TableFactory::make(explode(':', $name)[1] ?? 1000);

    foreach ($columns ?? [] as $columnName => $column) {
        $typeStr = explode(':', $column)[0] ?? 'string';
        $type = Table::TYPE_STRING;
        if ($typeStr == 'int') {
            $type = Table::TYPE_INT;
        } elseif ($typeStr == 'float') {
            $type = Table::TYPE_FLOAT;
        }
        $table->column($columnName, $type, explode(':', $column)[1] ?? 1000);
    }

    $table->create();

    $tables[explode(':', $name)[0]] = $table;
}

return $tables;
