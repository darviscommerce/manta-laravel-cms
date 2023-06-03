<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use Google\Cloud\Translate\V2\TranslateClient;

class CmsSandbox extends Component
{

    public function mount()
    {

        // https://cloud.google.com/php/docs/reference/cloud-translate/latest?authuser=1

        $translate = new TranslateClient([
            'key' => env('GOOGLE_API')
        ]);
        
        // Translate text from english to french.
        $result = $translate->translate('Kippenhok!', [
            'source' => 'nl',
            'target' => 'en'
        ]);
        
        dd($result);
        
    }

    public function render()
    {
        return view('livewire.cms.cms-sandbox')->layout('layouts.manta-bootstrap');
    }
}
