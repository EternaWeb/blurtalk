<?php
include 'conn.php';

// Get the search query and city filter
$searchQuery = $_GET['query'] ?? '';  // Ensure searchQuery is initialized
$cityFilter = $_GET['city'] ?? '';    // Initialize city filter as well

// Prepare and execute the search SQL statement
if ($searchQuery != '') {
    // If search query is provided, filter by query and city
    $stmt = $conn->prepare("SELECT id, sender_name, recipient_name, city, message, created_at, hashtag
                            FROM posts 
                            WHERE (sender_name LIKE ? OR recipient_name LIKE ? OR message LIKE ?)
                            AND (? = '' OR city = ?)
                            ORDER BY created_at DESC");
    $searchTerm = '%' . $searchQuery . '%';  // Prepare the search term with wildcards for LIKE
    $stmt->bind_param("sssss", $searchTerm, $searchTerm, $searchTerm, $cityFilter, $cityFilter);
} else {
    // If no search query is provided, only filter by city
    $stmt = $conn->prepare("SELECT id, sender_name, recipient_name, city, message, created_at, hashtag
                            FROM posts 
                            WHERE (? = '' OR city = ?)
                            ORDER BY created_at DESC");
    $stmt->bind_param("ss", $cityFilter, $cityFilter);
}

$stmt->execute();
$result = $stmt->get_result();

// Function to format the time ago
function formatTimeAgo($datetime) {
    $time = new DateTime($datetime);
    $now = new DateTime();
    $diff = $now->diff($time);

    if ($diff->y > 0) {
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

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="assets/search.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kërkimi</title>
</head>
<body>
    <?php include 'component/header.php'; ?>
    <?php include 'component/hero-index.php'; ?>
    <main>

        <!-- Search Form with Dropdown -->
        <div class="search-form">
            <form action="search.php" method="get" class="search-bar">
              
                
                <!-- City Dropdown -->
               
                    // Get the unique cities from the database to populate the dropdown
                    $citiesQuery = "SELECT DISTINCT city FROM posts";
                    $citiesResult = $conn->query($citiesQuery);
                    while ($city = $citiesResult->fetch_assoc()) {
                        $selected = ($city['city'] == $cityFilter) ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($city['city']) . "' $selected>" . htmlspecialchars($city['city']) . "</option>";
                    }
                    ?>
                </select>

                <!-- Search Button -->
               
            </form>
        </div>

        <!-- Loader -->
        <div class="loader">
            <svg viewBox="25 25 50 50">
                <circle r="20" cy="50" cx="50"></circle>
            </svg>
        </div>

        <!-- Search Results -->
        <section class="posts" style="display: none;">
            <?php if (($searchQuery || $cityFilter) && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <?php include 'post-card.php'; ?>
                <?php endwhile; ?>
            <?php elseif ($searchQuery): ?>
                <div class="no-results-section">
                    <?php include 'no-results.html'; ?>
                </div>
            <?php else: ?>
                <p class="no-results">Ju lutem shkruani një fjalë për të kërkuar ose zgjidhni një qytet.</p>
            <?php endif; ?>
        </section>
    </main>

    <script>
        // Show loader and delay results
        document.addEventListener("DOMContentLoaded", function() {
            const loader = document.querySelector(".loader");
            const posts = document.querySelector(".posts");

            loader.style.display = "block";

            setTimeout(() => {
                loader.style.display = "none";
                posts.style.display = "block";
            }, 1000); // 1-second delay
        });
    </script>
</body>
</html>
