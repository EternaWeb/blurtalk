<?php
include 'conn.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT sender_name, recipient_name, city, message, created_at FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if (!$post) {
    die("Post not found!");
}

// Function to format time ago
function formatTimeAgo($timestamp) {
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    
    // If time difference is less than a minute
    if ($seconds <= 60) {
        return "Just now";
    }
    // If time difference is less than an hour
    $minutes = round($seconds / 60);
    if ($minutes <= 60) {
        return "{$minutes} min ago";
    }
    // If time difference is less than a day
    $hours = round($seconds / 3600);
    if ($hours <= 24) {
        return "{$hours} hour ago";
    }
    // If time difference is less than a week
    $days = round($seconds / 86400);
    if ($days <= 7) {
        return "{$days} day ago";
    }
    // If more than a week
    return date("d M Y", $time_ago);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles.css"> <!-- Your existing CSS file -->
    <link rel="stylesheet" href="assets/search.css"> <!-- Your existing CSS file -->
</head>

<body>
    <?php include 'component/header.php'; ?>

    <?php include 'component/hero-index.php'; ?>
    <main class="post-view">
        <article class="post">
            <div class="post-header">
                <div>
                    <span><?php echo htmlspecialchars($post['sender_name']); ?></span>
                    <span> • </span>
                    <span><?php echo htmlspecialchars($post['city']); ?>, 
                        <?php echo htmlspecialchars(formatTimeAgo($post['created_at'])); ?>
                    </span>
                </div>
            </div>

            <div class="post-content">
                <p><?php echo htmlspecialchars($post['message']); ?></p>
            </div>

            <div class="post-footer">
                <span>Per: <?php echo htmlspecialchars($post['recipient_name']); ?></span>
            </div>
        </article>
    </main>
</body>
</html>
