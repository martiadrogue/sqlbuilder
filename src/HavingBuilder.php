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
 * Provides a convenient interface to define Having clause in a database query.
 *
 * [HAVING where_condition]
 */
class HavingBuilder extends HavingContext
{
    public function __construct(GroupByBuilder $sql)
    {
        $this->sql = (string) $sql;
    }

    /**
     * Build Having clause of Select statement.
     *
     * @param string $condition assertion to filter results
     *
     * @return HavingBuilder Builder to make Having part of a statement Select.
     */
    public function having($condition)
    {
        $this->sql .= ' HAVING '.$condition;

        return $this;
    }
}
