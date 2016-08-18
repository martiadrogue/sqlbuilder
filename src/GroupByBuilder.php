<?php
/**
 * This file is part of the martiadrogue/sqlbuilder package.
 *
 * @author Martí Adrogué <marti.adrogue@gmail.com>
 * @copyright 2016 Martí Adrogué
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace MartiAdrogue\SqlBuilder;

use MartiAdrogue\SqlBuilder\Expression\RowSequence;

/**
 * Provides a convenient interface to define Group By clause in a database
 * query.
 *
 * [GROUP BY {col_name | expr | position} [ASC | DESC], ... [WITH ROLLUP]]
 */
class GroupByBuilder extends Context
{
    /**
     * Clause to group rows into subgroups based on columns or values returned.
     *
     * @param string $rows assertion to filter results
     *
     * @return HavingBuilder Builder to make having part of a statement Select.
     */
    public function groupBy(array $rows)
    {
        $rowsFormater = new RowSequence($rows);
        $this->sql .= ' GROUP BY '.$rowsFormater->getChainOfRows($rows);

        return new HavingBuilder($this);
    }
}
