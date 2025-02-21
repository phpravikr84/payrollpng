<?php

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    protected $proxies = '*'; // Trust all proxies
    protected $headers = Request::HEADER_X_FORWARDED_ALL; // Use this for all header types
}
