<?php

namespace Target\Repository;

/**
 * Class LeadInfoRepository.
 */
class LeadInfoRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param null|string $formId
     *
     * @return mixed
     */
    public function getLeadIdsByFormId(string $formId = null)
    {
        $data = [];
        $result =
            $this->createQueryBuilder('li')
                ->select('li.leadId')
                ->where('li.formId = :formId')
                ->setParameter('formId', $formId)
                ->getQuery()
                ->getResult();

        foreach ($result as $item) {
            $data[$item['leadId']] = $item['leadId'];
        }

        return $data;
    }

    /**
     * @param null|int $status
     *
     * @return mixed
     */
    public function getLeadByStatus(int $status = null)
    {
        return
            $this->createQueryBuilder('li')
                ->select('li.leadId, li.formName, li.formName, li.userFullName, li.userEmail, li.userPhone')
                ->where('li.status = :status')
                ->setParameter('status', $status)
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
    }

    /**
     * @param null|int $status
     * @param null|int $leadId
     *
     * @return mixed
     */
    public function updateLeadStatus(int $status = null, int $leadId = null)
    {
        return
            $this->createQueryBuilder('li')
                ->update()
                ->set('li.status', ':status')
                ->where('li.leadId = :leadId')
                ->setParameter('status', $status)
                ->setParameter('leadId', $leadId)
                ->getQuery()
                ->getResult();
    }
}
