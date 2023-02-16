<?php

namespace App\Services\ClientInvoice;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ClientInvoiceDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'clientinvoice';
}
