<?php include 'includes/header.php'; ?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6 mb-5">
            <h2 class="display-4 mb-4">Get In Touch</h2>
            <p class="lead mb-5">Have a question about our products or want to place a custom order for a special event? We'd love to hear from you!</p>
            
            <div class="d-flex mb-4">
                <div class="bg-white rounded-circle shadow-sm p-3 me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-map-marker-alt text-primary fa-lg"></i>
                </div>
                <div>
                    <h5 class="mb-1">Our Location</h5>
                    <p class="text-muted mb-0">123 Bakery Lane, Food City, FC 12345</p>
                </div>
            </div>
            
            <div class="d-flex mb-4">
                <div class="bg-white rounded-circle shadow-sm p-3 me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-phone text-primary fa-lg"></i>
                </div>
                <div>
                    <h5 class="mb-1">Call Us</h5>
                    <p class="text-muted mb-0">+1 (234) 567-890</p>
                </div>
            </div>
            
            <div class="d-flex mb-4">
                <div class="bg-white rounded-circle shadow-sm p-3 me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-envelope text-primary fa-lg"></i>
                </div>
                <div>
                    <h5 class="mb-1">Email Us</h5>
                    <p class="text-muted mb-0">info@deluxebakery.com</p>
                </div>
            </div>

            <div class="d-flex mb-4">
                <div class="bg-white rounded-circle shadow-sm p-3 me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                    <i class="fab fa-whatsapp text-success fa-lg"></i>
                </div>
                <div>
                    <h5 class="mb-1">WhatsApp</h5>
                    <p class="text-muted mb-0">+1 (234) 567-891 (Quick support)</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                <h3 class="mb-4">Send us a Message</h3>
                <form action="process_contact.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <select name="subject" class="form-select">
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Custom Cake Order">Custom Cake Order</option>
                            <option value="Feedback">Feedback</option>
                            <option value="Wholesale">Wholesale Inquiry</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Tell us more..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-2">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
