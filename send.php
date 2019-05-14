<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config/config.php';

use Target\Request\PicRequest;

do {
    $leadData = $entityManager
        ->getRepository(\Target\Entity\LeadInfo::class)
        ->getLeadByStatus(0);

    if (null === $leadData) {
        break;
    }

    $leadId = $leadData['leadId'] ?? 0;
    $picRequest = new PicRequest($leadData, 'SomePrivateKey', 'TargetMail');
    $leadRequest = $picRequest->sendLead('https://api.pik.ru/v1/lead/form');

    $responseFromPic = $leadRequest->getBody()->getContents();

    if (!$responseFromPic) {
        sleep(10);

        continue;
    }

    file_put_contents(
        'logs/lead_'.$leadData['leadId'].'.log',
        $responseFromPic.PHP_EOL,
        FILE_APPEND
    );

    $arrayFromPic = \GuzzleHttp\json_decode($responseFromPic, true);
    $picResult = new \Target\Model\PicResult($arrayFromPic);

    $responseStatuses = new \Target\Entity\ResponseStatuses();
    $responseStatuses
        ->setLeadId($leadId)
        ->setStatusCode($picResult->getResult())
        ->setStatusText($picResult->getError());

    $entityManager->persist($responseStatuses);

    dump($picResult->getResult());

    if ('OK' === $picResult->getResult() ||
        'ERR_LEAD_ALREADY_RECEIVED' === $picResult->getError()) {
        $entityManager
            ->getRepository(\Target\Entity\LeadInfo::class)
            ->updateLeadStatus(1, $leadId);
    }

    sleep(10);
} while (count($leadData));

$entityManager->flush();
