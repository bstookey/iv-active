<?php
// Replace "YOUR_HUBSPOT_ACCESS_TOKEN" with your actual HubSpot access token
$accessToken = "pat-na1-a1269f40-4de1-4e8f-867a-b27ad0d8ceed";

// HubSpot API endpoint for creating contacts
$hubspotUrl = "https://api.hubapi.com/crm/v3/objects/contacts";

// Retrieve form data from AJAX request
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$list = "newsletter";


// Create the contact data array
$contactData = array(
  'properties' => array(
    'email' => $email,
    'firstname' => $firstname,
    'lastname' => $lastname,
    'phone' => $phone,
    'list_enrollment' => $list
  )
);

// Convert the data to JSON
$contactJson = json_encode($contactData);

// Create a new cURL resource
$ch = curl_init($hubspotUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $contactJson);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $accessToken, 'Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL and get the response
$response = curl_exec($ch);

// Close cURL resource
curl_close($ch);

// Return the response to AJAX
echo $response;
