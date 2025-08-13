<?php
require_once 'includes/config.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    
    // Validate inputs
    $errors = [];
    
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }
    
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }
    
    if (empty($subject)) {
        $errors['subject'] = 'Subject is required';
    }
    
    if (empty($message)) {
        $errors['message'] = 'Message is required';
    }
    
    // If no errors, process the form (in a real app, you would send an email or save to database)
    if (empty($errors)) {
        // Here you would typically:
        // 1. Send an email to your support team
        // 2. Or save to a database table
        // 3. Then show a success message
        
        // For this example, we'll just show a success message
        flash('message', 'Thank you for your message! We will get back to you soon.', 'success');
        redirect('/contact.php');
    }
}

$page_title = "Contact Us";
require_once 'includes/header.php';
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0"><i class="fas fa-envelope me-2"></i>Contact Us</h2>
                </div>
                <div class="card-body">
                    <?php flash('message'); ?>
                    
                    <form method="post" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" 
                                           id="name" name="name" 
                                           value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" 
                                           required>
                                    <label for="name">Your Name</label>
                                    <?php if (isset($errors['name'])): ?>
                                        <div class="invalid-feedback">
                                            <?php echo $errors['name']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" 
                                           id="email" name="email" 
                                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" 
                                           required>
                                    <label for="email">Email Address</label>
                                    <?php if (isset($errors['email'])): ?>
                                        <div class="invalid-feedback">
                                            <?php echo $errors['email']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control <?php echo isset($errors['subject']) ? 'is-invalid' : ''; ?>" 
                                           id="subject" name="subject" 
                                           value="<?php echo htmlspecialchars($_POST['subject'] ?? ''); ?>" 
                                           required>
                                    <label for="subject">Subject</label>
                                    <?php if (isset($errors['subject'])): ?>
                                        <div class="invalid-feedback">
                                            <?php echo $errors['subject']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control <?php echo isset($errors['message']) ? 'is-invalid' : ''; ?>" 
                                              id="message" name="message" 
                                              style="height: 150px;" required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                                    <label for="message">Your Message</label>
                                    <?php if (isset($errors['message'])): ?>
                                        <div class="invalid-feedback">
                                            <?php echo $errors['message']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card shadow mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="icon-circle bg-primary text-white mb-3">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <h5>Our Location</h5>
                            <p class="text-muted">123 Tech Street<br>Silicon Valley, CA 94025</p>
                        </div>
                        
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="icon-circle bg-primary text-white mb-3">
                                <i class="fas fa-phone fa-2x"></i>
                            </div>
                            <h5>Phone Number</h5>
                            <p class="text-muted">(555) 123-4567<br>Mon-Fri, 9am-5pm PST</p>
                        </div>
                        
                        <div class="col-md-4 text-center">
                            <div class="icon-circle bg-primary text-white mb-3">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <h5>Email Address</h5>
                            <p class="text-muted">alexkhim8877@gmail.com<br>reaksaaa8877@gmail.com </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>