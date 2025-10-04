<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;
use Rector\Renaming\ValueObject\RenameStaticMethod;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            new MethodCallRename('HeyFrame\Elasticsearch\Framework\Indexing\IndexerOffset', 'setNextDefinition', 'selectNextDefinition'),
            new MethodCallRename('HeyFrame\Elasticsearch\Framework\Indexing\IndexerOffset', 'setNextLanguage', 'selectNextLanguage'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameStaticMethodRector::class,
        [
            new RenameStaticMethod('HeyFrame\Core\Framework\DataAbstractionLayer\FieldSerializer\JsonFieldSerializer', 'encodeJson', 'HeyFrame\Core\Framework\Util\Json', 'encode'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassRector::class,
        [
            'HeyFrame\Core\Framework\DataAbstractionLayer\Event\BeforeDeleteEvent' => 'HeyFrame\Core\Framework\DataAbstractionLayer\Event\EntityDeleteEvent',
            'HeyFrame\Core\Framework\Api\Exception\ExceptionFailedException' => 'HeyFrame\Core\Framework\Api\Exception\ExpectationFailedException',
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassConstFetchRector::class,
        [
            new RenameClassAndConstFetch('HeyFrame\Core\Checkout\Cart', 'CHECKOUT_ORDER_PLACED', 'HeyFrame\Core\Framework\Event\BusinessEvents', 'CHECKOUT_ORDER_PLACED'),
            new RenameClassAndConstFetch('HeyFrame\Elasticsearch\Product\ElasticsearchProductDefinition', 'KEYWORD_FIELD', 'HeyFrame\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'KEYWORD_FIELD'),
            new RenameClassAndConstFetch('HeyFrame\Elasticsearch\Product\ElasticsearchProductDefinition', 'BOOLEAN_FIELD', 'HeyFrame\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'BOOLEAN_FIELD'),
            new RenameClassAndConstFetch('HeyFrame\Elasticsearch\Product\ElasticsearchProductDefinition', 'FLOAT_FIELD', 'HeyFrame\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'FLOAT_FIELD'),
            new RenameClassAndConstFetch('HeyFrame\Elasticsearch\Product\ElasticsearchProductDefinition', 'INT_FIELD', 'HeyFrame\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'INT_FIELD'),
            new RenameClassAndConstFetch('HeyFrame\Elasticsearch\Product\ElasticsearchProductDefinition', 'SEARCH_FIELD', 'HeyFrame\Elasticsearch\Framework\AbstractElasticsearchDefinition', 'SEARCH_FIELD'),
        ],
    );
};
