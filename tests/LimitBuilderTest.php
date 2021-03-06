<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\Context;
use MartiAdrogue\SqlBuilder\LimitBuilder;

/**
 * @covers MartiAdrogue\SqlBuilder\LimitBuilder::<!public>
 * @covers MartiAdrogue\SqlBuilder\Context::__construct
 */
class LimitBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $limitBuilder;

    public function setUp()
    {
        $joinBuilder = Mockery::mock(Context::class);
        $joinBuilder->shouldReceive('__toString')->times(1)->andReturn('SELECT row1, row2, row3, row4 FROM table');
        $this->limitBuilder = new LimitBuilder($joinBuilder);
    }

    /**
     * @test
     * @covers MartiAdrogue\SqlBuilder\LimitBuilder::limit
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldBuildSelectStatementAccordingWithSql92Standard()
    {
        $selectSyntax = '/.*\sLIMIT\s.*/';
        $sqlSelect = $this->limitBuilder->limit(10);

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     * @covers MartiAdrogue\SqlBuilder\LimitBuilder::limit
     */
    public function shouldReturnAnotherLimitbuilderOnChangeStateOfLimit()
    {
        $sqlSelect = $this->limitBuilder->limit(10);
        $this->assertInstanceOf(
            LimitBuilder::class,
            $sqlSelect,
            'On change the LimitBuilder It must return an instance of '.
            'LimitBuilder, to replace current limit or get the full query.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
