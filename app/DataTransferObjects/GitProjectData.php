<?php

namespace App\DataTransferObjects;

use App\ValueObjects\GitLabProjectUrl;
use Spatie\DataTransferObject\DataTransferObject;

class GitProjectData extends DataTransferObject
{
    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $url;

    public static function fromGitLabProject(array $project): self
    {
        return new self([
            'id' => $project['id'],
            'name' => $project['name'],
            'url' => GitLabProjectUrl::fromString($project['web_url'])->get(),
        ]);
    }

    public static function fromGitHubProject(array $project): self
    {
        return new self([
            'id' => $project['id'],
            'name' => $project['name'],
            'url' => GitLabProjectUrl::fromString(
                'https://github.com/' . $project['full_name']
            )->get(),
        ]);
    }
}
