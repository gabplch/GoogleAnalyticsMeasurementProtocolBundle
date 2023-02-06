<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Event;

use Symfony\Component\Validator\Constraints as Assert;

class GAEvent implements GAEventInterface
{
    #[Assert\Sequentially(
        constraints: [
            new Assert\NotBlank(),
            new Assert\Length(min: 1),
        ]
    )]
    private string $name;

    #[Assert\Sequentially(
        constraints: [
            new Assert\NotBlank(),
            new Assert\Count(
                min: 1,
                max: 25,
            ),
        ]
    )]
    private array $parameters = [];

    public function __construct(string $name) {
        $this->name = $name;
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

    /**
     * @return GAEventParameterInterface[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function addParameter(GAEventParameterInterface $parameter): self
    {
        $this->parameters[] = $parameter;

        return $this;
    }

    /**
     * @param GAEventParameterInterface[] $parameters
     *
     * @return $this
     */
    public function setParameters(array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }
}
