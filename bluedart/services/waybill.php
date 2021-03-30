<?php

namespace BlueDart\Services\Waybill;

require_once __DIR__. DIRECTORY_SEPARATOR . "../commons/config.php";
require_once __DIR__. DIRECTORY_SEPARATOR . "../commons/soap_singleton.php";
require_once __DIR__. DIRECTORY_SEPARATOR . "../commons/user_profile.php";

use BlueDart\Commons\BlueDartSOAP\SOAPSingleton;
use BlueDart\Commons\Config\ConfigHandler;
use BlueDart\Commons\UserProfile\UserProfile;

class Waybill
{
    public static function generate_waybill(&$cust_details)
    {
        try {
            $dt = new \DateTime();
            $dt->setTimezone(new \DateTimeZone("Asia/Kolkata"));
            $dt->modify('+1 day');

            // get configs
            $config = new ConfigHandler();
            $waybill_config = $config->config["Waybill"];
            $shipper_data = $config->config["SadhanaMotorsDetails"];

            // get profile
            $profile = new UserProfile();

            $Shipper = array(
                "CustomerAddress1" => substr($shipper_data["CustomerAddress1"], 0, 30),
                "CustomerAddress2" => substr($shipper_data["CustomerAddress2"], 0, 30),
                "CustomerAddress3" => substr($shipper_data["CustomerAddress3"], 0, 30),
                "CustomerCode" => $shipper_data["CustomerCode"],
                "CustomerEmailID" => substr($shipper_data["EmailID"], 0, 30),
                "CustomerMobile" => $shipper_data["MobileTelNo"],
                "CustomerName" => substr($shipper_data["CustomerName"], 0, 30),
                "CustomerPincode" => $shipper_data["CustomerPincode"],
                "CustomerTelephone" => $shipper_data["CustomerTelephoneNumber"],
                "isToPayCustomer" => false,
                "OriginArea" => $shipper_data["AreaCode"],
                "Sender" => substr($shipper_data["CustomerName"], 0, 14),
                "CustomerGSTNumber" => $shipper_data["CustomerGSTNumber"],
            );


            $Consignee = array(
                "ConsigneeAddress1" => substr($cust_details["address1"], 0, 30),
                "ConsigneeAddress2" => substr($cust_details["address2"], 0, 30),
                "ConsigneeAddress3" => substr($cust_details["address3"], 0, 30),
                "ConsigneeAttention" => substr($cust_details["name"], 0, 30),
                "ConsigneeMobile" => $cust_details["mobile"],
                "ConsigneeName" => substr($cust_details["name"], 0, 30),
                "ConsigneePincode" => $cust_details["pin"],
                "ConsigneeEmailID" => $cust_details["email"],
            );

            $Services = array(
                "ActualWeight" => 0.01,
                "CollectableAmount" => 0,
                "Commodity" =>
                    array (
                        "CommodityDetail1" => "motor accessories and parts",
                        "CommodityDetail2" => "",                       
                        "CommodityDetail3" => ""
                ),
                "CreditReferenceNo" => $cust_details["invoiceNumber"],
                "DeclaredValue" => $cust_details["totalAmount"],
                "Dimensions" => array(
                    "Dimension" => array(
                        "Breadth" => 0.01,
                        "Count" => 1,
                        "Height" => 0.01,
                        "Length" => 0.01,
                    ),
                ),
                "InvoiceNo" =>  $cust_details["invoiceNumber"],
                "IsReversePickup" => false,
                "PackType" => "L",
                "PickupDate" => $dt->format("Y-m-d"),
                "PickupTime" => "1200",
                "PieceCount" => 1,
                "ProductCode" => $shipper_data["ProductCode"],
                "ProductType" => "Dutiables",
                "SpecialInstruction" => "Any issues please contact on 02225035588",                
                "SubProductCode" => "P",
                "RegisterPickup" => true,
                "Officecutofftime" => $shipper_data["OfficeCloseTime"],
                "PDFOutputNotRequired" => true,
            );

            $ReturnAddress = array(
                "ReturnAddress1" => substr($shipper_data["CustomerAddress1"], 0, 30),
                "ReturnAddress2" => substr($shipper_data["CustomerAddress2"], 0, 30),
                "ReturnAddress3" => substr($shipper_data["CustomerAddress3"], 0, 30),
                "ReturnPincode" => $shipper_data["CustomerPincode"],
                "ReturnTelephone" => $shipper_data["CustomerTelephoneNumber"],
                "ReturnMobile" => $shipper_data["MobileTelNo"],
                "ReturnEmailID" => $shipper_data["EmailID"],
                "ReturnContact" => substr($shipper_data["CustomerName"], 0, 30),
            );

            $waybill_generation_request = array(
                "Shipper" => $Shipper,
                "Consignee" => $Consignee,
                "Services" => $Services,
                "ReturnAddress" => $ReturnAddress,
            );


            // setup request params
            $request_params = array(
                "Request" => $waybill_generation_request,
                "Profile" => $profile->user_profile,
            );
            
            // setup service
            $service_url = $waybill_config["URL"];

            $headers = array(
                "Action" => "http://tempuri.org/IWayBillGeneration/GenerateWayBill",
            );
            $service = new SOAPSingleton($service_url, $headers);
            $soap_client = $service->soap_client;

            $response = $soap_client->__soapCall("GenerateWayBill", array($request_params));

            $response = get_object_vars($response->GenerateWayBillResult);
            
           // capture error, if any
            $error = isset($response["IsError"]) ? $response["IsError"] : false;
            $errorInPU = isset($response["IsErrorInPU"]) ? $response["IsErrorInPU"] : false;
            
            if (!$error) {
                return array(
                    "status" => true,
                    "token" => $response["TokenNumber"],
                    "awbno" => $response["AWBNo"],
                    "creditreference" => $response["CCRCRDREF"],
                    "pickupdate" => $response["ShipmentPickupDate"],
                    "destArea" => $response["DestinationArea"],
                    "destLoc" => $response["DestinationLocation"],
                );
            } else if ($errorInPU) {
                $status = (array) $response["Status"];
                $waybill_generation_status = (array) $status["WayBillGenerationStatus"];
                
                return array(
                    "status" => false,
                    "message" => "Some error occured while initiating pickup.",
                    "error" => $waybill_generation_status["StatusCode"],
                    "errorMessage" => $waybill_generation_status["StatusInformation"],
                );
            } else {
                $status = (array) $response["Status"];
                $waybill_generation_status = (array) $status["WayBillGenerationStatus"];
                
                return array(
                    "status" => false,
                    "message" => "Some error occured while generating AWB.",
                    "error" => $waybill_generation_status["StatusCode"],
                    "errorMessage" => $waybill_generation_status["StatusInformation"],
                );
            }
        } catch (\SoapFault $f) {
            return array(
                "status" => false,
                "message" => $f->getMessage(),
            );
        } catch (\Exception $e) {
            return array(
                "status" => false,
                "message" => $e->message,
            );
        }
    }
}
