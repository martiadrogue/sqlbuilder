<?php

namespace MartiAdrogue\Scrapper\DataObject\QueryBuilder;

/**
 *
 */
class WhereBuilder
{
    private $sql;

    public function __construct($sql)
    {
        $this->sql = (string) $sql;
    }

    public function where($condition)
    {
        $this->sql .= " WHERE " . $condition;

        return $this;
    }

    public function __toString()
    {
        return $this->sql;
    }
}
