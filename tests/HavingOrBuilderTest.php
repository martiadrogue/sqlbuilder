<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\HavingBuilder;
use MartiAdrogue\SqlBuilder\HavingOrBuilder;
use MartiAdrogue\SqlBuilder\HavingAndBuilder;

/**
 * @covers MartiAdrogue\SqlBuilder\HavingOrBuilder::<!public>
 * @covers MartiAdrogue\SqlBuilder\HavingOrBuilder::__construct
 */
class HavingOrBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $havingOrBuilder;

    public function setUp()
    {
        $whereBuilder = Mockery::mock(HavingBuilder::class);
        $sql = 'SELECT row1, row2, row3, row4 FROM table GROUP BY row1, row2, row3 HAVING row = 1';
        $whereBuilder->shouldReceive('__toString')->times(1)->andReturn($sql);
        $this->havingOrBuilder = new HavingOrBuilder($whereBuilder);
    }

    /**
     * @test
     * @covers MartiAdrogue\SqlBuilder\HavingOrBuilder::orThen
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldBuildSelectStatementAccordingWithSql92Standard()
    {
        $selectSyntax = '/.*\sOR\s.*/';
        $sqlSelect = $this->havingOrBuilder->orThen('title = \'lorem ipsum dolor sit amen\'');

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     * @covers MartiAdrogue\SqlBuilder\HavingOrBuilder::orThen
     */
    public function shouldReturnAnotherWhereandbuilderOnChangeStateOfAnd()
    {
        $sqlSelect = $this->havingOrBuilder->orThen('title = \'lorem ipsum dolor sit amen\'');
        $this->assertInstanceOf(
            HavingOrBuilder::class,
            $sqlSelect,
            'On change the HavingOrBuilder It must return an instance of '.
            'HavingOrBuilder, to add aother condition or get the full query.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\HavingAndBuilder
     * @covers MartiAdrogue\SqlBuilder\HavingOrBuilder::andThen
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldGetAndbuilderFromAndCall()
    {
        $sqlSelect = $this->havingOrBuilder->andThen('row1 = 10');
        $this->assertInstanceOf(
            HavingAndBuilder::class,
            $sqlSelect,
            'HavingOrBuilder must return a instance of HavingAndBuilder from a and '.
            'call, to replace the query with aother Limit statement or not.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
