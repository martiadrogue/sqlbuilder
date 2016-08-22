<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\JoinBuilder;
use MartiAdrogue\SqlBuilder\WhereBuilder;
use MartiAdrogue\SqlBuilder\LimitBuilder;
use MartiAdrogue\SqlBuilder\HavingBuilder;
use MartiAdrogue\SqlBuilder\OrderByBuilder;
use MartiAdrogue\SqlBuilder\WhereAndBuilder;

/**
 * @covers MartiAdrogue\SqlBuilder\WhereBuilder::<!public>
 * @covers MartiAdrogue\SqlBuilder\WhereBuilder::__construct
 */
class WhereBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $whereBuilder;

    public function setUp()
    {
        $joinBuilder = Mockery::mock(JoinBuilder::class);
        $joinBuilder->shouldReceive('__toString')->times(1)->andReturn('SELECT row1, row2, row3, row4 FROM table');
        $this->whereBuilder = new WhereBuilder($joinBuilder);
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\WhereAndBuilder
     * @covers MartiAdrogue\SqlBuilder\WhereBuilder::where
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldBuildSelectStatementAccordingWithSql92Standard()
    {
        $selectSyntax = '/.*\sWHERE\s.*/';
        $sqlSelect = $this->whereBuilder->where('title = \'lorem ipsum dolor sit amen\'');

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\WhereAndBuilder
     * @covers MartiAdrogue\SqlBuilder\WhereBuilder::where
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldReturnWhereandbuilderOnChangeStateOfWhere()
    {
        $sqlSelect = $this->whereBuilder->where('title = \'lorem ipsum dolor sit amen\'');
        $this->assertInstanceOf(
            WhereAndBuilder::class,
            $sqlSelect,
            'On change the WhereBuilder It must return an instance of '.
            'WhereAndBuilder, to add and statement.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\GroupByBuilder
     * @uses MartiAdrogue\SqlBuilder\Expression\RowSequence
     * @uses MartiAdrogue\SqlBuilder\HavingBuilder
     * @uses MartiAdrogue\SqlBuilder\Context
     * @covers MartiAdrogue\SqlBuilder\WhereContext::withGroupBy
     */
    public function shouldGetHavingbuilderFromGroupbyCall()
    {
        $sqlSelect = $this->whereBuilder->withGroupBy(['row1', 'row2', 'row3']);
        $this->assertInstanceOf(
            HavingBuilder::class,
            $sqlSelect,
            'JoinBuilder must return a instance of HavingBuilder from a GroupByBuilder '.
            'call of action, to let continue building the query with all statements.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\OrderByBuilder
     * @uses MartiAdrogue\SqlBuilder\Expression\RowSequence
     * @uses MartiAdrogue\SqlBuilder\Context
     * @covers MartiAdrogue\SqlBuilder\WhereContext::withOrderBy
     */
    public function shouldGetLimitbuilderFromOrderbyCall()
    {
        $sqlSelect = $this->whereBuilder->withOrderBy(['row1', 'row2', 'row3']);
        $this->assertInstanceOf(
            LimitBuilder::class,
            $sqlSelect,
            'JoinBuilder must return a instance of LimitBuilder from a OrderByBuilder '.
            'call of action, to let finish the query with a Limit statement or not.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
