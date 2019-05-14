<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config/config.php';

use Target\Request\LeadRequest;
use Target\Request\ProxyRequestBuilder;

$credentials = [
    'some_client1@client',
    'some_client2@client',
    'some_client3@client',
    'some_client4@client',
];

foreach ($credentials as $cred) {
    $formIndex = 0;
    $request = new ProxyRequestBuilder([
        'api' => 'api/v2/',
        'base_path' => 'https://target-proxy.icontext.ru/',
        'agency_name' => 'login@target-mail',
        'client_name' => $cred,
        'proxy_token' => 'secret_token',
    ]);

    $request->auth();

    $leadRequest = new LeadRequest($request);

    // Запрашиваем все формы по каждому из логинов
    do {
        $leadForms = $leadRequest->leadForm([
            'limit' => 50,
            'offset' => ($formIndex * 50),
        ])->getBody()->getContents();

        ++$formIndex;

        $leadForms = \GuzzleHttp\json_decode($leadForms, true);

        $leadFormCounts = count($leadForms['items'] ?? []);
        $leadForms = $leadForms['items'] ?? [];

        foreach ($leadForms as $form) {
            $leadFormModel = new \Target\Model\LeadForm($form);
            $leadIndex = 0;

            // Запрашиваем все лиды одной из форм, пока они не кончатся
            do {
                $leadInfoResponse = $leadRequest->leadInfo([
                    'form_id' => $leadFormModel->getFormId(),
                    'limit' => 50,
                    'offset' => ($leadIndex * 50),
                ])->getBody()->getContents();

                ++$leadIndex;

                $leadInfo = \GuzzleHttp\json_decode($leadInfoResponse, true);

                $leadInfoCount = count($leadInfo['items'] ?? []);
                $leadInfoItems = $leadInfo['items'] ?? [];
                unset($leadInfo);

                if (0 === $leadInfoCount) {
                    file_put_contents(
                        'logs/form_'.$leadFormModel->getFormId().'.log',
                        sprintf(
                            'Для формы %1$s лиды закончились на странице %2$s %3$s',
                            $leadFormModel->getFormId(),
                            $leadIndex,
                            PHP_EOL
                        ),
                        FILE_APPEND
                    );

                    break;
                }

                $leadsData = $entityManager
                    ->getRepository(\Target\Entity\LeadInfo::class)
                    ->getLeadIdsByFormId($leadFormModel->getFormId());

                foreach ($leadInfoItems as $info) {
                    $leadInfoModel = new \Target\Model\LeadInfo($info);

                    if (isset($leadsData[$leadInfoModel->getId()])) {
                        continue;
                    }
                    $leadModel = new \Target\Entity\LeadInfo();
                    $leadModel
                        ->setStatus(0)
                        ->setLeadId($leadInfoModel->getId())
                        ->setFormId($leadInfoModel->getFormId())
                        ->setFormName($leadInfoModel->getFormName())
                        ->setCreatedTime($leadInfoModel->getCreatedTime())
                        ->setUserPhone($leadInfoModel->getUserPhone())
                        ->setUserFullname($leadInfoModel->getUserFullname())
                        ->setUserBirthday($leadInfoModel->getUserBirthday())
                        ->setUserEmail($leadInfoModel->getUserEmail())
                        ->setUserSex($leadInfoModel->getUserSex())
                        ->setUserGeo($leadInfoModel->getUserGeo())
                        ->setUserQuestions($leadInfoModel->getUserQuestions())
                        ->setCampaignId($leadInfoModel->getCampaignId())
                        ->setBannerId($leadInfoModel->getBannerId());
                    $entityManager->persist($leadModel);
                }
                $entityManager->flush();
            } while ($leadInfoCount);
        }
    } while ($leadFormCounts);
}
