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

if (!function_exists('generateSlug')) {
    function generateSlug(string $text): string
    {
        // Converte para minúsculas
        $slug = mb_strtolower($text, 'UTF-8');
        // Remove acentos e normaliza caracteres
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);
        // Remove caracteres especiais
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
        // Substitui múltiplos espaços ou hífens por um único hífen
        $slug = preg_replace('/[\s-]+/', '-', $slug);
        // Remove hífens no início e no fim
        $slug = trim($slug, '-');

        return $slug;
    }
}
