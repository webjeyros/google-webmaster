<?php

require_once __DIR__.'/../vendor/autoload.php';

use webjeyros\siteApi\googleVerify;
use webjeyros\siteApi\googleWebmaster;

$token='';

$client = new \Google_Client();
$client->setAuthConfig(__DIR__.'/config.json');
$client->setScopes([\Google_Service_Webmasters::WEBMASTERS,
                    \Google_Service_SiteVerification::SITEVERIFICATION_VERIFY_ONLY]);
$client->setAccessType('offline');
$client->setApprovalPrompt('auto');
$client->setAccessToken($token);

$webRoot=__DIR__.'/';

$webmaster=new googleWebmaster($client);

$verifier=new googleVerify($client);

try{

    $site='example.com';

    //get verification token file
    $token=$verifier->getToken($site,$verifier::FILE);

    //put file to webroot
    touch($webRoot.$token);

    //verify
    $verifier->verify($site,$verifier::FILE);

    //add site to webmaster console
    $webmaster->addSite($site);

}catch (\Exception $e){

    echo $e->getMessage();

}
