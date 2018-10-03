<?php

namespace Statamic\Addons\PdfUpload;

use Statamic\API\Nav;
use Statamic\Extend\Listener;
use Illuminate\Support\Facades\Log;


class PdfUploadListener extends Listener
{
    /**
     * The events to be listened for, and the methods to call.
     *
     * @var array
     */
    public $events = [
        'cp.nav.created' => 'addNavItems'
    ];

    public function addNavItems($nav){
        $pdfUpload = Nav::item('PdfUpload')->icon('book')->route('pdfupload.index')->name('Add Book');

        $nav->addTo('content', $pdfUpload);
        $pdfUpload->add(NAV::item('Edit')->route('pdfupload.getAll')->name('Rename Book'));
    }
}
