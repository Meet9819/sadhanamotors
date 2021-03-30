<?php

namespace BlueDart\Services\Pincode;

require_once __DIR__ . DIRECTORY_SEPARATOR . "../commons/config.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "../commons/soap_singleton.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "../commons/user_profile.php";

use BlueDart\Commons\BlueDartSOAP\SOAPSingleton;
use BlueDart\Commons\Config\ConfigHandler;
use BlueDart\Commons\UserProfile\UserProfile;

class Pincode
{
    public static function check_pin_serviceable($pincode)
    {
        try {
            // get configs
            $config = new ConfigHandler();
            $pincode_config = $config->config["Pincode"];

            // get profile
            $profile = new UserProfile();

            // setup request params
            $request_params = array(
                "pinCode" => $pincode,
                "profile" => $profile->user_profile,
            );

            // setup service
            $service_url = $pincode_config["URL"];

            $headers = array(
                "Action" => "http://tempuri.org/IServiceFinderQuery/GetServicesforPincode",
            );
            $service = new SOAPSingleton($service_url, $headers);
            $soap_client = $service->soap_client;

            $response = $soap_client->__soapCall("GetServicesforPincode", array($request_params));

            $response = get_object_vars($response->GetServicesforPincodeResult);

            // var_dump($response);
            return $response;

            // capture error, if any
            $error = isset($response["IsError"]) and $response["IsError"] == true ? $response["IsError"] : false;

            if (!$error) {
                return true;
            } else {
                return false;
            }
        } catch (\SoapFault $f) {
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
}
