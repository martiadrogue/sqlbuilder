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
 * Provides a convenient interface to define Limit clause in a database query.
 *
 * [LIMIT {[offset,] row_count | row_count OFFSET offset}]
 */
class LimitBuilder extends Context
{
    /**
     * Build Limit clause of Select statement.
     *
     * @param string $confines Limits of query
     *
     * @return LimitBuilder Builder to make Joins part of a statement Select.
     */
    public function limit($confines)
    {
        $this->sql .= ' LIMIT '.$confines;

        return $this;
    }
}
