<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\SelectBuilder;
use MartiAdrogue\SqlBuilder\FromBuilder;
use MartiAdrogue\SqlBuilder\JoinBuilder;

class FromBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $fromBuilder;

    public function setUp()
    {
        $selectBuilder = Mockery::mock(SelectBuilder::class);
        $selectBuilder->shouldReceive('__toString')->times(1)->andReturn('SELECT row1, row2, row3, row4');
        $this->fromBuilder = new FromBuilder($selectBuilder);
    }

    /**
     * @test
     */
    public function shouldReturnAFullSelectStatementAccordingWithSql92Standard()
    {
        $selectSyntax = '/SELECT\s.*FROM\s\w+/';
        $sqlSelect = $this->fromBuilder->from('table');

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     */
    public function shouldChangeStateOfFromAndReturnJoinStaementObject()
    {
        $sqlSelect = $this->fromBuilder->from('table');
        $this->assertInstanceOf(
            JoinBuilder::class,
            $sqlSelect,
            'On change the FromBuilder It must return an instance of the next Builder, JoinBuilder.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
