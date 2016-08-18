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
 * Provides basic tools to creating database queries.
 */
abstract class Context
{
    protected $sql;

    public function __construct(Context $statement)
    {
        $this->sql = (string) $statement;
    }

    public function __toString()
    {
        return $this->sql;
    }
}
