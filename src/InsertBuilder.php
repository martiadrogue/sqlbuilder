<?php
/**
 * This file is part of the martiadrogue/sqlbuilder package.
 *
 * @author Martí Adrogué <marti.adrogue@gmail.com>
 * @copyright 2016 Martí Adrogué
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace MartiAdrogue\Scrapper\DataObject\QueryBuilder;

/**
 *
 */
class InsertBuilder
{
    private $sql;

    public function __construct()
    {
        $this->sql = "INSERT";
    }

    public function into($table)
    {
        $this->sql .= ' INTO ' . $table;

        return new ValuesBuilder($this);
    }

    public function __toString()
    {
        return $this->sql;
    }
}
