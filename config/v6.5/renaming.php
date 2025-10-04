<?php

declare(strict_types=1);

use HeyFrame\Rector\Rule\Class_\InterfaceReplacedWithAbstractClass;
use HeyFrame\Rector\Rule\Class_\InterfaceReplacedWithAbstractClassRector;
use HeyFrame\Rector\Rule\ClassConstructor\RemoveArgumentFromClassConstruct;
use HeyFrame\Rector\Rule\ClassConstructor\RemoveArgumentFromClassConstructRector;
use HeyFrame\Rector\Rule\v65\FakerPropertyToMethodCallRector;
use HeyFrame\Rector\Rule\v65\MigrateCaptchaAnnotationToRouteRector;
use HeyFrame\Rector\Rule\v65\MigrateLoginRequiredAnnotationToRouteRector;
use HeyFrame\Rector\Rule\v65\MigrateRouteScopeToRouteDefaults;
use HeyFrame\Rector\Rule\v65\ThumbnailGenerateSingleToMultiGenerateRector;
use Rector\Arguments\Rector\MethodCall\RemoveMethodCallParamRector;
use Rector\Arguments\ValueObject\RemoveMethodCallParam;
use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Transform\Rector\Assign\PropertyFetchToMethodCallRector;
use Rector\Transform\ValueObject\PropertyFetchToMethodCall;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../config.php');

    $rectorConfig->ruleWithConfiguration(
        RenameMethodRector::class,
        [
            new MethodCallRename('HeyFrame\Core\Framework\Adapter\Twig\EntityTemplateLoader', 'clearInternalCache', 'reset'),
            new MethodCallRename('HeyFrame\Core\Content\ImportExport\Processing\Mapping\Mapping', 'getDefault', 'getDefaultValue'),
            new MethodCallRename('HeyFrame\Core\Content\ImportExport\Processing\Mapping\Mapping', 'getMappedDefault', 'getDefaultValue'),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RenameClassRector::class,
        [
            'HeyFrame\Core\Framework\Adapter\Asset\ThemeAssetPackage' => 'HeyFrame\Storefront\Theme\ThemeAssetPackage',
            'Maltyxx\ImagesGenerator\ImagesGeneratorProvider' => 'bheller\ImagesGenerator\ImagesGeneratorProvider',
            'HeyFrame\Core\Framework\Event\BusinessEventInterface' => 'HeyFrame\Core\Framework\Event\FlowEventAware',
            'HeyFrame\Core\Framework\Event\MailActionInterface' => 'HeyFrame\Core\Framework\Event\MailAware',
            'HeyFrame\Core\Framework\Log\LogAwareBusinessEventInterface' => 'HeyFrame\Core\Framework\Log\LogAware',
            'HeyFrame\Storefront\Event\ProductExportContentTypeEvent' => 'HeyFrame\Core\Content\ProductExport\Event\ProductExportContentTypeEvent',
            'HeyFrame\Storefront\Page\Product\Review\MatrixElement' => 'HeyFrame\Core\Content\Product\SalesChannel\Review\MatrixElement',
            'HeyFrame\Storefront\Page\Product\Review\RatingMatrix' => 'HeyFrame\Core\Content\Product\SalesChannel\Review\RatingMatrix',
            'HeyFrame\Storefront\Page\Address\Listing\AddressListingCriteriaEvent' => 'HeyFrame\Core\Checkout\Customer\Event\AddressListingCriteriaEvent',
            'HeyFrame\Administration\Service\AdminOrderCartService' => 'HeyFrame\Core\Checkout\Cart\ApiOrderCartService',
            'HeyFrame\Core\System\User\Service\UserProvisioner' => 'HeyFrame\Core\Maintenance\User\Service\UserProvisioner',
            'HeyFrame\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface' => 'HeyFrame\Core\Framework\DataAbstractionLayer\EntityRepository',
            'HeyFrame\Core\System\SalesChannel\Entity\SalesChannelRepositoryInterface' => 'HeyFrame\Core\System\SalesChannel\Entity\SalesChannelRepository',
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RemoveMethodCallParamRector::class,
        [
            new RemoveMethodCallParam('HeyFrame\Core\Checkout\Cart\Tax\Struct\CalculatedTaxCollection', 'merge', 1),
        ],
    );

    $rectorConfig->ruleWithConfiguration(
        RemoveArgumentFromClassConstructRector::class,
        [
            new RemoveArgumentFromClassConstruct('HeyFrame\Core\Checkout\Customer\Exception\DuplicateWishlistProductException', 0),
            new RemoveArgumentFromClassConstruct('HeyFrame\Core\Content\Newsletter\Exception\LanguageOfNewsletterDeleteException', 0),
        ],
    );

    $rectorConfig->rule(MigrateLoginRequiredAnnotationToRouteRector::class);
    $rectorConfig->rule(MigrateCaptchaAnnotationToRouteRector::class);
    $rectorConfig->rule(MigrateRouteScopeToRouteDefaults::class);
    $rectorConfig->rule(ThumbnailGenerateSingleToMultiGenerateRector::class);

    $rectorConfig->ruleWithConfiguration(
        PropertyFetchToMethodCallRector::class,
        [new PropertyFetchToMethodCall(
            'HeyFrame\Core\Content\Flow\Dispatching\FlowState',
            'sequenceId',
            'getSequenceId',
            null,
        )],
    );

    $rectorConfig->ruleWithConfiguration(
        InterfaceReplacedWithAbstractClassRector::class,
        [
            new InterfaceReplacedWithAbstractClass('HeyFrame\Core\Checkout\Cart\CartPersisterInterface', 'HeyFrame\Core\Checkout\Cart\AbstractCartPersister'),
            new InterfaceReplacedWithAbstractClass('HeyFrame\Core\Content\Sitemap\Provider\UrlProviderInterface', 'HeyFrame\Core\Content\Sitemap\Provider\AbstractUrlProvider'),
            new InterfaceReplacedWithAbstractClass('HeyFrame\Core\System\Snippet\Files\SnippetFileInterface', 'HeyFrame\Core\System\Snippet\Files\GenericSnippetFile'),
        ],
    );

    $rectorConfig->rule(FakerPropertyToMethodCallRector::class);
};
