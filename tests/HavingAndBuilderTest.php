<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\HavingBuilder;
use MartiAdrogue\SqlBuilder\HavingOrBuilder;
use MartiAdrogue\SqlBuilder\HavingAndBuilder;

/**
 * @covers MartiAdrogue\SqlBuilder\HavingAndBuilder::<!public>
 * @covers MartiAdrogue\SqlBuilder\HavingAndBuilder::__construct
 */
class HavingAndBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $havingAndBuilder;

    public function setUp()
    {
        $havingBuilder = Mockery::mock(HavingBuilder::class);
        $sql = 'SELECT row1, row2, row3, row4 FROM table GROUP BY row1, row2, row3 HAVING row = 1';
        $havingBuilder->shouldReceive('__toString')->times(1)->andReturn($sql);
        $this->havingAndBuilder = new HavingAndBuilder($havingBuilder);
    }

    /**
     * @test
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldBuildSelectStatementAccordingWithSql92Standard()
    {
        $selectSyntax = '/.*\sAND\s.*/';
        $sqlSelect = $this->havingAndBuilder->and('title = \'lorem ipsum dolor sit amen\'');

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     * @covers MartiAdrogue\SqlBuilder\HavingAndBuilder::and
     */
    public function shouldReturnAnotherHavingandbuilderOnChangeStateOfAnd()
    {
        $sqlSelect = $this->havingAndBuilder->and('title = \'lorem ipsum dolor sit amen\'');
        $this->assertInstanceOf(
            HavingAndBuilder::class,
            $sqlSelect,
            'On change the HavingAndBuilder It must return an instance of '.
            'HavingAndBuilder, to add aother condition and get the full query.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\HavingOrBuilder
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldGetOrbuilderFromOrCall()
    {
        $sqlSelect = $this->havingAndBuilder->or('row1 = 10');
        $this->assertInstanceOf(
            HavingOrBuilder::class,
            $sqlSelect,
            'HavingAndBuilder must return a instance of HavingOrBuilder from a or '.
            'call, to replace the query with aother Limit statement or not.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
