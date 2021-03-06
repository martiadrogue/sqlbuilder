<?php
/**
 * This file is part of the martiadrogue/sqlbuilder package.
 *
 * @author    Martí Adrogué <marti.adrogue@gmail.com>
 * @copyright 2016 Martí Adrogué
 * @license   https://opensource.org/licenses/MIT MIT License
 */
namespace MartiAdrogue\SqlBuilder;

/**
 * Provides a convenient interface to define From clause in a database query.
 *
 * [FROM table_references
 */
class FromBuilder extends Context
{
    public function __construct(SelectBuilder $sql)
    {
        $this->sql = (string) $sql;
    }

    /**
     * Build Form clause of Select statement and prove a Builder to join another
     * table.
     *
     * @param string $table Name of the table
     *
     * @return JoinBuilder Builder to filter results on our select.
     */
    public function from($table)
    {
        $this->sql .= ' FROM '.$table;

        return new JoinBuilder($this);
    }
}
