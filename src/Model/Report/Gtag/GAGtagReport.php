<?php

declare(strict_types=1);

namespace Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\Gtag;

use Gabplch\GoogleAnalyticsMeasurementProtocolBundle\Model\Report\AbstractGAReport;

use Symfony\Component\Validator\Constraints as Assert;

class GAGtagReport extends AbstractGAReport implements GAGtagReportInterface
{
    #[Assert\Sequentially(
        constraints: [
            new Assert\NotBlank(),
            new Assert\Length(min: 21, max: 21)
        ]
    )]
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
