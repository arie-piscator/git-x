<?php

namespace App\Services\Api\GitHub;

use App\Contracts\Services\Api\Git\GitProjectApi;
use App\Contracts\Support\HttpClientInterface;
use App\DataTransferObjects\GitProjectData;
use App\DataTransferObjects\GitProjectDataCollection;

final class GitHubProjectApi implements GitProjectApi
{
    /** @var \App\Contracts\Support\HttpClientInterface  */
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function index(): array
    {
        $projects = $this->client->get("https://api.github.com/repositories");

        return GitProjectDataCollection::create($projects, function ($project) {
            return GitProjectData::fromGitHubProject($project);
        })->items();
    }
}
