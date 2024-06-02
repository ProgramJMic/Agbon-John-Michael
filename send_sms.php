
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $apikey = '1016be2ab0e5365a3d7226dabb95c939-37c929f9-7453-45bb-b4fa-faf8daafa483';
    $number = $_POST['number'];
    $message = $_POST['message'];

    function send_sms($apikey, $number, $message) {
        // Correct URL
        $url = "https://n8ky85.api.infobip.com/sms/1/text/single";

        // Prepare the HTTP request payload
        $payload = array(
            'from' => 'InfoSMS',  // 'from' should be replaced with your sender ID
            'to' => $number,
            'text' => $message
        );

        // Convert payload to JSON
        $jsonPayload = json_encode($payload);

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPayload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: App ' . $apikey
        ));

        // Execute the request
        $result = curl_exec($ch);

        // Check for cURL errors
        if ($result === false) {
            echo "cURL Error: " . curl_error($ch);
            curl_close($ch);
            return false; // Indicate failure
        }

        curl_close($ch);

        // Decode the JSON response
        $response = json_decode($result, true);

        // Check if the API call was successful
        if (isset($response['messages'][0]['status']['groupId']) && $response['messages'][0]['status']['groupId'] == 1) {
            return true; // Indicate success
        } else {
            return false; // Indicate failure
        }
    }

    // Call the function and store the result
    $sms_sent = send_sms($apikey, $number, $message);

    // Redirect back to index.php with alert
    if ($sms_sent) {
        header("Location: sms.php?success=true");
        exit;
    } else {
        header("Location: sms.php?success=false");
        exit;
    }
}
?>
