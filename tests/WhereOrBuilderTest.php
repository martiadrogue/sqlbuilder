<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\WhereBuilder;
use MartiAdrogue\SqlBuilder\WhereOrBuilder;
use MartiAdrogue\SqlBuilder\WhereAndBuilder;

/**
 * @covers MartiAdrogue\SqlBuilder\WhereOrBuilder::<!public>
 * @covers MartiAdrogue\SqlBuilder\WhereOrBuilder::__construct
 */
class WhereOrBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $whereOrBuilder;

    public function setUp()
    {
        $whereBuilder = Mockery::mock(WhereBuilder::class);
        $sql = 'SELECT row1, row2, row3, row4 FROM table WHERE row1 = 1';
        $whereBuilder->shouldReceive('__toString')->times(1)->andReturn($sql);
        $this->whereOrBuilder = new WhereOrBuilder($whereBuilder);
    }

    /**
     * @test
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldBuildSelectStatementAccordingWithSql92Standard()
    {
        $selectSyntax = '/.*\sOR\s.*/';
        $sqlSelect = $this->whereOrBuilder->or('title = \'lorem ipsum dolor sit amen\'');

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     * @covers MartiAdrogue\SqlBuilder\WhereOrBuilder::or
     */
    public function shouldReturnAnotherWhereandbuilderOnChangeStateOfAnd()
    {
        $sqlSelect = $this->whereOrBuilder->or('title = \'lorem ipsum dolor sit amen\'');
        $this->assertInstanceOf(
            WhereOrBuilder::class,
            $sqlSelect,
            'On change the WhereOrBuilder It must return an instance of '.
            'WhereOrBuilder, to add aother condition or get the full query.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\WhereAndBuilder
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldGetAndbuilderFromAndCall()
    {
        $sqlSelect = $this->whereOrBuilder->and('row1 = 10');
        $this->assertInstanceOf(
            WhereAndBuilder::class,
            $sqlSelect,
            'WhereOrBuilder must return a instance of WhereAndBuilder from a and '.
            'call, to replace the query with aother Limit statement or not.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
