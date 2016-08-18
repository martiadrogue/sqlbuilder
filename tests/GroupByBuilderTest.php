<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\Context;
use MartiAdrogue\SqlBuilder\HavingBuilder;
use MartiAdrogue\SqlBuilder\GroupByBuilder;

class GroupByBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $groupByBuilder;

    public function setUp()
    {
        $joinBuilder = Mockery::mock(Context::class);
        $joinBuilder->shouldReceive('__toString')->times(1)->andReturn('SELECT row1, row2, row3, row4 FROM table');
        $this->groupByBuilder = new GroupByBuilder($joinBuilder);
    }

    /**
     * @test
     */
    public function shouldReturnAFullSelectStatementAccordingWithSql92Standard()
    {
        $selectSyntax = '/.*\sGROUP BY\s.*/';
        $sqlSelect = $this->groupByBuilder->groupBy(['row1', 'row2', 'row3']);

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     */
    public function shouldChangeStateOfGroupbyAndReturnHavingbuilder()
    {
        $sqlSelect = $this->groupByBuilder->groupBy(['row1', 'row2', 'row3']);
        $this->assertInstanceOf(
            HavingBuilder::class,
            $sqlSelect,
            'On change the GroupByBuilder It must return an instance of '.
            'HavingBuilder, to add some filters on that group.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
