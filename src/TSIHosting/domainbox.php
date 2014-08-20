<?

/**
 * The main class for accessing the XenServer XMLRPC API
 * 
 * @author Tim Igoe <tim@tsihosting.co.uk>
 */
 
 namespace TSIHosting;
 
 if (!extension_loaded('soap'))
  throw new \Exception('DomainBox needs the SOAP PHP extension.');
 
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
     
     $uri = $sandbox ? "https://sandbox.domainbox.net/?WSDL" : "https://live.domainbox.net/?WSDL";
     
     $this->client = new \SoapClient($uri, array('soap_version' => SOAP_1_2));
   }
   
   private function doCall($func, $params)
   {
     $auth = array('AuthenicationParameters' => array('Reseller' => $this->reseller, 'Username' => $this->user, 'Password' => $this->pass));
     
     $command = array('CommandParameters' => $params);
     
     $request = array_merge($auth, $command);

     $result = $this->client->$func($request);
     
     return $results;
   }
   
   function __call($func, $params)
   {
     $this->doCall($func, $params[0]);
   }
 }