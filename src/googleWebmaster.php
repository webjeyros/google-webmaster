<?php

namespace  webjeyros\siteApi;

class googleWebmaster
{
    private $webmaster;

    public function __construct($client)
    {
        $this->webmaster=new \Google_Service_Webmasters($client);
    }

    public function listSites($optParams=[])
    {
       return $this->webmaster->sites->listSites($optParams);
    }

    public function getInfo($siteUrl,$optParams=[])
    {
        return $this->webmaster->sites->get($siteUrl,$optParams);
    }

    public function addSite($siteUrl,$optParams=[])
    {
        return $this->webmaster->sites->add($siteUrl,$optParams);
    }

    public function delSite($siteUrl,$optParams=[])
    {
        return $this->webmaster->sites->delete($siteUrl,$optParams);
    }

    public function addSitemap($siteUrl, $feedPath, $optParams=[])
    {
        return $this->webmaster->sitemaps->submit($siteUrl,$feedPath,$optParams);
    }

    public function listSitemap($siteUrl,$optParams=[])
    {
        return $this->webmaster->sitemaps->listSitemaps($siteUrl,$optParams);
    }

    public function getSitemapInfo($siteUrl, $feedPath, $optParams=[])
    {
        return $this->webmaster->sitemaps->get($siteUrl,$feedPath,$optParams);
    }

    public function delSitemap($siteUrl, $feedPath, $optParams=[])
    {
        return $this->webmaster->sitemaps->delete($siteUrl,$feedPath,$optParams);
    }

    public function searchAnalytycs($siteUrl,$postBody,$optParams=[])
    {
        return $this->webmaster->searchanalytics->query($siteUrl,$postBody,$optParams);
    }

    public function crawlErrorsCount($siteUrl,$optParams=[])
    {
        return $this->webmaster->urlcrawlerrorscounts->query($siteUrl,$optParams);
    }

    public function crawlErrorsGet($siteUrl,$url,$category,$platform,$optParams=[])
    {
        return $this->webmaster->urlcrawlerrorssamples->get($siteUrl,$url,$category,$platform,$optParams);
    }

    public function crawlErrorsList($siteUrl,$category,$optParams=[])
    {
        return $this->webmaster->urlcrawlerrorssamples->listUrlcrawlerrorssamples($siteUrl,$category,$optParams);
    }

    public function crawlErrorsFixed($siteUrl,$url,$category,$platform,$optParams=[])
    {
        return $this->webmaster->urlcrawlerrorssamples->markAsFixed($siteUrl,$url,$category,$platform,$optParams);
    }
}
