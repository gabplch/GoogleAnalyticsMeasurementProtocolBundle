<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\Firebase;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\AbstractGAReport;

class GAFirebaseReport extends AbstractGAReport implements GAFirebaseReportInterface
{
    private string $appInstanceId;

    public function getClientId(): ?string
    {
        return $this->appInstanceId;
    }

    public function setClientId(string $appInstanceId): self
    {
        $this->appInstanceId = $appInstanceId;

        return $this;
    }
}
