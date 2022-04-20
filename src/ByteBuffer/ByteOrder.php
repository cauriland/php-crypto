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

namespace CauriLand\Crypto\ByteBuffer;

class ByteOrder
{
    /**
     * Most significant value in the sequence is stored first. Flip no bytes!
     */
    const BE = 0;

    /**
     * Least significant value in the sequence is stored first. Flip bytes!
     */
    const LE = 1;

    /**
     * Let the current machine determine the endianess.
     */
    const MB = 2;
}
