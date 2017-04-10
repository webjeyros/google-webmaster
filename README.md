# googleWebmaster
Simple wrapper for google Webmasters and SiteVerification API

## Instalation
   ```
   composer require webjeyros/google-webmaster
   ```
## Example usage:

```php
require_once __DIR__.'/../vendor/autoload.php';

use webjeyros\siteApi\googleVerify;
use webjeyros\siteApi\googleWebmaster;


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
```
