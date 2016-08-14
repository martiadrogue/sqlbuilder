<?php

namespace MartiAdrogue\SqlBuilder\Exception;

use InvalidArgumentException;

/**
 *
 */
class InvalidSqlSyntaxException extends InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct("Building a SQL statement. Some words are reserved and aren't allowed. Rewrite the statement using other synonyms.");
    }
}
