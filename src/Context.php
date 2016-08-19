<?php
/**
 * This file is part of the martiadrogue/sqlbuilder package.
 *
 * @author    Martí Adrogué <marti.adrogue@gmail.com>
 * @copyright 2016 Martí Adrogué
 * @license   https://opensource.org/licenses/MIT MIT License
 */
namespace MartiAdrogue\SqlBuilder;

/**
 * Constructs an Context object from other Context and cast it into string.
 */
abstract class Context
{
    protected $sql;

    public function __construct(Context $statement)
    {
        $this->sql = (string) $statement;
    }

    /**
     * Return the string representation of the Context element.
     *
     * @return string Select satement
     */
    public function __toString()
    {
        return $this->sql;
    }
}
