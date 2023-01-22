<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\Gtag;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\AbstractGAReport;

class GAGtagReport extends AbstractGAReport implements GAGtagReportInterface
{
    private string $clientId;

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function setClientId(string $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }
}
