<?php

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
