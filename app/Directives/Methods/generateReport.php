<?php

namespace App\Directives\Methods;

use App\Http\Controllers\SaiController;
use Sidevtech\Directives\Implementations\directivesAnswers;

use Sidevtech\Sai\Helpers\SaiHelpers;
use Sidevtech\Sai\Sai;

class GenerateReport implements directivesAnswers
{
    public function outPut($request)
    {
        return (new SaiHelpers('GetName'))->call($request->input('message'));
    }
}
