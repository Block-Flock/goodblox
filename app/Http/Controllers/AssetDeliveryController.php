<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AssetDeliveryController extends Controller
{
    public function proxyRoblox(Request $request): RedirectResponse
    {
        $q = $request->getQueryString();

        $base = config('goodblox.roblox_assetdelivery', 'https://assetdelivery.roblox.com/v1/asset');

        return redirect()->away($base.'/?'.($q ?? ''));
    }

    public function bodyColors(Request $request): RedirectResponse
    {
        return redirect()->away('https://assetdelivery.roblox.com/v1/asset?id=5239080');
    }

    public function scriptState(): Response
    {
        return response("0 0 0 00 0 0 0\n", 200, ['Content-Type' => 'text/plain']);
    }
}
