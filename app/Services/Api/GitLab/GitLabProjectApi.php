<?php

namespace App\Services\Api\GitLab;

use App\Contracts\Services\Api\Git\GitProjectApi;
use App\Contracts\Support\HttpClientInterface;
use App\DataTransferObjects\GitProjectData;
use App\DataTransferObjects\GitProjectDataCollection;

final class GitLabProjectApi implements GitProjectApi
{
    /** @var \App\Contracts\Support\HttpClientInterface  */
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function index(): array
    {
        $projects = $this->client->get("https://gitlab.com/api/v4/projects");

        return GitProjectDataCollection::create($projects, function ($project) {
            return GitProjectData::fromGitLabProject($project);
        })->items();
    }
}
