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

namespace CauriLand\Crypto\Binary\Buffer\Writer\Concerns;

use CauriLand\Crypto\Binary\UnsignedInteger\Writer;

trait UnsignedInteger
{
    /**
     * Write an unsigned 8 bit integer.
     *
     * @param int $value
     *
     * @return \CauriLand\Crypto\Binary\Buffer\Writer\Buffer
     */
    public function writeUInt8(int $value): self
    {
        $this->bytes .= Writer::bit8($value);

        return $this;
    }

    /**
     * Write an unsigned 16 bit integer.
     *
     * @param int $value
     *
     * @return \CauriLand\Crypto\Binary\Buffer\Writer\Buffer
     */
    public function writeUInt16(int $value): self
    {
        $this->bytes .= Writer::bit16($value);

        return $this;
    }

    /**
     * Write an unsigned 32 bit integer.
     *
     * @param int $value
     *
     * @return \CauriLand\Crypto\Binary\Buffer\Writer\Buffer
     */
    public function writeUInt32(int $value): self
    {
        $this->bytes .= Writer::bit32($value);

        return $this;
    }

    /**
     * Write an unsigned 64 bit integer.
     *
     * @param int $value
     *
     * @return \CauriLand\Crypto\Binary\Buffer\Writer\Buffer
     */
    public function writeUInt64(int $value): self
    {
        $this->bytes .= Writer::bit64($value);

        return $this;
    }
}
