<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Api\Git\GitProjectApi;
use Illuminate\Http\JsonResponse;

final class GitProjectController
{
    /** @var GitProjectApi */
    protected $gitProjectService;

    public function __construct(GitProjectApi $gitProjectService)
    {
        $this->gitProjectService = $gitProjectService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->gitProjectService->index());
    }
}
