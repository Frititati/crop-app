<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Link\ExternalLink;

class LinkController extends Controller
{
    public function externalLink($id)
    {
        $link = ExternalLink::findOrFail($id);

        return redirect($link->link_address);
    }
}
