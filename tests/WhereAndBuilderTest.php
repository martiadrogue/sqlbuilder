<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\WhereBuilder;
use MartiAdrogue\SqlBuilder\WhereOrBuilder;
use MartiAdrogue\SqlBuilder\WhereAndBuilder;

/**
 * @covers MartiAdrogue\SqlBuilder\WhereAndBuilder::<!public>
 * @covers MartiAdrogue\SqlBuilder\WhereAndBuilder::__construct
 */
class WhereAndBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $whereAndBuilder;

    public function setUp()
    {
        $whereBuilder = Mockery::mock(WhereBuilder::class);
        $sql = 'SELECT row1, row2, row3, row4 FROM table WHERE row1 = 1';
        $whereBuilder->shouldReceive('__toString')->times(1)->andReturn($sql);
        $this->whereAndBuilder = new WhereAndBuilder($whereBuilder);
    }

    /**
     * @test
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldBuildSelectStatementAccordingWithSql92Standard()
    {
        $selectSyntax = '/.*\sAND\s.*/';
        $sqlSelect = $this->whereAndBuilder->and('title = \'lorem ipsum dolor sit amen\'');

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     * @covers MartiAdrogue\SqlBuilder\WhereAndBuilder::and
     */
    public function shouldReturnAnotherWhereandbuilderOnChangeStateOfAnd()
    {
        $sqlSelect = $this->whereAndBuilder->and('title = \'lorem ipsum dolor sit amen\'');
        $this->assertInstanceOf(
            WhereAndBuilder::class,
            $sqlSelect,
            'On change the WhereAndBuilder It must return an instance of '.
            'WhereAndBuilder, to add aother condition or get the full query.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\WhereOrBuilder
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldGetOrbuilderFromOrCall()
    {
        $sqlSelect = $this->whereAndBuilder->or('row1 = 10');
        $this->assertInstanceOf(
            WhereOrBuilder::class,
            $sqlSelect,
            'WhereAndBuilder must return a instance of WhereOrBuilder from a or '.
            'call, to replace the query with aother Limit statement or not.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
