<?php
session_start();

// Initialize the sellers array if it doesn't exist
if (!isset($_SESSION['sellers'])) {
    $_SESSION['sellers'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle file upload
    $upload_dir = "../uploads/";
    $image_path = "";
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        // Create uploads directory if it doesn't exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $image_path = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $image_path);
    }

    // Create seller array with form data
    $seller = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'price' => $_POST['price'],
        'category' => $_POST['category'],
        'location' => $_POST['location'],
        'phone' => $_POST['phone'],
        'description' => $_POST['description'],
        'image_path' => $image_path,
        'date_added' => date('Y-m-d H:i:s')
    ];

    // Add to session array
    $_SESSION['sellers'][] = $seller;

    // Redirect to view page
    header("Location: view_sellers.php");
    exit();
}
?>