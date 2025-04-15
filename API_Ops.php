<?php
$phone_number = $_POST['whatsapp'];
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://whatsapp-number-validator3.p.rapidapi.com/WhatsappNumberHasItWithToken",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => json_encode([
		'phone_number' => $phone_number
	]),
	CURLOPT_HTTPHEADER => [
		"Content-Type: application/json",
		"x-rapidapi-host: whatsapp-number-validator3.p.rapidapi.com",
		"x-rapidapi-key: 737d6227cdmsh44d338108d1af3ap1576e3jsnf884ccc520f4"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}