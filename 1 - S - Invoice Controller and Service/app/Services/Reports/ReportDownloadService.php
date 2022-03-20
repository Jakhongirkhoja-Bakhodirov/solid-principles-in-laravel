<?php

namespace App\Services\Reports;

use Illuminate\Http\Response;

class ReportDownloadService
{

    public function downloadReport($report, $format = 'html')
    {
        //Bad way - if statement for every possible format
        // if ($format == 'pdf') {
        //     return $this->downloadAsPDF($report);
        // }
        // if ($format == 'csv') {
        //     return $this->downloadAsCSV($report);
        // }
        // if ($format == 'xls') {
        //     return $this->downloadAsXLS($report);
        // }
        //Using Open-Closed Principles 
        try {
            $className = 'App\Service\Reports\ReportDownload' . strtoupper($format) . 'Service';
            return (new $className)->download();
        } catch (\Throwable $th) {
            abort(400, 'Download format not found');
        }
    }

    // private function downloadAsPdf($report): Response
    // {
    //     // to be implemented - download as PDF
    // }

    // private function downloadAsCSV($report): Response
    // {
    //     // to be implemented - download as CSV
    // }

    // private function downloadAsXLS($report): Response
    // {
    //     // to be implemented - download as XLS
    // }
}
