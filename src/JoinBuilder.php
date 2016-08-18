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
 * Provides a convenient interface to define Join clause in a database query.
 */
class JoinBuilder extends JoinContext
{
    public function __construct(FromBuilder $sql)
    {
        $this->sql = (string) $sql;
    }

    /**
     * Build Join clause of Select statement and prove a Builder to join another
     * table.
     *
     * @param string $joinTable Name of the table
     *
     * @return JoinBuilder Builder to add another Join to the Select.
     */
    public function join($joinTable)
    {
        $this->sql .= ' '.$joinTable;

        return $this;
    }
}
