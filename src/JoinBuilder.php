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
class JoinBuilder
{
    private $sql;

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

    /**
     * Prove a Builder to define next Where part.
     *
     * @return WhereBuilder Builder to make Where part of a statement Select.
     */
    public function withWhere(array $condition)
    {
        $whereBuilder = new WhereBuilder($this);

        return $whereBuilder->where($condition);
    }

    /**
     * Prove a Builder to define next Group By part.
     *
     * @return GroupByBuilder Builder to make Group By part of a statement
     *                        Select.
     */
    public function withGroupBy(array $rows)
    {
        $groupByBuilder = new GroupByBuilder($this);

        return $groupByBuilder->groupBy($rows);
    }

    /**
     * Prove a Builder to define next Order By part.
     *
     * @return OrderByBuilder Builder to make Order By part of a statement
     *                        Select.
     */
    public function withOrderBy(array $rows)
    {
        $groupByBuilder = new OrderByBuilder($this);

        return $groupByBuilder->orderBy($rows);
    }

    /**
     * Prove a Builder to define next Limit part.
     *
     * @return LimitBuilder Builder to make Limit part of a statement Select.
     */
    public function withLimit($confines)
    {
        $limitBuilder = new LimitBuilder($this);

        return $limitBuilder->limit($confines);
    }

    public function __toString()
    {
        return $this->sql;
    }
}
