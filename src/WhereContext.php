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
 * @inheritDoc
 */
abstract class WhereContext extends HavingContext
{
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
}
