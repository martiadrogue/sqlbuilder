<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\Context;
use MartiAdrogue\SqlBuilder\LimitBuilder;
use MartiAdrogue\SqlBuilder\HavingBuilder;
use MartiAdrogue\SqlBuilder\GroupByBuilder;
use MartiAdrogue\SqlBuilder\HavingAndBuilder;

/**
 * @covers MartiAdrogue\SqlBuilder\HavingBuilder::<!public>
 * @covers MartiAdrogue\SqlBuilder\HavingBuilder::__construct
 */
class HavingBuilderTest extends \PHPUnit_Framework_TestCase
{
    private $havingBuilder;

    public function setUp()
    {
        $groupByBuilder = Mockery::mock(GroupByBuilder::class);
        $returnQuery = 'SELECT row1, row2, row3, row4 FROM table GROUP BY row1, row2';
        $groupByBuilder->shouldReceive('__toString')->times(1)->andReturn($returnQuery);
        $this->havingBuilder = new HavingBuilder($groupByBuilder);
    }

    /**
     * @test
     * @covers MartiAdrogue\SqlBuilder\HavingBuilder::having
     * @uses MartiAdrogue\SqlBuilder\HavingAndBuilder
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     */
    public function shouldBuildSelectStatementAccordingWithSql92Standard()
    {
        $selectSyntax = '/.*\sHAVING\s.*/';
        $sqlSelect = $this->havingBuilder->having('title = \'lorem ipsum dolor sit amen\'');

        $this->assertRegExp(
            $selectSyntax,
            $sqlSelect->__toString(),
            'An statement SQL Select must have the specified sintax from the SQL-92 standard.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\HavingAndBuilder
     * @covers MartiAdrogue\SqlBuilder\Context::__toString
     * @covers MartiAdrogue\SqlBuilder\HavingBuilder::having
     */
    public function shouldReturnHavingandbuilderOnChangeStateOfHaving()
    {
        $sqlSelect = $this->havingBuilder->having('title = \'lorem ipsum dolor sit amen\'');
        $this->assertInstanceOf(
            HavingAndBuilder::class,
            $sqlSelect,
            'On change the HavingBuilder state It must return an instance of '.
            'HavingAndBuilder, to add some aditional filters.'
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
        $sqlSelect = $this->havingBuilder->withOrderBy(['row1', 'row2', 'row3']);
        $this->assertInstanceOf(
            LimitBuilder::class,
            $sqlSelect,
            'HavingBuilder must return a instance of LimitBuilder from a OrderByBuilder '.
            'call of action, to let finish the query with a Limit statement or not.'
        );
    }

    /**
     * @test
     * @uses MartiAdrogue\SqlBuilder\Context
     * @uses MartiAdrogue\SqlBuilder\LimitBuilder
     * @covers MartiAdrogue\SqlBuilder\HavingContext::withLimit
     */
    public function shouldGetLimitbuilderFromLimitCall()
    {
        $sqlSelect = $this->havingBuilder->withLimit(10);
        $this->assertInstanceOf(
            LimitBuilder::class,
            $sqlSelect,
            'HavingBuilder must return a instance of LimitBuilder from a withLimit '.
            'call, to replace the query with aother Limit statement or not.'
        );
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
