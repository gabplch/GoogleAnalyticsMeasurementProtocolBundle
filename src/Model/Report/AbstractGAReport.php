<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Event\GAEvent;

use Symfony\Component\Validator\Constraints as Assert;

class AbstractGAReport implements GAReportInterface
{
    #[Assert\Sequentially(
        constraints: [
            new Assert\NotBlank(),
            new Assert\Count(min: 1, max: 25),
        ]
    )]
    private array $events;

    #[Assert\Sequentially(
        constraints: [
            new Assert\Length(
                min: 1,
                charset: 'UTF-8',
            )
        ]
    )]
    private ?string $userId = null;

    private ?int $timestampMicros = null;

    private bool $nonPersonalizedAds = false;

    public function __construct()
    {
        $this->events = [];
    }

    /**
     * @return GAEvent[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @param GAEvent[] $events
     *
     * @return $this
     */
    public function setEvents(array $events): self
    {
        $this->events = $events;

        return $this;
    }

    public function addEvent(GAEvent $event): self
    {
        $this->events[] = $event;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(?string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getTimestampMicros(): ?int
    {
        return $this->timestampMicros;
    }

    public function setTimestampMicros(?int $timestampMicros): self
    {
        $this->timestampMicros = $timestampMicros;

        return $this;
    }

    public function isNonPersonalizedAds(): bool
    {
        return $this->nonPersonalizedAds;
    }

    public function setNonPersonalizedAds(bool $nonPersonalizedAds): self
    {
        $this->nonPersonalizedAds = $nonPersonalizedAds;

        return $this;
    }
}
