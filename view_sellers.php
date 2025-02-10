<?php
// Check if the seller information exists (you may want to use a session or database in a real app)
$sellers = isset($_SESSION['sellers']) ? $_SESSION['sellers'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sellers</title>
</head>
<body>
    <h1>Seller Information</h1>

    <?php if (empty($sellers)): ?>
        <p>No seller information available.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($sellers as $seller): ?>
                <li>
                    <strong>Name:</strong> <?= htmlspecialchars($seller['name']) ?><br>
                    <strong>Email:</strong> <?= htmlspecialchars($seller['email']) ?><br>
                    <strong>Account No:</strong> <?= htmlspecialchars($seller['account_no']) ?><br>
                    <strong>Location:</strong> <?= htmlspecialchars($seller['location']) ?><br>
                    <strong>Phone:</strong> <?= htmlspecialchars($seller['phone']) ?><br>
                    <strong>Message:</strong> <?= htmlspecialchars($seller['message']) ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="seller_form.php">Back to Seller Form</a>
</body>
</html>
