<?php 
require_once 'includes/config.php';
require_once 'includes/header.php';

// Get featured products
$sql = "SELECT * FROM Products ORDER BY CreatedAt DESC";
$stmt = sqlsrv_query($conn, $sql);

// Check if query succeeded
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Get the first product to display in hero section
$first_product = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

// Reset the pointer to loop through all products again
sqlsrv_free_stmt($stmt);
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
<!-- Hero Section -->
<section class=" text-white py-5 mb-5 rounded ">
    <div class="container text-center mt-5 ">
        <h1 class="display-4 fw-bold">Premium Computer and Accessories</h1>
        <p class="lead">Welcome to my Computer Store and Enjoy with my products.</p>
        <p class="lead">Find the best deals on high-performance computers and accessories</p>
        <?php if ($first_product): ?>
        <?php endif; ?>
        <a href="/products.php" class="btn btn-light btn-lg mt-3">Shop Now</a>
    </div>
</section>

<!-- Featured Products -->
<h2 class="mb-4">Featured Products</h2>
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    <?php while($product = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
    <div class="col">
        <div class="card h-100 product-card">
            <img src="<?php echo $product['ImageURL'] ?>" 
                 class="card-img-top p-3" 
                 alt="<?php echo htmlspecialchars($product['Name']); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($product['Name']); ?></h5>
                <p class="card-text text-muted"><?php echo substr(htmlspecialchars($product['Description']), 0, 100); ?>...</p>
                <h6 class="text-primary">$<?php echo number_format($product['Price'], 2); ?></h6>
            </div>
            <div class="card-footer bg-transparent">
                <a href="/products.php" class="btn btn-primary w-100">
                    <i class="fas fa-eye me-2"></i>View All Products
                </a>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php 
// Free the statement resource
sqlsrv_free_stmt($stmt);
require_once 'includes/footer.php'; 
?>