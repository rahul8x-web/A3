<?php
// Recipient's email address
$to = "ferreirahul@gmail.com";

// Subject of the email
$subject = "Test Email";

// Message body
$message = "This is a test email sent from PHP.";



$conn = new mysqli('localhost,'root','','test');
if($conn->connect_error){
 die('Connection Failed : '.$conn->connect_error);
 
} else{
    $stmt = $conn->prepare("insert into registration(name,email,message)
    values(?,?,?)");
    $stmt->blind_param("sss",$name,$email);
    $stmt->close();
    $conn->close();
}

// Additional headers
$headers = "From: sender@example.com\r\n";
$headers .= "Reply-To: sender@example.com\r\n";
$headers .= "CC: cc@example.com\r\n"; // Optional - CC recipient
$headers .= "BCC: bcc@example.com\r\n"; // Optional - BCC recipient

// Send the email
$mailSent = mail($to, $subject, $message, $headers);

if ($mailSent) {
    echo "Email sent successfully!";
} else {
    echo "Email delivery failed.";
}
?>
