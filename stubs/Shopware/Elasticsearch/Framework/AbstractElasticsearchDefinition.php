<?php declare(strict_types=1);

namespace HeyFrame\Elasticsearch\Framework;

use OpenSearchDSL\Query\Compound\BoolQuery;
use HeyFrame\Core\Framework\Context;
use HeyFrame\Core\Framework\DataAbstractionLayer\Search\Criteria;

abstract class AbstractElasticsearchDefinition
{
    abstract public function buildTermQuery(Context $context, Criteria $criteria): BoolQuery;
}
