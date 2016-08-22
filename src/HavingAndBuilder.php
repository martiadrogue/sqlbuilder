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
class HavingAndBuilder extends HavingContext
{
    private $clause = 'AND';

    public function __construct(HavingContext $sql)
    {
        $this->sql = (string) $sql;
    }

    /**
     * Build And clause of Select statement.
     *
     * @param string $condition assertion to filter results
     *
     * @return HavingBuilder Builder to make Having part of a statement Select.
     */
    public function and($condition)
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
    public function or($condition)
    {
        $havingOrBuilder = new HavingOrBuilder($this);

        return $havingOrBuilder->or($condition);
    }
}
