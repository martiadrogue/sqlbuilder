<?php

namespace MartiAdrogue\SqlBuilder\Test;

use MartiAdrogue\SqlBuilder\SelectBuilder;
use MartiAdrogue\SqlBuilder\FromBuilder;
use MartiAdrogue\SqlBuilder\Exception\InvalidSqlSyntaxException;

class SelectBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $selectBuilder;

    public function setUp()
    {
        $this->selectBuilder = new SelectBuilder();
    }

    /**
     * @test
     * Test that true does in fact equal true
     */
    public function shouldReturnASelectStatementAccordingWithSQL92Standard()
    {
        $selectSyntax = '/SELECT\s.*[^,]$/';
        $sqlSelect = $this->selectBuilder->select(['row1','row2','row3','row4','row5']);

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     */
    public function shouldStopFlowWhenReservedWordIsUsedInASqlStatement()
    {
        $this->setExpectedException(InvalidSqlSyntaxException::class);
        $this->selectBuilder->select(['row1','row2','row3','repeat','row5']);
    }

    /**
     * @test
     */
    public function shouldChangeStateOfSelectAndReturnFromStaementObject()
    {
        $sqlSelect = $this->selectBuilder->select(['row1','row2','row3','row4','row5']);
        $this->assertInstanceOf(
            FromBuilder::class,
            $sqlSelect,
            'On change the SelectBuilder It must return an instance of the next Builder, FromBuilder.'
        );
    }
}
