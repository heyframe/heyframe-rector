<?php

namespace HeyFrame\Core\Checkout\Cart;

interface CartPersisterInterface {}
abstract class AbstractCartPersister {}

class MyClass implements CartPersisterInterface
{
    private CartPersisterInterface $cartPersister;

    public function __construct(CartPersisterInterface $cartPersister)
    {
        $this->cartPersister = $cartPersister;
    }
}
-----
<?php

namespace HeyFrame\Core\Checkout\Cart;

interface CartPersisterInterface {}
abstract class AbstractCartPersister {}

class MyClass extends \HeyFrame\Core\Checkout\Cart\AbstractCartPersister
{
    private \HeyFrame\Core\Checkout\Cart\AbstractCartPersister $cartPersister;
    public function __construct(\HeyFrame\Core\Checkout\Cart\AbstractCartPersister $cartPersister)
    {
        $this->cartPersister = $cartPersister;
    }
}
