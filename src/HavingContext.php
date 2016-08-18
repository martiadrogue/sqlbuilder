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
 * Provides basic tools to print initialize and mutate the context.
 */
abstract class HavingContext extends Context
{
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
     * Prove a Builder to define lastgigit  Limit part.
     *
     * @return LimitBuilder Builder to make Limit part of a statement Select.
     */
    public function withLimit($confines)
    {
        $limitBuilder = new LimitBuilder($this);
        $limitBuilder->limit($confines);

        return $limitBuilder;
    }
}
