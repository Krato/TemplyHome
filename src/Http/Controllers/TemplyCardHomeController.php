<?php

namespace Infinety\TemplyHome\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Infinety\TemplyHome\Http\Events\ActivateWebsite;

class TemplyCardHomeController extends Controller
{

    /**
     * Check status
     *
     * @param   Request  $request  [description]
     *
     * @return  json
     */
    public function checkStatus(Request $request)
    {
        $step = 1;
        $theme = setting('theme', false);
        $pallete = setting('pallete', false);

        if ($theme != false && $pallete != false) {
            $step = 2;
        }

        $websiteName = setting('website_name', false);
        $logo = setting('logo', false);
        $email = setting('email', false);
        $address = setting('address', false);

        if ($websiteName != false && $logo != false && $email != false && $address != false) {
            $step = 3;
        }

        return response()->json([
            'step' => $step,
        ]);
    }

    public function activate()
    {
        event(new ActivateWebsite());

        return response()->json([
            'success' => true,
        ]);
    }
}
