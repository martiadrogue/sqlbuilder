<?php
/**
 * This file is part of the martiadrogue/sqlbuilder package.
 *
 * @author    Martí Adrogué <marti.adrogue@gmail.com>
 * @copyright 2016 Martí Adrogué
 * @license   https://opensource.org/licenses/MIT MIT License
 */
namespace MartiAdrogue\SqlBuilder\Exception;

use InvalidArgumentException;

/**
 * Stop flow when there are some sql syntax malformed.
 */
class InvalidSqlSyntaxException extends InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct(
            "Building a SQL statement. Some words are reserved and aren't ".
            'allowed. Rewrite the statement using another synonyms.'
        );
    }
}
