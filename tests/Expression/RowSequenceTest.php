<?php
/**
 * This file is part of the martiadrogue/sqlbuilder package.
 *
 * @author    Martí Adrogué <marti.adrogue@gmail.com>
 * @copyright 2016 Martí Adrogué
 * @license   https://opensource.org/licenses/MIT MIT License
 */
namespace MartiAdrogue\SqlBuilder\Test\Expression;

use MartiAdrogue\SqlBuilder\Exception\InvalidSqlSyntaxException;
use MartiAdrogue\SqlBuilder\Expression\RowSequence;

class RowSequenceTest extends \PHPUnit_Framework_TestCase
{
    private $rowSequence;

    public function setUp()
    {
        $this->rowSequence = new RowSequence(['row1', 'row2', 'row3', 'row4']);
    }

    /**
     * @tests
     */
    public function shouldConvertAnArrayToAListOfElementsSeparatedByComma()
    {
        $rows = $this->rowSequence->getChainOfRows();
        $this->assertEquals(
            'row1, row2, row3, row4',
            $rows,
            'Array of strings changes to one single string ensemble by comma.'
        );
    }

    /**
     * @test
     */
    public function shouldStopFlowWhenReservedWordIsUsedInASqlStatement()
    {
        $this->setExpectedException(InvalidSqlSyntaxException::class);
        new RowSequence(['row1', 'row2', 'order', 'row4']);
    }

}
