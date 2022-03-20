<?php

namespace App\Services\Reports;

use App\Models\Invoice;

class InvoiceService
{
    public function storeNewInvoice(string $invoice_data, string $customer_name, array $products, array $quantities, array $prices): Invoice
    {
        $invoice = Invoice::create([
            'invoice_data' => $invoice_data,
            'customer_name' => $customer_name,
            'invoice_number' => $this->getNextInvoiceNumber()
        ]);
        for ($i = 0; $i < count($products); $i++) {
            if (isset($products[$i]) && $products[$i] != '' && $quantities[$i] != '' && $prices[$i] != '') {
                $invoice->products()->attach($products[$i], [
                    'quantity' => $quantities[$i],
                    'price' => $prices[$i]
                ]);
            }
        }
        return $invoice;
    }

    public function getNextInvoiceNumber()
    {
        return Invoice::max('invoice_number') + 1;
    }
}
