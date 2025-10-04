<?php

declare(strict_types=1);

use HeyFrame\Rector\Rule\ClassConstructor\MakeClassConstructorArgumentRequired;
use HeyFrame\Rector\Rule\ClassConstructor\MakeClassConstructorArgumentRequiredRector;
use PHPStan\Type\NullType;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config_test.php');
    $rectorConfig->ruleWithConfiguration(
        MakeClassConstructorArgumentRequiredRector::class,
        [
            new MakeClassConstructorArgumentRequired('Foo', 1, new NullType()),
        ],
    );
};
