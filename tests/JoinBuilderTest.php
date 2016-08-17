<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\FromBuilder;
use MartiAdrogue\SqlBuilder\JoinBuilder;

class JoinBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $joinBuilder;

    public function setUp()
    {
        $formBuilder = Mockery::mock(FromBuilder::class);
        $formBuilder->shouldReceive('__toString')->times(1)->andReturn('SELECT row1, row2, row3, row4 FROM tableA');
        $this->joinBuilder = new JoinBuilder($formBuilder);
    }

    /**
     * @test
     */
    public function shouldReturnAFullSelectStatementAccordingWithSql92Standard()
    {
        $selectSyntax = '/.*\sJOIN\sON\s.*/';
        $sqlSelect = $this->joinBuilder->join('JOIN ON tableB id = tableA_id');

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     */
    public function shouldChangeStateOfFromAndReturnJoinStatementObject()
    {
        $sqlSelect = $this->joinBuilder->join('JOIN ON tableB id = tableA_id');
        $this->assertInstanceOf(
            JoinBuilder::class,
            $sqlSelect,
            'On change the JoinBuilder It must return an instance of same Builder, JoinBuilder, to add another join.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
