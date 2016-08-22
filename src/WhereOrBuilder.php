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
 * Provides a convenient interface to define Where clause in a database query.
 *
 * [WHERE where_condition]
 */
class WhereOrBuilder extends WhereContext
{
    private $clause = 'OR';

    public function __construct(WhereContext $sql)
    {
        $this->sql = (string) $sql;
    }

    /**
     * Build Or clause of Select statement.
     *
     * @param string $condition assertion to filter results
     *
     * @return WhereBuilder Builder to make Where part of a statement Select.
     */
    public function or($condition)
    {
        $this->sql .= ' '.$this->clause.' '.$condition;

        return $this;
    }

    /**
     * Build And connector with condition of Select statement.
     *
     * @param string $condition assertion to filter results
     *
     * @return WhereBuilder Builder to make Where part of a statement Select.
     */
    public function and($condition)
    {
        $whereAndBuilder = new WhereAndBuilder($this);

        return $whereAndBuilder->and($condition);
    }
}
