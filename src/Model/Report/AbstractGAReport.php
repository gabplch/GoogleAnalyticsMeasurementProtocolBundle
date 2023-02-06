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
