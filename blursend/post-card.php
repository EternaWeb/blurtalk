<article class="post" onclick="window.location.href='post-view.php?id=<?php echo $row['id']; ?>'">
    <div class="post-header">
        <div>
            <span>Nga: <?php echo htmlspecialchars($row['sender_name']); ?></span>
            <span> • </span>
            <span>
                <?php echo htmlspecialchars($row['city']); ?>, 
                <?php echo htmlspecialchars(formatTimeAgo($row['created_at'])); ?>
            </span>
        </div>
    </div> <!-- Corrected closing tag for post-header -->
    
    <div class="post-content">
        <?php
        $message = $row['message'];
        $truncated_message = mb_strimwidth($message, 0, 100, "...");
        ?>
        <p><?php echo htmlspecialchars($truncated_message); ?></p>
        <?php if ($truncated_message !== $message): ?>
            <a href="post-view.php?id=<?php echo $row['id']; ?>" class="more-button">
                Me shume
            </a>
        <?php endif; ?>
    </div>
    
    <div class="post-footer">
        <span>Per: <?php echo htmlspecialchars($row['recipient_name']); ?></span>
    </div>
</article>

<style>
.post {
    cursor: pointer;
}
.more-button {
    display: inline-block;
    margin-top: 10px;
    color:rgb(137, 141, 145);
}
</style>

