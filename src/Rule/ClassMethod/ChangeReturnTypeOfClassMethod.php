<?php declare(strict_types=1);

namespace HeyFrame\Rector\Rule\ClassMethod;

use PhpParser\Node\Name;

class ChangeReturnTypeOfClassMethod
{
    public function __construct(public readonly string $class, public readonly string $method, public readonly Name $returnType)
    {
    }
}
