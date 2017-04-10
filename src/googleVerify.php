<?php

namespace  webjeyros\siteApi;

use Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequest;
use Google_Service_SiteVerification_SiteVerificationWebResourceResource;

class googleVerify
{
    const FILE = 'FILE';
    const META = 'META';
    const ANALYTICS = 'ANALYTICS';
    const TAG_MANAGER = 'TAG_MANAGER';
    const DNS_TXT = 'DNS_TXT';
    const DNS_CNAME = 'DNS_CNAME';

    protected $sites;

    public function __construct($client)
    {
         $this->sites = new \Google_Service_SiteVerification($client);
    }

    public function listSites()
    {

        return $this->sites->webResource->listWebResource()->getItems();
    }

    public function getToken($url,$method='META')
    {
        $request = new Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequest(
            array(
                'verificationMethod' => $method,
                'site' => array(
                    'type' => 'SITE',
                    'identifier' => $url
            )
        ));
        return $this->sites->webResource->getToken($request)->getToken();

    }

    public function verify($url,$method='META')
    {
        $request = new \Google_Service_SiteVerification_SiteVerificationWebResourceResource(
            array(
                'site' => array(
                    'type' => 'SITE',
                    'identifier' => $url
            )
        ));
        return $this->sites->webResource->insert($method, $request);
    }

    public function delete($id)
    {
        return $this->sites->webResource->delete($id);
    }

    public function getInfo($id)
    {
        return $this->sites->webResource->get($id);
    }

    public function update($id,$owners=[])
    {
        $request = new Google_Service_SiteVerification_SiteVerificationWebResourceResource(
            array(
                'owners'=>$owners,
                'site' => array(
                    'type' => 'SITE',
                    'identifier' => urldecode($id)
            )
        ));

        return $this->sites->webResource->update($id,$request);
    }
}


