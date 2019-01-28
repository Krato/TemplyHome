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
        $palette = setting('palette', false);

        if ($theme != false && $palette != false) {
            $step = 2;
        }

        $websiteName = setting('website_name', false);
        $logo = setting('logo', false);
        $email = setting('email', false);
        $address = setting('address', false);

        if ($websiteName != false && $logo != false && $email != false && $address != false) {
            $step = 3;
        }

        $pagesVisited = setting('step', false);
        if ($pagesVisited == 4) {
            $step = 4;
        }

        return response()->json([
            'step' => $step,
        ]);
    }

    public function pagesVisited()
    {
        setting(['step' => 4]);
        setting()->save();

        return response()->json([
            'success' => true,
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
