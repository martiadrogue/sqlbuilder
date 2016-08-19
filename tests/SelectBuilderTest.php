<?php

namespace MartiAdrogue\SqlBuilder\Test;

use MartiAdrogue\SqlBuilder\SelectBuilder;
use MartiAdrogue\SqlBuilder\FromBuilder;
use MartiAdrogue\SqlBuilder\Exception\InvalidSqlSyntaxException;

/**
 * @covers MartiAdrogue\SqlBuilder\SelectBuilder::<!public>
 * @covers MartiAdrogue\SqlBuilder\SelectBuilder::__construct
 */
class SelectBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $selectBuilder;

    public function setUp()
    {
        $this->selectBuilder = new SelectBuilder();
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\FromBuilder
     * @uses MartiAdrogue\SqlBuilder\Expression\RowSequence
     * @covers MartiAdrogue\SqlBuilder\SelectBuilder::select
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldReturnASelectStatementAccordingWithSql92Standard()
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
     * @uses MartiAdrogue\SqlBuilder\Expression\RowSequence
     * @uses MartiAdrogue\SqlBuilder\FromBuilder
     * @covers MartiAdrogue\SqlBuilder\SelectBuilder::select
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldChangeStateOfSelectAndReturnFromStatementObject()
    {
        $sqlSelect = $this->selectBuilder->select(['row1','row2','row3','row4','row5']);
        $this->assertInstanceOf(
            FromBuilder::class,
            $sqlSelect,
            'On change the SelectBuilder It must return an instance of the next Builder, FromBuilder.'
        );
    }
}
