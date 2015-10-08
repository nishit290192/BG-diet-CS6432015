<html><body>
 <h1> Blood Message </h1>
 <?php
    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * - Save it as sendnotifications.php and at the command line, run
     *        php sendnotifications.php
     *
     * - Upload it to a web host and load mywebhost.com/sendnotifications.php
     *   in a web browser.
     * - Download a local server like WAMP, MAMP or XAMPP. Point the web root
     *   directory to the folder containing this file, and load
     *   localhost:8888/sendnotifications.php in a web browser.
     */

    // Step 1: Download the Twilio-PHP library from twilio.com/docs/libraries,
    // and move it into the folder containing this file.
    require "Services/Twilio.php";

    // Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
    $AccountSid = "AC8a85b97f9ef6b09e2901b22d8a7fc997";
    $AuthToken = "2b932114990d3d43860f5a1aedd43aa2";

    // Step 3: instantiate a new Twilio Rest Client
    $client = new Services_Twilio($AccountSid, $AuthToken);

    // Step 4: make an array of people we know, to send them a message.
    // Feel free to change/add your own phone number and name here.
    $people = array("+15512259993" => "Shah Nishit","+16077448736" => "Shraddha Thakker", "+14782622141" => "Jecky Patel", "+19142991173",



    );
  //  global $ans;
     // Step 5: Loop over all our friends. $number is a phone number above, and
    // $name is the name next to it

  //  $people = array("+15512259993" => "Nishit Shah",);
 global $name,$ans, $response;
	// if the sender is known, then greet them by name
	// otherwise, consider them j		ust another monkey
          $body = $_REQUEST['Body'];
/* Remove formatting from $body until it is just lowercase characters without punctuation or spaces. */
$result = preg_replace("/[^A-Za-z0-9]/u", "", $body);
$result = trim($result);
$result = strtolower($result);
$response="Please try again";
$ans ='Try again...';
/* ##Router## */


switch ($result) {
    case 'blooda':
       $ans= bloodA();
        break;
    case 'bloodb':
        $ans=bloodB();
        break;
    case 'bloodab':

        $ans=bloodAB();
		break;
    case 'bloodo':
        $ans=bloodO();
        break;

    /* Add new routing logic above this line. */
    default:
      $ans=  index();
}
 //<?php
// TODO: People want tracking on keywords.
/**
 * Include twilio-php, the offical Twilio PHP Helper Library, which can be found at
 * http://www.twilio.com/docs/libraries
 */
//include('Services/Twilio.php');
/* ## Controller ## */

function index(){
	//$response = new Services_Twilio_Twiml();
	$response = "I'm sorry, the blood group you have enter is wrong.  Please try again.
	return $response;
}
function bloodA(){
	//$response = new Services_Twilio_Twiml();
	$response = "A meat-free diet based on Fruits and vegetables,beans and legumes, and whole grains -- ideally, organic and fresh,
   People with type A blood have a sensitive immune system.";
	return $response;
}
function bloodB(){
	//$response = new Services_Twilio_Twiml();
	$response = "Avoid corn, wheat, buckwheat, lentils, tomatoes, peanuts, and sesame seeds.
   Chicken is also problematic,green vegetables, eggs, certain meats, and low-fat dairy.";
	return $response;
}
function bloodAB(){
	//$response = new Services_Twilio_Twiml();
	$response = "Foods to focus on include tofu, seafood, dairy, and green vegetables.
   People with type AB blood tend to have low stomach acid. Avoid caffeine, alcohol, and smoked or cured meats.";
	return $response;
}
function bloodO(){
	//$response = new Services_Twilio_Twiml();
	$response = "A high-protein diet heavy on lean meat, poultry, fish, and vegetables, and light on grains, beans, and dairy.
  ";
	return $response;
	}

    foreach ($people as $number => $name) {

        $sms = $client->account->messages->sendMessage(

        // Step 6: Change the 'From' number below to be a valid Twilio number
        // that you've purchased, or the (deprecated) Sandbox number
            "+13853557227",
            // the number we are sending to - Any phone number
            $number,

            // the sms body
          //  "Hello from CS6432015 from Nishit Shah!"
        $ans

        );

        // Display a confirmation message on the screen
        echo "Enter BloodGroup...";
    }

    // now greet the sender
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	print ('<?xml version="1.0" encoding="UTF-8" ?> <Response> <Message>' . $ans . '</Message> </Response>');



    ?>
    </body></html>
