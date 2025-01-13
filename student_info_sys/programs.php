programs.php<?php
if (isset($_GET['program'])) {
    $program = $_GET['program'];

    // Example data - replace with database queries
    $programDetails = [
        "CSE" => "CSE - Computer Science & Engineering: A program focused on software development, AI, and networking.",
        "EEE" => "EEE - Electrical & Electronic Engineering: Study of circuits, systems, and power.",
        "CTE" => "CTE - Communication and Telecommunication Engineering: Focuses on communication technologies.",
        "CE" => "CE - Civil Engineering: Covers structural engineering, construction, and design."
    ];

    echo isset($programDetails[$program]) ? $programDetails[$program] : "Details not available for the selected program.";
} else {
    echo "Invalid request.";
}
?>
