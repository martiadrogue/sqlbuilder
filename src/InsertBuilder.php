<?php

namespace MartiAdrogue\Scrapper\DataObject\QueryBuilder;

/**
 *
 */
class InsertBuilder
{
    private $sql;

    public function __construct()
    {
        $this->sql = "INSERT";
    }

    public function into($table)
    {
        $this->sql .= ' INTO ' . $table;

        return new ValuesBuilder($this);
    }

    public function __toString()
    {
        return $this->sql;
    }
}
