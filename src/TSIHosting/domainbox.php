<?

/**
 * The main class for accessing the XenServer XMLRPC API
 * 
 * @author Tim Igoe <tim@tsihosting.co.uk>
 */
 
 namespace TSIHosting;
 
 if (!function_exists('SoapClient'))
  throw new Exception('DomainBox needs the SOAP PHP extension.');
 
 class Domainbox
 {
   private $reseller;
   private $user;
   private $pass; 
   private $client;
  
   function __construct($reseller, $username, $password, $sandbox = true)
   {
     $this->reseller = $reseller;
     $this->user = $username;
     $this->pass = $password;
     
     if ($sandbox)
       $url = ''
   }
 }