<?php
/**
 * This file is part of the martiadrogue/sqlbuilder package.
 *
 * @author Martí Adrogué <marti.adrogue@gmail.com>
 * @copyright 2016 Martí Adrogué
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace MartiAdrogue\SqlBuilder\Expression;

use MartiAdrogue\SqlBuilder\Exception\InvalidSqlSyntaxException;

class RowSequence
{
    private $rows;

    public function __construct(array $rows)
    {
        $this->hasReservedWords($rows);
        $this->rows = $rows;
    }

    public function getChainOfRows()
    {
        return implode(', ', $this->rows);
    }

    private function hasReservedWords($rows)
    {
        $reservedWords = require 'config/ReservedWords.php';
        $candidatesViolation = array_map('strtoupper', $rows);
        $violations = array_intersect($reservedWords, $candidatesViolation);

        if (0 < count($violations)) {
            throw new InvalidSqlSyntaxException();
        }
    }
}
