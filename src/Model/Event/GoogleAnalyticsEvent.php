<?php

declare(strict_types=1);

namespace App\Model\Event;

class GoogleAnalyticsEvent implements GoogleAnalyticsEventInterface
{
    public function __construct(
        private string $name,
        private GoogleAnalyticsEventParameterInterface $parameter,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getParameter(): GoogleAnalyticsEventParameterInterface
    {
        return $this->parameter;
    }

    public function setParameter(GoogleAnalyticsEventParameterInterface $parameter): self
    {
        $this->parameter = $parameter;

        return $this;
    }
}
