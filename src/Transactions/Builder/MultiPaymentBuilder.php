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

namespace CauriLand\Crypto\Transactions\Builder;

use CauriLand\Crypto\Transactions\Types\MultiPayment;

/**
 * This is the multi payment transaction class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class MultiPaymentBuilder extends AbstractTransactionBuilder
{
    /**
     * Create a new multi signature transaction instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->transaction->data['asset'] = ['payments' => []];
    }

    /**
     * Add a new payment to the collection.
     *
     * @param string $recipientId
     * @param string $amount
     *
     * @return self
     */
    public function add(string $recipientId, string $amount): self
    {
        $this->transaction->data['asset']['payments'][] = compact('recipientId', 'amount');

        return $this;
    }

    /**
     * Set the vendor field / smartbridge.
     *
     * @param string $vendorField
     *
     * @return self
     */
    public function vendorField(string $vendorField): self
    {
        $this->transaction->data['vendorField'] = $vendorField;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getType(): int
    {
        return \CauriLand\Crypto\Enums\Types::MULTI_PAYMENT;
    }

    protected function getTypeGroup(): int
    {
        return \CauriLand\Crypto\Enums\TypeGroup::CORE;
    }

    protected function getTransactionInstance(): object
    {
        return new MultiPayment();
    }
}
