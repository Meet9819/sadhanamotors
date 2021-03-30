<?php

namespace BlueDart\Commons\BlueDartSOAP;

class SOAPSingleton
{
    public $soap_client;

    public function __construct(&$service_url, &$headers = null)
    {
        // setup client
        $this->soap_client = new \SoapClient($service_url, array('soap_version' => SOAP_1_2));


        // add headers, if present
        if (!is_null($headers)) {
            foreach ($headers as $key => $val) {
                $this->soap_client->__setSoapHeaders(new \SoapHeader("http://www.w3.org/2005/08/addressing", $key, $val, true));
            }
        }
    }
}
