<?php

namespace MartiAdrogue\SqlBuilder\Test;

use Mockery;
use MartiAdrogue\SqlBuilder\Context;
use MartiAdrogue\SqlBuilder\LimitBuilder;
use MartiAdrogue\SqlBuilder\HavingBuilder;
use MartiAdrogue\SqlBuilder\GroupByBuilder;

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
     */
    public function shouldReturnAFullSelectStatementAccordingWithSql92Standard()
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
     */
    public function shouldChangeStateOfHavingAndReturnAnotherHavingbuilder()
    {
        $sqlSelect = $this->havingBuilder->having('title = \'lorem ipsum dolor sit amen\'');
        $this->assertInstanceOf(
            HavingBuilder::class,
            $sqlSelect,
            'On change the HavingBuilder state It must return an instance of '.
            'same Builder, to add some aditional filters.'
        );
    }

    /**
     * @test
     */
    public function shouldReturnInstanceOfLimitbuilderFromOrderbyCall()
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
     */
    public function shouldReturnInstanceOfLimitbuilderFromLimitCall()
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
