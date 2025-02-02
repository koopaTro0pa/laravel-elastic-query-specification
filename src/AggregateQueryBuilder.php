<?php

namespace Ensi\LaravelElasticQuerySpecification;

use Generator;
use Ensi\LaravelElasticQuerySpecification\Processors\AggregateProcessor;
use Ensi\LaravelElasticQuerySpecification\Processors\ConstraintProcessor;
use Ensi\LaravelElasticQuerySpecification\Processors\FilterProcessor;
use Ensi\LaravelElasticQuery\Aggregating\AggregationsQuery;

/**
 * @mixin AggregationsQuery
 * @extends BaseQueryBuilder<AggregationsQuery>
 */
class AggregateQueryBuilder extends BaseQueryBuilder
{
    /**
     * @inheritDoc
     */
    protected function processors(): Generator
    {
        yield new FilterProcessor($this->parameters->filters());
        yield new ConstraintProcessor($this->query);
        yield new AggregateProcessor($this->query, $this->parameters->aggregates());
    }
}