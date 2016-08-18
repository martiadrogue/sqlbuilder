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
 * Provides a convenient interface to define Where clause in a database query.
 *
 * [WHERE where_condition]
 */
class WhereBuilder extends WhereContext
{
    public function __construct(JoinBuilder $sql)
    {
        $this->sql = (string) $sql;
    }

    /**
     * Build Where clause of Select statement.
     *
     * @param string $condition assertion to filter results
     *
     * @return WhereBuilder Builder to make Where part of a statement Select.
     */
    public function where($condition)
    {
        $this->sql .= ' WHERE '.$condition;

        return $this;
    }
}
