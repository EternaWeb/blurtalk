<section class="hero">
    <div class="hero-card">
        <h1 class="hero-title">Eksploro Blur</h1>
        <a href="form.php" class="create-button">
  <span><i class="bi bi-pencil-square"></i></span> 
</a>
<div class="search-form">
    <form action="search.php" method="get" class="search-bar">
        <input type="search" class="search-input" name="query" placeholder="Kerko" />

        <!-- City Dropdown -->
        <select name="city" class="dropdown-select city-dropdown">
    <option value="">Të gjitha qytetet</option>
    <?php
    // Get the unique cities from the database to populate the dropdown
    $citiesQuery = "SELECT DISTINCT city FROM posts";
    $citiesResult = $conn->query($citiesQuery);
    while ($city = $citiesResult->fetch_assoc()) {
        echo "<option value='" . htmlspecialchars($city['city']) . "'>" . htmlspecialchars($city['city']) . "</option>";
    }
    ?>
</select>

        <!-- Search Button with Icon -->
        <button type="submit" class="search-button">
            <i class="bi bi-search"></i> <!-- Bootstrap Icon for Search -->
        </button>
    </form>
</div>

