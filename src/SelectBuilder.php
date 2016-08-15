<?php

namespace MartiAdrogue\SqlBuilder;

use MartiAdrogue\SqlBuilder\Exception\InvalidSqlSyntaxException;

/**
 *
 */
class SelectBuilder
{
    private $sql;

    public function __construct()
    {
        $this->sql = 'SELECT ';
    }

    /**
     * Make a select statement with rows passed.
     *
     * @param string $rows List of rows separated by comma
     *
     * @return FormBuilder Builder to make next part of a statement Select.
     */
    public function select(array $rows)
    {
        $this->hasReservedWords($rows);
        $this->sql .= $this->makeRowsChain($rows);

        return new  FromBuilder($this);
    }

    public function __toString()
    {
        return $this->sql;
    }

    private function makeRowsChain(array $rows)
    {
        return implode(', ', $rows);
    }

    private function hasReservedWords(array $rows)
    {
        $reservedWords = require('config/ReservedWords.php');
        $candidatesViolation = array_map('strtoupper', $rows);
        $violations = array_intersect($reservedWords, $candidatesViolation);

        if (0 < count($violations)) {
            throw new InvalidSqlSyntaxException();
        }
    }
}
