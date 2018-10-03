<?php

namespace Statamic\Addons\PdfUpload;

use Statamic\Extend\API;
use Illuminate\Support\Facades\Log;
use Predis\Client;

class PdfUploadAPI extends API
{
    /**
     * Accessed by $this->api('PdfUpload')->example() from other addons
     */
    public function renderPdf($filename,$fullFilename)
    {
        $client = new Client(array(
            'scheme' => 'tcp',
            'host' => 'thomas-redis',
            'port' => 6379,
        ));

        $workingDir = getcwd();
        $client->publish('PDFRender.RUN', json_encode(array(
            'fullFilename' => $fullFilename,
            'filename' => $filename,
            'workingDir' => $workingDir,
        )));
    }
}
