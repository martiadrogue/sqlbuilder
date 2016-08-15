<?php
/**
 * This file is part of the martiadrogue/sqlbuilder package.
 *
 * @author Martí Adrogué <marti.adrogue@gmail.com>
 * @copyright 2016 Martí Adrogué
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace MartiAdrogue\SqlBuilder;

/**
 * Provides a convenient interface to define From clause in a database query.
 */
class FromBuilder
{
    private $sql;

    public function __construct(SelectBuilder $sql)
    {
        $this->sql = (string) $sql;
    }

    /**
     * Build Form clause of Select statement and prove a Builder to define next
     * Where part.
     *
     * @param string $table Name of the table
     *
     * @return WhereBuilder Builder to make Where part of a statement Select.
     */
    public function from($table)
    {
        $this->sql .= ' FROM '.$table;

        return new WhereBuilder($this);
    }

    public function __toString()
    {
        return $this->sql;
    }
}
