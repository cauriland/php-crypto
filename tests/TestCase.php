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

namespace CauriLand\Tests\Crypto;

use CauriLand\Crypto\Configuration\Network;
use CauriLand\Crypto\Networks\Mainnet;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use Concerns\Fixtures,
        Concerns\Serialize,
        Concerns\Deserialize;

    protected $passphrase = 'this is a top secret passphrase';

    protected $secondPassphrase = 'this is a top secret second passphrase';

    protected function setUp(): void
    {
        Network::set(Mainnet::new());
    }
}
