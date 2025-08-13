<?php
// test_connection.php
require_once 'includes/config.php';

if ($conn) {
    echo "Connected successfully";
    
    // Test a simple query
    $sql = "SELECT 1 AS test";
    $stmt = sqlsrv_query($conn, $sql);
    
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    echo "<br>Query test successful: " . $row['test'];
    
    sqlsrv_free_stmt($stmt);
} else {
    echo "Connection failed";
    die(print_r(sqlsrv_errors(), true));
}

?>