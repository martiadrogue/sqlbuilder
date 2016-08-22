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
 * Provides a convenient interface to define Having clause in a database query.
 *
 * [HAVING where_condition]
 */
class HavingOrBuilder extends HavingContext
{
    private $clause = 'OR';

    public function __construct(HavingContext $sql)
    {
        $this->sql = (string) $sql;
    }

    /**
     * Build Or clause of Select statement.
     *
     * @param string $condition assertion to filter results
     *
     * @return HavingBuilder Builder to make Having part of a statement Select.
     */
    public function orThen($condition)
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
    public function andThen($condition)
    {
        $havingAndBuilder = new HavingAndBuilder($this);

        return $havingAndBuilder->andThen($condition);
    }
}
