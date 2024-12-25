<?php
// Include database connection
include 'conn.php';

// Define the formatTimeAgo function if it's not already included
function formatTimeAgo($datetime) {
    $time = new DateTime($datetime);
    $now = new DateTime();
    $diff = $now->diff($time);

    if ($diff->y > 0) {
        // Display as "DD Month YYYY"
        return $time->format('d F Y');
    } elseif ($diff->m > 0) {
        return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
    } elseif ($diff->d > 0) {
        return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
    } elseif ($diff->h > 0) {
        return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
    } elseif ($diff->i > 0) {
        return $diff->i . ' min' . ($diff->i > 1 ? '' : '') . ' ago';
    } else {
        return $diff->s . ' sec' . ($diff->s > 1 ? '' : '') . ' ago';
    }
}

// Delete post if delete button is clicked
if (isset($_GET['delete'])) {
    $post_id = $_GET['delete'];
    // Delete the post from the database
    $conn->query("DELETE FROM posts WHERE id = $post_id");
    // Redirect back to admin page
    header("Location: admin.php");
    exit;
}

// Fetch all posts from the database
$result = $conn->query("SELECT id, sender_name, recipient_name, city, message, created_at FROM posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Posts</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="admin-container">
        <h1>Admin Panel - Manage Posts</h1>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sender</th>
                    <th>Recipient</th>
                    <th>City</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['sender_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['recipient_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['city']); ?></td>
                        <td><?php echo htmlspecialchars(mb_strimwidth($row['message'], 0, 50, "...")); ?></td>
                        <td><?php echo htmlspecialchars(formatTimeAgo($row['created_at'])); ?></td>
                        <td>
                            <a href="admin.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
