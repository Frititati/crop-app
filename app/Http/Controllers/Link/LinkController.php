<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Link\ExternalLink;

class LinkController extends Controller
{
    public function externalLinkDefault()
    {
        $link = ExternalLink::find(1);
        return redirect($link->link_address);
    }

    public function externalLink($id)
    {
        $link = ExternalLink::find($id);

        if (is_null($link)) {
            $link = ExternalLink::find(1);
            return redirect($link->link_address);
        } else {
            return redirect($link->link_address);
        }

    }
}
