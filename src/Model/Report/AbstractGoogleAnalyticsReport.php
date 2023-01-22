<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Event\GAEvent;

class AbstractGoogleAnalyticsReport implements GoogleAnalyticsReportInterface
{
    /** @var GAEvent[] */
    private array $events;

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
}
