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
 * Provides the most basic tools to creating in parts database queries.
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
