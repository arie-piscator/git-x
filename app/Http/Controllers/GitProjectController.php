<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Api\Git\GitProjectApi;
use Illuminate\Http\JsonResponse;

final class GitProjectController
{
    /** @var GitProjectApi */
    protected $gitProjectApi;

    public function __construct(GitProjectApi $gitProjectApi)
    {
        $this->gitProjectApi = $gitProjectApi;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->gitProjectApi->index());
    }
}
