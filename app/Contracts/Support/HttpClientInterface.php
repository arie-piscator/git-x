<?php

namespace App\Contracts\Support;

interface HttpClientInterface
{
    public function get(string $url): array;
}
