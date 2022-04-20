<?php

declare(strict_types=1);

/*
 * This file is part of Cauri PHP Crypto.
 *
 * (c) Cauri Land <info@cauri.cm>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CauriLand\Tests\Crypto\Unit\Networks;

use CauriLand\Crypto\Networks\Testnet;
use BitWasp\Bitcoin\Network\Network;

/**
 * This is the testnet network test class.
 *
 * @author Brian Faust <brian@ark.io>
 * @covers \CauriLand\Crypto\Networks\Testnet
 */
class TestnetTest extends NetworkTestCase
{
    protected $epoch = '2017-03-21T13:00:00.000Z';

    protected $pubKeyHash = 23;

    public function getTestSubject()
    {
        return Testnet::new();
    }
}
