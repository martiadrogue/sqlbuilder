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
 * Provides a convenientdanterface to define Order By clause in a database
 * query.
 *
 * ORDER BY {col_name | expr | position}
 */
class OrderByBuilder extends Context
{
    /**
     * Build Order By clause of Select statement.
     *
     * @param string $rows stack of rows sort by priority
     *
     * @return LimitBuilder Builder to make Limit part of a statement Select.
     */
    public function orderBy(array $rows)
    {
        $rowsFormater = new RowSequence($rows);
        $this->sql .= ' ORDER BY '.$rowsFormater->getChainOfRows($rows);

        return new LimitBuilder($this);
    }
}
