<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\FromBuilder;
use MartiAdrogue\SqlBuilder\JoinBuilder;
use MartiAdrogue\SqlBuilder\WhereBuilder;
use MartiAdrogue\SqlBuilder\LimitBuilder;
use MartiAdrogue\SqlBuilder\HavingBuilder;
use MartiAdrogue\SqlBuilder\WhereAndBuilder;

/**
 * @covers MartiAdrogue\SqlBuilder\JoinBuilder::<!public>
 * @covers MartiAdrogue\SqlBuilder\JoinBuilder::__construct
 */
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
     * @covers MartiAdrogue\SqlBuilder\JoinBuilder::join
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldBuildSelectStatementAccordingWithSql92Standard()
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
     * @covers MartiAdrogue\SqlBuilder\JoinBuilder::join
     */
    public function shouldReturnAnotherJoinStatementObjectOnChangeStateOfJoin()
    {
        $sqlSelect = $this->joinBuilder->join('JOIN ON tableB id = tableA_id');
        $this->assertInstanceOf(
            JoinBuilder::class,
            $sqlSelect,
            'On change the JoinBuilder It must return an instance of same Builder, JoinBuilder, to add another join.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\WhereBuilder
     * @uses MartiAdrogue\SqlBuilder\WhereAndBuilder
     * @uses MartiAdrogue\SqlBuilder\Context
     * @covers MartiAdrogue\SqlBuilder\JoinBuilder::withWhere
     */
    public function shouldGetWhereandbuilderOnChangeStateOfJoin()
    {
        $sqlSelect = $this->joinBuilder->withWhere('title = \'lorem ipsum dolor sit amen\'');
        $this->assertInstanceOf(
            WhereAndBuilder::class,
            $sqlSelect,
            'JoinBuilder must return a instance of WhereAndBuilder to let continue '.
            'building the query with all statements.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\GroupByBuilder
     * @uses MartiAdrogue\SqlBuilder\Context
     * @uses MartiAdrogue\SqlBuilder\Expression\RowSequence
     * @uses MartiAdrogue\SqlBuilder\HavingBuilder
     * @covers MartiAdrogue\SqlBuilder\WhereContext::withGroupBy
     */
    public function shouldGetHavingbuilderFromGroupbyCall()
    {
        $sqlSelect = $this->joinBuilder->withGroupBy(['row1', 'row2', 'row3']);
        $this->assertInstanceOf(
            HavingBuilder::class,
            $sqlSelect,
            'JoinBuilder must return a instance of HavingBuilder from a GroupByBuilder ' .
            'call of action, to let continue building the query with all statements.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\OrderByBuilder
     * @uses MartiAdrogue\SqlBuilder\Expression\RowSequence
     * @uses MartiAdrogue\SqlBuilder\Context
     * @covers MartiAdrogue\SqlBuilder\HavingContext::withOrderBy
     */
    public function shouldGetLimitbuilderFromOrderbyCall()
    {
        $sqlSelect = $this->joinBuilder->withOrderBy(['row1', 'row2', 'row3']);
        $this->assertInstanceOf(
            LimitBuilder::class,
            $sqlSelect,
            'JoinBuilder must return a instance of LimitBuilder from a OrderByBuilder ' .
            'call of action, to let finish the query with a Limit statement or not.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\LimitBuilder
     * @uses MartiAdrogue\SqlBuilder\Context
     * @covers MartiAdrogue\SqlBuilder\HavingContext::withLimit
     */
    public function shouldGetLimitbuilderFromLimitCall()
    {
        $sqlSelect = $this->joinBuilder->withLimit(10);
        $this->assertInstanceOf(
            LimitBuilder::class,
            $sqlSelect,
            'JoinBuilder must return a instance of LimitBuilder from a withLimit '.
            'call, to replace the query with aother Limit statement or not.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
