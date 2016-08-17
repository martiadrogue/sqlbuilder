<?php
/**
 * This file is part of the martiadrogue/sqlbuilder package.
 *
 * @author Martí Adrogué <marti.adrogue@gmail.com>
 * @copyright 2016 Martí Adrogué
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace MartiAdrogue\SqlBuilder;

use MartiAdrogue\SqlBuilder\Exception\InvalidSqlSyntaxException;

/**
 * Provides a convenient interface to creating database queries.
 *
 * It build a clean Select statement without reserved words and standard SQL-92
 * syntax. And Return another builder to write the next part of statement.
 *
 * SELECT select_expr [, select_expr ...]
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
     * @uses config/ReservedWords.php
     *
     * @param array $rows Stack of rows
     *
     * @throws InvalidSqlSyntaxException If
     *                                   provided rows has some reserved words.
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
        $reservedWords = require 'config/ReservedWords.php';
        $candidatesViolation = array_map('strtoupper', $rows);
        $violations = array_intersect($reservedWords, $candidatesViolation);

        if (0 < count($violations)) {
            throw new InvalidSqlSyntaxException();
        }
    }
}
