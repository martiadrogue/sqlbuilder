<?php

namespace MartiAdrogue\SqlBuilder;

/**
 *
 */
class FromBuilder
{
    private $sql;

    public function __construct(SelectBuilder $sql)
    {
        $this->sql = (string) $sql;
    }

    public function from($table)
    {
        $this->sql .= ' FROM ' . $table;

        return new WhereBuilder($this);
    }

    public function __toString()
    {
        return $this->sql;
    }
}
