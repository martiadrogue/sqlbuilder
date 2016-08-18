<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\Context;
use MartiAdrogue\SqlBuilder\LimitBuilder;
use MartiAdrogue\SqlBuilder\OrderByBuilder;

class OrderByBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $orderByBuilder;

    public function setUp()
    {
        $joinBuilder = Mockery::mock(Context::class);
        $joinBuilder->shouldReceive('__toString')->times(1)->andReturn('SELECT row1, row2, row3, row4 FROM table');
        $this->orderByBuilder = new OrderByBuilder($joinBuilder);
    }

    /**
     * @test
     */
    public function shouldReturnAFullSelectStatementAccordingWithSql92Standard()
    {
        $selectSyntax = '/.*\sORDER BY\s.*/';
        $sqlSelect = $this->orderByBuilder->orderBy(['row1', 'row2', 'row3']);

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     */
    public function shouldChangeStateOfOrderbyAndReturnLimitbuilder()
    {
        $sqlSelect = $this->orderByBuilder->orderBy(['row1', 'row2', 'row3']);
        $this->assertInstanceOf(
            LimitBuilder::class,
            $sqlSelect,
            'On change the OrderByBuilder It must return an instance of '.
            'LimitBuilder, to add some filters on that group.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
