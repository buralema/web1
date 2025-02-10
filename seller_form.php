
<?php
session_start();  // Start the session

// Initialize an array to store seller information (or retrieve from session if already set)
if (!isset($_SESSION['sellers'])) {
    $_SESSION['sellers'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $account_no = $_POST['account_no'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Store the information in the session array
    $_SESSION['sellers'][] = [
        'name' => $name,
        'email' => $email,
        'account_no' => $account_no,
        'location' => $location,
        'phone' => $phone,
        'message' => $message
    ];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Form</title>
</head>
<body>
    <form action="seller_form.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="account_no">Account No:</label>
        <input type="number" id="account_no" name="account_no" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>

    <h2><a href="view_sellers.php">View Sellers</a></h2>
</body>
</html>
