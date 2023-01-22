<?php

declare(strict_types=1);

namespace App\Model\Report;

use App\Model\Event\GAEvent;

class GoogleAnalyticsReport implements GoogleAnalyticsReportInterface
{
    private null|string $clientId;

    /** @var GAEvent[] */
    private array $events;

    public function __construct()
    {
        $this->events = [];
    }

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function setClientId(?string $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
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
}
