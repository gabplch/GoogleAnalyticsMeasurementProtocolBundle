<?php

declare(strict_types=1);

namespace App\Trait;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait HttpClientTrait
{
    protected HttpClientInterface $httpClient;

    #[Required]
    public function setHttpClient(HttpClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }
}
