<?php declare(strict_types=1);

namespace HeyFrame\Rector\Tests\Rector\ClassMethod\ChangeReturnTypeOfClassMethodRector\Fixture;

use OpenSearchDSL\Query\Compound\BoolQuery;
use HeyFrame\Core\Framework\Context;
use HeyFrame\Core\Framework\DataAbstractionLayer\Search\Criteria;
use HeyFrame\Elasticsearch\Framework\AbstractElasticsearchDefinition;

class ElasticsearchProductDefinition extends AbstractElasticsearchDefinition
{
    public function buildTermQuery(Context $context, Criteria $criteria): BoolQuery
    {
    }
}

-----
<?php declare(strict_types=1);

namespace HeyFrame\Rector\Tests\Rector\ClassMethod\ChangeReturnTypeOfClassMethodRector\Fixture;

use OpenSearchDSL\BuilderInterface;
use OpenSearchDSL\Query\Compound\BoolQuery;
use HeyFrame\Core\Framework\Context;
use HeyFrame\Core\Framework\DataAbstractionLayer\Search\Criteria;
use HeyFrame\Elasticsearch\Framework\AbstractElasticsearchDefinition;

class ElasticsearchProductDefinition extends AbstractElasticsearchDefinition
{
    public function buildTermQuery(Context $context, Criteria $criteria): BuilderInterface
    {
    }
}
