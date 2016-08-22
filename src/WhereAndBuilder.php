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
class WhereAndBuilder extends WhereContext
{
    private $clause = 'AND';

    public function __construct(WhereContext $sql)
    {
        $this->sql = (string) $sql;
    }

    /**
     * Build And clause of Select statement.
     *
     * @param string $condition assertion to filter results
     *
     * @return WhereBuilder Builder to make Where part of a statement Select.
     */
    public function andThen($condition)
    {
        $this->sql .= ' '.$this->clause.' '.$condition;

        return $this;
    }

    /**
     * Build Or connector with condition of Select statement.
     *
     * @param string $condition assertion to filter results
     *
     * @return WhereBuilder Builder to make Where part of a statement Select.
     */
    public function orThen($condition)
    {
        $whereOrBuilder = new WhereOrBuilder($this);

        return $whereOrBuilder->orThen($condition);
    }
}
