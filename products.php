<?php 
require_once 'includes/config.php';
require_once 'includes/header.php';

// Get category filter if exists
$category = isset($_GET['category']) ? $_GET['category'] : null;
$whereClause = $category ? " WHERE Category = ?" : "";
$params = $category ? array($category) : array();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Our Products</h2>
    <div class="dropdown">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">
            Filter by Category
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/products.php">All Products</a></li>
            <li><a class="dropdown-item" href="/products.php?category=Desktop">Case</a></li>
            <li><a class="dropdown-item" href="/products.php?category=Laptop">Laptops</a></li>
            <li><a class="dropdown-item" href="/products.php?category=Accessories">Accessories</a></li>
        </ul>
    </div>
</div>


<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    $sql = "SELECT * FROM Products" . $whereClause;
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    while ($product = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)):
    ?>
    <div class="col">
        <div class="card h-100 product-card">
            <img src="<?php echo $product['ImageURL'] ?: 'https://www.laptopsdirect.co.uk/Images/9S7-17T311-002_3_Supersize.jpg?v=3'; ?>" 
                 class="card-img-top p-3" 
                 alt="<?php echo htmlspecialchars($product['Name']); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($product['Name']); ?></h5>
                <p class="card-text text-muted"><?php echo substr(htmlspecialchars($product['Description']), 0, 100); ?>...</p>
                <h6 class="text-primary">$<?php echo number_format($product['Price'], 2); ?></h6>
                <div class="mt-3">
                    <?php if ($product['Stock'] > 0): ?>
                    <form action="/cart/add.php" method="post" class="row g-2">
                        <input type="hidden" name="product_id" value="<?php echo $product['ProductID']; ?>">
                        <div class="col-4">
                            <input type="number" name="quantity" value="1" min="1" max="<?php echo $product['Stock']; ?>" 
                                   class="form-control">
                        </div>
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </form>
                    <?php else: ?>
                    <span class="badge bg-danger">Out of Stock</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="#" class="btn btn-sm btn-outline-secondary">
                    View Details
                </a>
                <?php if(isAdmin()): ?>
                <div class="mt-2">
                    <a href="/admin/products/edit.php?id=<?php echo $product['ProductID']; ?>" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="/admin/products/delete.php?id=<?php echo $product['ProductID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    
    <?php sqlsrv_free_stmt($stmt); ?>
</div>


<?php require_once 'includes/footer.php'; ?>