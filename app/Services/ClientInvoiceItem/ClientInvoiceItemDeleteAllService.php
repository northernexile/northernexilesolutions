<?php

namespace App\Services\ClientInvoiceItem;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ClientInvoiceItemDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'clientinvoiceitem';
}
