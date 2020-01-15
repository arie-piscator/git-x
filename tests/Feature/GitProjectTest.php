<?php

namespace Tests\Feature;

use App\DataTransferObjects\GitProjectData;
use App\Services\Api\GitHub\GitHubProjectApi;
use App\Services\Api\GitLab\GitLabProjectApi;
use Tests\Mocks\MockHttpClient;
use Tests\TestCase;

final class GitProjectTest extends TestCase
{
    /** @test */
    public function it_lists_projects_from_github()
    {
        $githubProjects = [
            [
                'id' => 1,
                'name' => 'john',
                'full_name' => 'john/doe'
            ],
        ];

        $httpClient = new MockHttpClient();
        $httpClient->setReturnValue($githubProjects);

        $gitProjectService = new GitHubProjectApi($httpClient);

        $expectedProjects = array(
            new GitProjectData([
                'id' => 1,
                'name' => 'john',
                'url' => 'https://github.com/john/doe',
            ])
        );

        $this->assertEquals($expectedProjects, $gitProjectService->index());
    }

    /** @test */
    public function it_lists_projects_from_gitlab()
    {
        $gitlabProjects = [
            [
                'id' => 1,
                'name' => 'john',
                'web_url' => 'https://gitlab.com/john/doe'
            ],
        ];

        $httpClient = new MockHttpClient();
        $httpClient->setReturnValue($gitlabProjects);

        $gitProjectService = new GitLabProjectApi($httpClient);

        $expectedProjects = array(
            new GitProjectData([
                'id' => 1,
                'name' => 'john',
                'url' => 'https://gitlab.com/john/doe',
            ])
        );

        $this->assertEquals($expectedProjects, $gitProjectService->index());
    }
}
