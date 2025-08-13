<?php
require_once 'includes/config.php';
$page_title = "About Us";
require_once 'includes/header.php';
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow mb-5">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0"><i class="fas fa-info-circle me-2"></i>About ComputerStore</h2>
                </div>
                <div class="card-body">
                    <div class="row align-items-center mb-5">
                        <div class="col-md-6">
                            <h3 class="text-primary">Our Story</h3>
                            <p>Founded in 2010, ComputerStore has grown from a small local shop to one of the region's leading computer and electronics retailers. What began as a passion project for our founder has transformed into a trusted destination for all tech needs.</p>
                            <p>We pride ourselves on staying at the forefront of technology while maintaining the personal service that made us successful in the first place.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="images/store-front.jpg" alt="ComputerStore location" class="img-fluid rounded shadow">
                        </div>
                    </div>

                    <div class="row align-items-center mb-5">
                        <div class="col-md-6 order-md-2">
                            <h3 class="text-primary">Our Mission</h3>
                            <p>At ComputerStore, our mission is to provide exceptional technology solutions with outstanding customer service:</p>
                            <ul>
                                <li>High-quality computer hardware and electronics</li>
                                <li>Competitive pricing and honest advice</li>
                                <li>Expert technical support and service</li>
                                <li>Community education and support</li>
                            </ul>
                        </div>
                        <div class="col-md-6 order-md-1">
                            <img src="images/team-working.jpg" alt="ComputerStore team" class="img-fluid rounded shadow">
                        </div>
                    </div>

                    <div class="values-section text-center mb-5">
                        <h3 class="text-primary mb-4">Our Core Values</h3>
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <div class="icon-circle bg-primary text-white mb-3 mx-auto">
                                            <i class="fas fa-shield-alt fa-2x"></i>
                                        </div>
                                        <h5>Integrity</h5>
                                        <p class="text-muted">Honest advice and transparent pricing</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <div class="icon-circle bg-primary text-white mb-3 mx-auto">
                                            <i class="fas fa-lightbulb fa-2x"></i>
                                        </div>
                                        <h5>Expertise</h5>
                                        <p class="text-muted">Certified technicians and knowledgeable staff</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <div class="icon-circle bg-primary text-white mb-3 mx-auto">
                                            <i class="fas fa-heart fa-2x"></i>
                                        </div>
                                        <h5>Passion</h5>
                                        <p class="text-muted">Genuine love for technology</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <div class="icon-circle bg-primary text-white mb-3 mx-auto">
                                            <i class="fas fa-hands-helping fa-2x"></i>
                                        </div>
                                        <h5>Service</h5>
                                        <p class="text-muted">Going above and beyond</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="team-section">
                        <h3 class="text-primary mb-4 text-center">Meet Our Team</h3>
                        <p class="text-center mb-5">Our team of certified technicians and sales professionals brings decades of combined experience in the computer industry.</p>
                        
                        <div class="row">
                            <?php
                            // Example team data - in a real app you might fetch this from a database
                            $team_members = [
                                [
                                    'name' => 'Alex Johnson',
                                    'position' => 'Founder & CEO',
                                    'bio' => 'Computer engineer with 15+ years experience in hardware and systems.',
                                    'photo' => 'images/team1.jpg'
                                ],
                                [
                                    'name' => 'Sarah Chen',
                                    'position' => 'Technical Director',
                                    'bio' => 'Specializes in custom builds and performance optimization.',
                                    'photo' => 'images/team2.jpg'
                                ],
                                [
                                    'name' => 'Michael Rodriguez',
                                    'position' => 'Sales Manager',
                                    'bio' => 'Helps customers find the perfect solutions for their needs.',
                                    'photo' => 'images/team3.jpg'
                                ]
                            ];
                            
                            foreach ($team_members as $member) {
                                echo '<div class="col-md-4 mb-4">';
                                echo '  <div class="card h-100 shadow-sm">';
                                echo '    <img src="'.$member['photo'].'" class="card-img-top" alt="'.$member['name'].'" style="height: 250px; object-fit: cover;">';
                                echo '    <div class="card-body text-center">';
                                echo '      <h5 class="card-title">'.$member['name'].'</h5>';
                                echo '      <p class="card-text text-primary"><strong>'.$member['position'].'</strong></p>';
                                echo '      <p class="card-text">'.$member['bio'].'</p>';
                                echo '    </div>';
                                echo '  </div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0"><i class="fas fa-store me-2"></i>Our Store</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-primary">Visit Us</h4>
                            <p>Come experience our showroom with the latest technology on display. Our knowledgeable staff is ready to help you with all your computer needs.</p>
                            <div class="embed-responsive embed-responsive-16by9 mb-4">
                                <!-- Google Map Embed -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3910.87231659359!2d104.76386257494245!3d11.41681248877359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310943007130a9b7%3A0x5587668d4e351135!2sDigital%20University%20of%20Cambodia!5e0!3m2!1sen!2skh!4v1755093143029!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-primary">Store Hours</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Monday - Friday</td>
                                        <td>9:00 AM - 7:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>10:00 AM - 6:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Sunday</td>
                                        <td>11:00 AM - 5:00 PM</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4 class="text-primary mt-4">Services</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fas fa-check text-primary me-2"></i>Custom PC Builds</li>
                                <li class="list-group-item"><i class="fas fa-check text-primary me-2"></i>Computer Repair</li>
                                <li class="list-group-item"><i class="fas fa-check text-primary me-2"></i>Data Recovery</li>
                                <li class="list-group-item"><i class="fas fa-check text-primary me-2"></i>Virus Removal</li>
                                <li class="list-group-item"><i class="fas fa-check text-primary me-2"></i>Hardware Upgrades</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>