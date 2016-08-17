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
class WhereBuilder
{
    private $sql;

    public function __construct($sql)
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

    /**
     * Prove a Builder to define next Group By part.
     *
     * @return HavingBuilder Builder to make having part of a statement Select.
     */
    public function withGroupBy(array $rows)
    {
        $groupByBuilder = new GroupByBuilder($this);

        return $groupByBuilder->groupBy($rows);
    }

    /**
     * Prove a Builder to define next Order By part.
     *
     * @return LimitBuilder Builder to make Limit part of a statement Select.
     */
    public function withOrderBy(array $rows)
    {
        $orderByBuilder = new OrderByBuilder($this);

        return $orderByBuilder->orderBy($rows);
    }

    /**
     * Prove a Builder to define next Limit part.
     *
     * @return LimitBuilder Builder to make Limit part of a statement Select.
     */
    public function withLimit($confines)
    {
        $limitBuilder = new LimitBuilder($this);
        $limitBuilder->limit($confines);

        return $limitBuilder;
    }

    public function __toString()
    {
        return $this->sql;
    }
}
