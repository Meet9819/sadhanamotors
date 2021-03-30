<?php
namespace BlueDart\Commons\UserProfile;

require_once __DIR__. DIRECTORY_SEPARATOR . "./config.php";

use BlueDart\Commons\Config\ConfigHandler;

class UserProfile
{
    public $user_profile;

    public function __construct()
    {
        $config = new ConfigHandler();
        $profile = $config->config["BluedartCredentials"];

        $this->user_profile = array(
            "LoginID" => $profile["LoginID"],
            "LicenceKey" => $profile["LicenseKey"],
            "Api_type" => $profile["Api_type"],
            "Version" => $profile["Version"],
        );
    }
}
