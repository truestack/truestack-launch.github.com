<?php
/**
 * Post.php 
 *
 * Sends the data from the Launch module
 *
 * @package WordPress
 * @subpackage Launch Effect
 * 
 */

// INCLUDE WORDPRESS STUFF
include_once('../../../wp-load.php');
include_once('../../../wp-includes/wp-db.php');

require_once('inc/MCAPI.class.php');
// grab an API Key from http://admin.mailchimp.com/account/api/
$chimpkey = get_option('lefx_mcapikey');
$cmkey = get_option('lefx_cmapikey');
$cmclient = get_option('lefx_cmclientid');
$cmlist = get_option('lefx_cmlistid');

$api = new MCAPI($chimpkey);

$aweberConsumerKey = get_option('lefx_aweberconsumerkey');
$aweberConsumerSecret = get_option('lefx_aweberconsumersecret');


// grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
// Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
$list_id = get_option('lefx_mclistid');

if(get_option('lefx_mcdouble') == true) {
	$opt_in = false;
} else {
	$opt_in = true;
}

session_start();

$referralpost = $_SESSION['referredBy'];

// POST FORM WITH AJAX
$email_check = '';
$reuser = '';
$clicks = '';
$conversions = '';
$returncode = null;
$return_arr = array();
$required = array();
$pass_thru_error = '';

if(isset($_POST['email'])){ 


if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

	$email_check = 'valid';
	
	$postEmail = $_POST['email'];
	$count = countCheck($stats_table, 'email', $postEmail);

	if ($count > 0) {
		
		$reuser = 'true';
		
		$stats = getDetail($stats_table, 'email', $_POST['email']);
		
		foreach ($stats as $stat) {
			$clicks = $stat->visits;
			$conversions = $stat->conversions;
			$returncode = $stat->code;
		}
		
	} else {
		$reuser = 'false';
		$premium = null;
		$aweber_custom_fields = array();
		$chimp_custom_field = array();
		$aweber_name = '';
		$cm_custom_field_values = array();
		$cm_le_fields = array();
		$cm_name = '';
		$mc_firstname = '';
		$mc_lastname = '';
		// Custom Fields		
		if(lefx_version() == 'premium')
		{
			$premium = array();
			$premium['fields'] = array();
			$premium['values'] = array();
			$postfields = array();
	
			for($i=1; $i<=10; $i++)
			{
			
						
				if(isset($_POST["field$i"]))
				{
					
					$option = trim(preg_replace('/[^a-zA-Z 0-9]+/', '', get_option("lefx_cust_field{$i}")));
					$fieldname =  "LE " . $option;
					
					if(is_array($_POST["field$i"]))
					{
						
						$postfields["field$i"] = implode(',', $_POST["field$i"]);
					}
					else
						$postfields["field$i"] = $_POST["field$i"];
					
					if(get_option("lefx_cust_field{$i}_required") == "on" && (!$postfields["field$i"] || trim($postfields["field$i"]) == ''))
					array_push($required, "lefx_cust_field{$i}");
				
					array_push($premium['fields'], "custom_field$i");
					array_push($premium['values'], $postfields["field$i"]);
					
					
					// Mail Chimp
					if(strtolower(trim($option)) != 'first name' && strtolower(trim($option)) != 'last name')
					{
						$chimp_custom_fields["LEFIELD{$i}"] = array('name' => $fieldname, 'value' => $postfields["field$i"]);
					}
					else if(strtolower(trim($option)) == 'first name')
						$mc_firstname = $postfields["field$i"];
					else if(strtolower(trim($option)) == 'last name')
						$mc_lastname = $postfields["field$i"];
					
					
					// AWeber	
					if(strtolower(trim($option)) != 'name')
					{
						if($postfields["field$i"] != '')
						{
							$aweber_custom_fields["LE " . str_replace(' ','_', $option)] = substr($postfields["field$i"],0,100);
						}
						
					}
					else
						$aweber_name = substr($postfields["field$i"],0,100);
					
					//Campaign Monitor
					if(strtolower(trim($option)) != 'name')
					{
						$cm_le_fields[$fieldname] = $postfields["field$i"];
						array_push($cm_custom_field_values, array('Key' => $fieldname, 'Value' => $postfields["field$i"]));
					}
					else if(strtolower(trim($option)) == 'name')
					{
						// use aweber name, or else combine mailchimp first and last, else empty	
						$cm_name = $aweber_name;
					}
					
				}
				else
				{
					if(get_option("lefx_cust_field{$i}") != '' && get_option("lefx_cust_field{$i}_required") == "on")
						array_push($required, "lefx_cust_field{$i}");
				}
			}
			
			// Use firstname & lastname if available
			if(($mc_firstname || $mc_lastname) && $aweber_name == '')
			{
				$aweber_name = $cm_name = trim($mc_firstname . ' ' . $mc_lastname);
				
			}
		}
			
		// set field names
		$le_fields = array('LE Referral Code', 'LE Visits', 'LE Signups');
	    $aweber_le_fields = array_merge($le_fields, array_keys($aweber_custom_fields));
	    $cm_le_fields = array_merge($le_fields, array_keys($cm_le_fields));
		
		
		if(!count($required))
		{
			postData($stats_table, $referralpost, $premium);
			
				// MailChimp integration
				if($chimpkey) {
				
					$chimpvars = $api->listMergeVars(get_option('lefx_mclistid'));
					//-----------
					$tags = array();
					$names = array();
					foreach($chimpvars as $var)
					{
						array_push($tags, $var['tag']);
						array_push($names ,$var['name']);
					}
					//-----------
					$chimpvars = array_flatten($chimpvars);
					$mergeVars = array('FNAME' => $mc_firstname, 'LNAME' => $mc_lastname);
					
					if($chimp_custom_fields) {
						foreach($chimp_custom_fields as $fieldtag => $field)
						{
							$pos = array_search($fieldtag, $tags);
							
							if ($pos === false) {
								
								$api->listMergeVarAdd($list_id, $fieldtag, $field['name'], array('public' => false));
							}
							else if($names[$pos] != $field['name'])
							{
								$api->listMergeVarUpdate($list_id, $fieldtag, array('name' => $field['name']));
							}
							
							$mergeVars[$fieldtag] = $field['value'];
						}
					}
					
					$api->listSubscribe($list_id, $_POST['email'],$mergeVars,'html',$opt_in );	
				}
				
				//Campaign Monitor Integration
				if($cmkey != '' && $cmclient != '' && $cmlist != '') // if client is undefined, ignore list value
				{
					$list = new CS_REST_Lists($cmlist, $cmkey);
					$subscribers = new CS_REST_Subscribers($cmlist, $cmkey);
					
					$cust_fields = $list->get_custom_fields();
					$existing_fields = $cust_fields->response;
		
					if($cm_le_fields)
					{	
						foreach($existing_fields as $field)
						{	
							$pos = array_search($field->FieldName, $cm_le_fields);
							if($pos !== false)
							{
								unset($cm_le_fields[$pos]);
							}
						}
						foreach($cm_le_fields as $name)
						{
							$result = $list->create_custom_field(array(
							    'FieldName' => $name,
							    'DataType' => CS_REST_CUSTOM_FIELD_TYPE_TEXT
							));
						}
					}
							
					array_push($cm_custom_field_values, array('Key' => "LE Referral Code", 'Value' => $_POST['code']));
					array_push($cm_custom_field_values, array('Key' => "LE Visits", 'Value' => '0'));
					array_push($cm_custom_field_values, array('Key' => "LE Signups", 'Value' => '0'));
					
					$result = $subscribers->add(
						array(
						    'EmailAddress' => $_POST['email'],
						    'Name' => $cm_name,
						    'CustomFields' => $cm_custom_field_values,
						    'Resubscribe' => true
						)
					);
		//			print_r($result);
		//			echo 'users added';
				}
				
				// AWeber integration
				if($aweberConsumerKey != '' && $aweberConsumerSecret != '')
				{
					$aweberAccessKey = get_option('lefx_aweberaccesskey');
					$aweberAccessSecret = get_option('lefx_aweberaccesssecret');
					$aweberListId  = get_option('lefx_aweberlistid');
					$aweberAccountId = get_option('lefx_aweberaccountid');
					
					$aweber = new AWeberAPI($aweberConsumerKey, $aweberConsumerSecret);
					
					
					try {
					
						
					    $account = $aweber->getAccount($aweberAccessKey, $aweberAccessSecret);
					    $listURL = "/accounts/{$aweberAccountId}/lists/{$aweberListId}";
					    $list = $account->loadFromUrl($listURL);
		
					    # create a subscriber
					    $params = array(
					        'email' => $_POST['email'],
					        'ip_address' => $_SERVER['REMOTE_ADDR'],
					        'ad_tracking' => 'launch_effect',
					        'last_followup_message_number_sent' => 0,
					        'misc_notes' => 'launch effect subscription',
					        'name' => $aweber_name,
					        
					    );
					    
					    //add custom fields
						$aweber_fields = $list->custom_fields;
						$existing_field_names = array();
						foreach($aweber_fields as $field)
						{
							array_push($existing_field_names, $field->name);
						}
						foreach($aweber_le_fields as $fieldname)
						{
							// Aweber will not allow additional name fields
							if(!in_array($fieldname, $existing_field_names))
					    		$aweber_fields->create(array('name' => $fieldname));
					    }
					    
					    
					    
					    if(count($aweber_custom_fields))
						{
							$params['custom_fields'] = $aweber_custom_fields;
						}
						$params['custom_fields']['LE Referral Code'] = $_POST['code'];
						$params['custom_fields']['LE Visits'] = "0";
						$params['custom_fields']['LE Signups'] = "0";
					    $subscribers = $list->subscribers;			    
					    $new_subscriber = $subscribers->create($params);
		
					    # success!
					
					} catch(AWeberAPIException $exc) {
					    
					    
					    if(trim($exc->message) == "email: Subscriber already subscribed.")
					    {
							// do nothing
					    }
					    else if(trim($exc->message)  == "email: Email address blocked. Please refer to http://www.aweber.com/faq/questions/518/.")
					    {
					    	$pass_thru_error = 'blocked';
					    }
					    else
					    {
							print "<h3>AWeberAPIException:</h3>";
					    	print " <li> Type: $exc->type              <br>";
					    	print " <li> Msg : $exc->message           <br>";
					    	print " <li> Docs: $exc->documentation_url <br>";
					    	print "<hr>";
					    	exit(1);
					    }
						
					}
				}
			}
		}				
	} else {
	
	    $email_check = 'invalid';
	
	}
		$return_arr["email_check"] = $email_check;
		$return_arr["required"] = $required;
		$return_arr["pass_thru_error"] = $pass_thru_error;
		$return_arr["reuser"] = $reuser;
		$return_arr["clicks"] = $clicks;
		$return_arr["conversions"] = $conversions;
		$return_arr["returncode"] = $returncode;
		$return_arr["email"] = $_POST['email'];
		$return_arr["code"] = $_POST['code'];
	
	} else if(!isset($_POST)){ 
	
		echo "hmmm..."; 
	
	}  
	
	echo json_encode($return_arr);
	

?>