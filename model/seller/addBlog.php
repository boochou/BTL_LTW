<?php
function addBlog($mysqli, $content, $title) {
    $query = "INSERT INTO `blog` (`content`, `idSeller`, `header`) VALUES (?, 1, ?)";
    
    $stmt = mysqli_prepare($mysqli, $query);
    if (!$stmt) {
        error_log("Error: " . mysqli_error($mysqli)); // Corrected
        return false;
    }
    
    // Bind parameters with correct types (ss for two strings)
    mysqli_stmt_bind_param($stmt, "ss", $content, $title);
    
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        error_log("Error: " . mysqli_stmt_error($stmt)); // Corrected
        mysqli_stmt_close($stmt);
        return false;
    }

    mysqli_stmt_close($stmt);
    return true;
}
?>
