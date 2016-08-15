<?php
/**
 * This file is part of the martiadrogue/sqlbuilder package.
 *
 * @author Martí Adrogué <marti.adrogue@gmail.com>
 * @copyright 2016 Martí Adrogué
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace MartiAdrogue\Scrapper\DataObject\QueryBuilder;

/**
 *
 */
class ValuesBuilder
{
    private $sql;

    public function __construct($sql)
    {
        $this->sql = $sql;
    }

    public function values($values)
    {
        $this->sql .= ' VALUES (' . $values . ')';

        return new WhereBuilder($this);
    }

    public function __toString()
    {
        return $this->sql;
    }
}
