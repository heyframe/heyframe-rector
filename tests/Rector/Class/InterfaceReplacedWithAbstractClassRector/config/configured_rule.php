<?php

declare(strict_types=1);

use HeyFrame\Rector\Rule\Class_\InterfaceReplacedWithAbstractClass;
use HeyFrame\Rector\Rule\Class_\InterfaceReplacedWithAbstractClassRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config_test.php');
    $rectorConfig->ruleWithConfiguration(
        InterfaceReplacedWithAbstractClassRector::class,
        [
            new InterfaceReplacedWithAbstractClass('CartFoo', 'AbstractCartFoo'),
            new InterfaceReplacedWithAbstractClass('HeyFrame\Core\Checkout\Cart\CartPersisterInterface', '\HeyFrame\Core\Checkout\Cart\AbstractCartPersister'),
        ],
    );
};
