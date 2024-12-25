<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap" rel="stylesheet">

<?php
include 'conn.php';

$result = $conn->query("SELECT id, sender_name, recipient_name, city, message, created_at FROM posts ORDER BY created_at DESC");
?>
<?php
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
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Xatoka Thuaje ketu</title>

<link rel="stylesheet" href="assets/styles.css">
<link rel="stylesheet" href="assets/search.css">
</head>
<?php include 'component/header.php';?>
<?php include 'component/hero-index.php';?>
<body>
<div class="hero">
        
        </div>
    <main>
    <h2 class="results-title"></h2>
        
        <section class="posts">
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php include 'post-card.php'; ?>
            <?php endwhile; ?>
        </section>
    </main>

    <?php include 'component/footer.php'; ?>
</body>
</html>
