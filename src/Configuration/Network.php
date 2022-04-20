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

namespace CauriLand\Crypto\Configuration;

use CauriLand\Crypto\Networks\AbstractNetwork;
use CauriLand\Crypto\Networks\Devnet;
use BitWasp\Bitcoin\Bitcoin;

/**
 * This is the network configuration class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class Network
{
    /**
     * The network used for crypto operations.
     *
     * @var \CauriLand\Crypto\Networks\AbstractNetwork
     */
    private static $network;

    /**
     * Call a method on the network instance.
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public static function __callStatic(string $method, array $args)
    {
        return static::get()->{$method}(...$args);
    }

    /**
     * Get the network used for crypto operations.
     *
     * @return \CauriLand\Crypto\Networks\AbstractNetwork
     */
    public static function get(): AbstractNetwork
    {
        return static::$network ?? Devnet::new();
    }

    /**
     * Set the network used for crypto operations.
     *
     * @param \CauriLand\Crypto\Networks\AbstractNetwork $network
     */
    public static function set(AbstractNetwork $network): void
    {
        static::$network = $network;

        Bitcoin::setNetwork($network);
    }
}
