<?php

namespace Tests\Mocks;

use App\Contracts\Support\HttpClientInterface;

final class MockHttpClient implements HttpClientInterface
{
    private $calledOnce = false;

    private $returnValue;

    /**
     * @param $mixed
     * @return $this
     */
    public function setReturnValue($mixed)
    {
        $this->returnValue = $mixed;

        return $this;
    }

    public function get(string $url): array
    {
        $this->calledOnce = true;

        return $this->returnValue;
    }
}
