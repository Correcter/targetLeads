<?php

namespace Target\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * LeadInfo.
 *
 * @ORM\Entity(repositoryClass="Target\Repository\LeadInfoRepository")
 * @ORM\Table(name="tm_leads")
 */
class LeadInfo
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
     * @ORM\Column(name="status_id", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var int
     *
     * @ORM\Column(name="lead_id", type="integer", nullable=false)
     */
    private $leadId;

    /**
     * @var int
     *
     * @ORM\Column(name="banner_id", type="integer", nullable=false)
     */
    private $bannerId;

    /**
     * @var int
     *
     * @ORM\Column(name="form_id", type="integer", nullable=false)
     */
    private $formId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_phone", type="string", nullable=true)
     */
    private $userPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="user_fullname", type="string", nullable=true)
     */
    private $userFullName;

    /**
     * @var int
     *
     * @ORM\Column(name="campaign_id", type="integer", nullable=false)
     */
    private $campaignId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_sex", type="string", nullable=true)
     */
    private $userSex;

    /**
     * @var string
     *
     * @ORM\Column(name="user_geo", type="string", nullable=true)
     */
    private $userGeo;

    /**
     * @var string
     *
     * @ORM\Column(name="user_questions", type="string", nullable=true)
     */
    private $userQuestions;

    /**
     * @var string
     *
     * @ORM\Column(name="created_time", type="string", nullable=true)
     */
    private $createdTime;

    /**
     * @var string
     *
     * @ORM\Column(name="form_name", type="string", nullable=true)
     */
    private $formName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_birthday", type="string", nullable=true)
     */
    private $userBirthday;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", nullable=true)
     */
    private $userEmail;

    /**
     * @param int $status
     *
     * @return LeadInfo
     */
    public function setStatus(int $status = null): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getLeadId(): ?int
    {
        return $this->leadId;
    }

    /**
     * @param int|null $leadId
     * @return LeadInfo
     */
    public function setLeadId(int $leadId = null): self
    {
        $this->leadId = $leadId;

        return $this;
    }

    /**
     * @return int
     */
    public function getBannerId(): ?int
    {
        return $this->bannerId;
    }

    /**
     * @param int|null $bannerId
     * @return LeadInfo
     */
    public function setBannerId(int $bannerId = null): self
    {
        $this->bannerId = $bannerId;

        return $this;
    }

    /**
     * @return null|int
     */
    public function getFormId(): ?int
    {
        return $this->formId;
    }

    /**
     * @param int|null $formId
     * @return LeadInfo
     */
    public function setFormId(int $formId = null): self
    {
        $this->formId = $formId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserPhone(): ?string
    {
        return $this->userPhone;
    }

    /**
     * @param string|null $userPhone
     * @return LeadInfo
     */
    public function setUserPhone(string $userPhone = null): self
    {
        $this->userPhone = $userPhone;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserFullName(): ?string
    {
        return $this->userFullName;
    }

    /**
     * @param string|null $userFullName
     * @return LeadInfo
     */
    public function setUserFullName(string $userFullName = null): self
    {
        $this->userFullName = $userFullName;

        return $this;
    }

    /**
     * @return null|int
     */
    public function getCampaignId(): ?int
    {
        return $this->campaignId;
    }

    /**
     * @param int|null $campaignId
     * @return LeadInfo
     */
    public function setCampaignId(int $campaignId = null): self
    {
        $this->campaignId = $campaignId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserSex(): ?string
    {
        return $this->userSex;
    }

    /**
     * @param string|null $userSex
     * @return LeadInfo
     */
    public function setUserSex(string $userSex = null): self
    {
        $this->userSex = $userSex;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserGeo(): ?string
    {
        return $this->userGeo;
    }

    /**
     * @param string|null $userGeo
     * @return LeadInfo
     */
    public function setUserGeo(string $userGeo = null): self
    {
        $this->userGeo = $userGeo;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserQuestions(): ?string
    {
        return $this->userQuestions;
    }

    /**
     * @param string|null $userQuestions
     * @return LeadInfo
     */
    public function setUserQuestions(string $userQuestions = null): self
    {
        $this->userQuestions = $userQuestions;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCreatedTime(): ?string
    {
        return $this->createdTime;
    }

    /**
     * @param null|string $createdTime
     * @return LeadInfo
     */
    public function setCreatedTime(string $createdTime): self
    {
        $this->createdTime = $createdTime;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFormName(): ?string
    {
        return $this->formName;
    }

    /**
     * @param string|null $formName
     * @return LeadInfo
     */
    public function setFormName(string $formName = null): self
    {
        $this->formName = $formName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserBirthday(): ?string
    {
        return $this->userBirthday;
    }

    /**
     * @param string|null $userBirthday
     * @return LeadInfo
     */
    public function setUserBirthday(string $userBirthday = null): self
    {
        $this->userBirthday = $userBirthday;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    /**
     * @param string|null $userEmail
     * @return LeadInfo
     */
    public function setUserEmail(string $userEmail = null): self
    {
        $this->userEmail = $userEmail;

        return $this;
    }
}