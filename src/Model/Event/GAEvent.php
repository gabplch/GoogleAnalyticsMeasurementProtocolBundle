<?php

declare(strict_types=1);

namespace App\Model\Event;

class GAEvent implements GAEventInterface
{
    public function __construct(
        private string $name,
        private GAEventParameterInterface $parameter,
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

    public function getParameter(): GAEventParameterInterface
    {
        return $this->parameter;
    }

    public function setParameter(GAEventParameterInterface $parameter): self
    {
        $this->parameter = $parameter;

        return $this;
    }
}
