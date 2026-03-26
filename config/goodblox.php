<?php

/**
 * GoodBlox site + legacy Roblox client integration.
 * Set APP_URL to the base URL your game client uses (e.g. http://127.0.0.1:8000).
 */
return [
    'name' => env('GOODBLOX_SITE_NAME', 'GoodBlox'),
    'domain' => env('GOODBLOX_DOMAIN', 'localhost'),
    'discord_url' => env('GOODBLOX_DISCORD', 'https://discord.gg/AXpQe5pWgJ'),
    'blog_url' => env('GOODBLOX_BLOG', 'http://blog.madblxx.ga/index.html'),

    /** Base URL for /asset?id= and charapp body strings (must match APP_URL for clients). */
    'asset_http_base' => env('GOODBLOX_ASSET_HTTP_BASE', rtrim(env('APP_URL', 'http://localhost'), '/')),

    /** Roblox CDN fallback for generic asset proxy. */
    'roblox_assetdelivery' => env('ROBLOX_ASSETDELIVERY', 'https://assetdelivery.roblox.com/v1/asset'),
];
