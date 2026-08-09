<?php
// search.php

// 1. Check if the 'q' parameter exists and is not empty
if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    
    // 2. Sanitize user input to protect against Cross-Site Scripting (XSS)
    $search_query = htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8');
    
    echo "<h1>Search Results for: " . $search_query . "</h1>";
    
    // 3. Simulating data (In reality, you would fetch this from a database like MySQL)
    $mock_database = [
        "How to learn PHP",
        "HTML search bar tutorial",
        "CSS flexbox guide",
        "JavaScript for beginners",
        "PHP and MySQL database connection"
    ];
    
    $results_found = false;
    echo "<ul>";
    
    foreach ($mock_database as $item) {
        // Case-insensitive search match
        if (stripos($item, $search_query) !== false) {
            echo "<li>" . htmlspecialchars($item, ENT_QUOTES, 'UTF-8') . "</li>";
            $results_found = true;
        }
    }
    
    echo "</ul>";
    
    if (!$results_found) {
        echo "<p>No results found matching your search.</p>";
    }

} else {
    // Redirect back to the search page if accessed without a query
    header("Location: index.php");
    exit();
}
?>
