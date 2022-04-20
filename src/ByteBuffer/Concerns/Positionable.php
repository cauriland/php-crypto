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
 * This is the positionable trait.
 */
trait Positionable
{
    /**
     * Gets the absolute read/write offset.
     *
     * @return int
     */
    public function current(): int
    {
        return $this->offset;
    }

    /**
     * Sets this ByteBuffers absolute read/write offset.
     *
     * @param int $offset
     *
     * @return \CauriLand\Crypto\ByteBuffer\ByteBuffer
     */
    public function position(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Skips N amount of bytes.
     *
     * @param int $length
     *
     * @return \CauriLand\Crypto\ByteBuffer\ByteBuffer
     */
    public function skip(int $length): self
    {
        $this->offset += $length;

        return $this;
    }

    /**
     * Rewinds N amount of bytes.
     *
     * @param int $length
     *
     * @return \CauriLand\Crypto\ByteBuffer\ByteBuffer
     */
    public function rewind(int $length): self
    {
        $this->offset -= $length;

        return $this;
    }

    /**
     * Resets this ByteBuffers offset.
     *
     * @return \CauriLand\Crypto\ByteBuffer\ByteBuffer
     */
    public function reset(): self
    {
        $this->offset = 0;

        return $this;
    }

    /**
     * Clears this ByteBuffers offsets.
     *
     * @return \CauriLand\Crypto\ByteBuffer\ByteBuffer
     */
    public function clear(): self
    {
        $this->offset = 0;
        $this->length = count($this->buffer);

        return $this;
    }
}
