<?php

// Enter your 'Application ID' from your application on labs.aweber.com
$appID = "8b07f885";

// Redirect your user to the distributed app authorization URL
$authorizationURL = "https://auth.aweber.com/1.0/oauth/authorize_app/$appID";
header("Location: $authorizationURL");
exit();