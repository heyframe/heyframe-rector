<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Transform\Rector\New_\NewToStaticCallRector;
use Rector\Transform\ValueObject\NewToStaticCall;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        NewToStaticCallRector::class,
        [
            // RoutingException
            new NewToStaticCall('HeyFrame\Core\Framework\Routing\Exception\InvalidRequestParameterException', 'HeyFrame\Core\Framework\Routing\RoutingException', 'invalidRequestParameter'),
            new NewToStaticCall('HeyFrame\Core\Framework\Routing\Exception\MissingRequestParameterException', 'HeyFrame\Core\Framework\Routing\RoutingException', 'missingRequestParameter'),
            new NewToStaticCall('HeyFrame\Core\Framework\Routing\Exception\LanguageNotFoundException', 'HeyFrame\Core\Framework\Routing\RoutingException', 'languageNotFound'),

            // DataAbstractionLayerException
            new NewToStaticCall('HeyFrame\Core\Framework\DataAbstractionLayer\Exception\InvalidSerializerFieldException', 'HeyFrame\Core\Framework\DataAbstractionLayer\DataAbstractionLayerException', 'invalidSerializerField'),
            new NewToStaticCall('HeyFrame\Core\Framework\DataAbstractionLayer\Exception\VersionMergeAlreadyLockedException', 'HeyFrame\Core\Framework\DataAbstractionLayer\DataAbstractionLayerException', 'versionMergeAlreadyLocked'),

            // ElasticsearchException
            new NewToStaticCall('HeyFrame\Elasticsearch\Exception\UnsupportedElasticsearchDefinitionException', 'HeyFrame\Elasticsearch\ElasticsearchException', 'unsupportedElasticsearchDefinition'),
            new NewToStaticCall('HeyFrame\Elasticsearch\Exception\ElasticsearchIndexingException', 'HeyFrame\Elasticsearch\ElasticsearchException', 'indexingError'),
            new NewToStaticCall('HeyFrame\Elasticsearch\Exception\ServerNotAvailableException', 'HeyFrame\Elasticsearch\ElasticsearchException', 'serverNotAvailable'),

            // ProductExportException
            new NewToStaticCall('HeyFrame\Core\Content\ProductExport\Exception\EmptyExportException', 'HeyFrame\Core\Content\ProductExport\ProductExportException', 'productExportNotFound'),
            new NewToStaticCall('HeyFrame\Core\Content\ProductExport\Exception\RenderFooterException', 'HeyFrame\Core\Content\ProductExport\ProductExportException', 'renderFooterException'),
            new NewToStaticCall('HeyFrame\Core\Content\ProductExport\Exception\RenderHeaderException', 'HeyFrame\Core\Content\ProductExport\ProductExportException', 'renderHeaderException'),
            new NewToStaticCall('HeyFrame\Core\Content\ProductExport\Exception\RenderProductException', 'HeyFrame\Core\Content\ProductExport\ProductExportException', 'renderProductException'),
        ],
    );
};
