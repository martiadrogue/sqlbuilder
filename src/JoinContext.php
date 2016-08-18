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
 * {@inheritdoc}
 */
abstract class JoinContext extends WhereContext
{
    /**
     * Prove a Builder to define next Where part.
     *
     * @return WhereBuilder Builder to make Where part of a statement Select.
     */
    public function withWhere($condition)
    {
        $whereBuilder = new WhereBuilder($this);

        return $whereBuilder->where($condition);
    }
}
