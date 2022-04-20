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

namespace CauriLand\Crypto\ByteBuffer\Concerns;

/**
 * This is the writeable trait.
 */
trait Writeable
{
    use Writes\Floats,
        Writes\Hex,
        Writes\Integer,
        Writes\Strings,
        Writes\UnsignedInteger;
}