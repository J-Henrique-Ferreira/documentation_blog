<?php

use App\Models\Tenant;

if (!function_exists('currentSubdomainDatas')) {

    function currentSubdomainDatas()
    {
        $host = request()->getHost();
        $subdomain = explode('.', $host)[0];
        $tenantData = Tenant::where('domain', $subdomain)->first();

        return $tenantData->toArray();
    }
}
