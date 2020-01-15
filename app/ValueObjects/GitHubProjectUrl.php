<?php

namespace App\ValueObjects;

use Assert\Assert;

final class GitHubProjectUrl
{
    /** @var string */
    private $url;

    private function __construct(string $url)
    {
        Assert::that($url)
            ->url()
            ->contains($url, "https://github.com");

        $this->url = $url;
    }

    public static function fromString(string $url)
    {
        return new self($url);
    }

    public function get(): string
    {
        return $this->url;
    }
}
