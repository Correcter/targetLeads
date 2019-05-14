<?php

namespace Target\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LeadInfo.
 *
 * @ORM\Entity(repositoryClass="Target\Repository\LeadStatusesRepository")
 * @ORM\Table(name="tm_leads_statuses")
 */
class ResponseStatuses
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="lead_id", type="integer")
     */
    private $leadId;

    /**
     * @var string
     *
     * @ORM\Column(name="status_code", type="string")
     */
    private $statusCode;

    /**
     * @var string
     *
     * @ORM\Column(name="status_text", type="string", nullable=true)
     */
    private $statusText;

    /**
     * @var string
     *
     * @ORM\Column(name="status_date", type="string", nullable=true)
     */
    private $statusDate;

    /**
     * ResponseStatuses constructor.
     */
    public function __construct()
    {
        $this->statusDate = date('Y-m-d H:i:s');
    }

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param null|int $id
     *
     * @return ResponseStatuses
     */
    public function setId(int $id = null): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return null|int
     */
    public function getLeadId(): ?int
    {
        return $this->leadId;
    }

    /**
     * @param null|int $leadId
     *
     * @return ResponseStatuses
     */
    public function setLeadId(int $leadId = null): self
    {
        $this->leadId = $leadId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getStatusCode(): ?string
    {
        return $this->statusCode;
    }

    /**
     * @param null|string $statusCode
     *
     * @return ResponseStatuses
     */
    public function setStatusCode(string $statusCode = null): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getStatusText(): ?string
    {
        return $this->statusText;
    }

    /**
     * @param null|string $statusText
     *
     * @return ResponseStatuses
     */
    public function setStatusText(string $statusText = null): self
    {
        $this->statusText = $statusText;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getStatusDate(): ?string
    {
        return $this->statusDate;
    }

    /**
     * @param null|string $statusDate
     *
     * @return ResponseStatuses
     */
    public function setStatusDate(string $statusDate = null): self
    {
        $this->statusDate = $statusDate;

        return $this;
    }
}
