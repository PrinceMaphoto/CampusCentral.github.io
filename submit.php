<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $student_name = htmlspecialchars($_POST['student_name']);
    $room_number = htmlspecialchars($_POST['room_number']);
    $issue_type = htmlspecialchars($_POST['issue_type']);
    $description = htmlspecialchars($_POST['description']);

    // Set the recipient email address
    $to = "maphotoprince@gmail.com"; // Replace with your email

    // Set the email subject
    $subject = "New Maintenance Report from Campus Central";

    // Build the email content
    $email_content = "Student Name: $student_name\n";
    $email_content .= "Room/Unit Number: $room_number\n";
    $email_content .= "Issue Type: $issue_type\n\n";
    $email_content .= "Description of the Issue:\n$description\n";

    // Set the email headers
    $headers = "From: Campus Central Maintenance <no-reply@campuscentral.com>\r\n";
    $headers .= "Reply-To: $student_name <no-reply@campuscentral.com>\r\n";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect to a success page or display a success message
        echo "<script>alert('Thank you! Your maintenance report has been submitted.'); window.location.href = 'index.html';</script>";
    } else {
        // Display an error message
        echo "<script>alert('Oops! Something went wrong. Please try again.'); window.location.href = 'index.html';</script>";
    }
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: index.html");
    exit();
}
?>