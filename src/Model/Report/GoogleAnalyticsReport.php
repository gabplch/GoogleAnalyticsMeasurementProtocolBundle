<?php

declare(strict_types=1);

namespace App\Model\Report;

use App\Model\Event\GoogleAnalyticsEvent;

class GoogleAnalyticsReport implements GoogleAnalyticsReportInterface
{
    private null|string $clientId;

    /** @var GoogleAnalyticsEvent[] */
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
     * @return GoogleAnalyticsEvent[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @param GoogleAnalyticsEvent[] $events
     *
     * @return $this
     */
    public function setEvents(array $events): self
    {
        $this->events = $events;

        return $this;
    }

    public function addEvent(GoogleAnalyticsEvent $event): self
    {
        $this->events[] = $event;

        return $this;
    }
}
