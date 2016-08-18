<?php
/**
 * This file is part of the martiadrogue/sqlbuilder package.
 *
 * @author    Martí Adrogué <marti.adrogue@gmail.com>
 * @copyright 2016 Martí Adrogué
 * @license   https://opensource.org/licenses/MIT MIT License
 */
namespace MartiAdrogue\SqlBuilder;

use MartiAdrogue\SqlBuilder\Exception\InvalidSqlSyntaxException;
use MartiAdrogue\SqlBuilder\Expression\RowSequence;

/**
 * Provides a convenient interface to creating database queries.
 *
 * It build a clean Select statement without reserved words and standard SQL-92
 * syntax. And Return another builder to write the next part of statement.
 *
 * SELECT select_expr [, select_expr ...]
 */
class SelectBuilder extends Context
{
    public function __construct()
    {
        $this->sql = 'SELECT ';
    }

    /**
     * Make a select statement with rows passed.
     *
     * @param array $rows Stack of rows
     *
     * @return FormBuilder Builder to make next part of a statement Select.
     */
    public function select(array $rows)
    {
        $rowsFormater = new RowSequence($rows);
        $this->sql .= $rowsFormater->getChainOfRows($rows);

        return new  FromBuilder($this);
    }
}
