<?php
// Handle form submission
// Initialise variables to avoid undefined notices
$success = false;
$error = '';
// Default values for form fields
$name = '';
$email = '';
$subject = '';
$message = '';
$human = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Trim input fields from POST data
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $subject = trim($_POST['subject'] ?? '');
  $message = trim($_POST['message'] ?? '');
  $human = trim($_POST['human'] ?? '');
  $honeypot = trim($_POST['url'] ?? '');

  // Basic validation checks
  if ($honeypot !== '') {
    // Hidden honeypot field filled out – likely a bot
    $error = 'We detected automated input. Please try again.';
  } elseif ($name === '' || $email === '' || $subject === '' || $message === '') {
    $error = 'All fields are required.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Please enter a valid email address.';
  } elseif ($human !== '7') {
    $error = 'Please answer the human verification question correctly.';
  } else {
    // Compose email message
    $to = 'drreginaldfinley-phd@yahoo.com';
    $headers = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= 'Reply-To: ' . $email . "\r\n";
    $fullMessage = "Name: $name\n";
    $fullMessage .= "Email: $email\n\n";
    $fullMessage .= "Message:\n$message\n";

    // Attempt to send the email
    $mailSent = @mail($to, $subject, $fullMessage, $headers);
    if ($mailSent) {
      $success = true;
      // Clear the form fields on success
      $name = $email = $subject = $message = $human = '';
    } else {
      $error = 'There was a problem sending your message. Please try again later.';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact | Finley Robotics Initiative</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header>
    <nav>
      <div class="logo">Finley Robotics</div>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="scholarship.html">Scholarship</a></li>
        <li><a href="reachy.html">Reachy Mini</a></li>
        <li><a href="showcase.html">Showcase</a></li>
        <li><a href="donors.html">Donors</a></li>
        <li><a href="contact.php" class="active">Contact</a></li>
      </ul>
    </nav>
  </header>
  <section class="section">
    <div class="container">
      <h2>Contact Us</h2>
      <?php if ($success): ?>
        <p>Thank you for your message! We will get back to you as soon as possible.</p>
      <?php else: ?>
        <?php if ($error !== ''): ?>
          <p style="color: red; font-weight: bold;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form class="contact-form" action="contact.php" method="post">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>

          <label for="email">Your Email</label>
          <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>

          <label for="subject">Subject</label>
          <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($subject ?? ''); ?>" required>

          <label for="message">Message</label>
          <textarea id="message" name="message" required><?php echo htmlspecialchars($message ?? ''); ?></textarea>

          <!-- Honeypot field to catch bots -->
          <input type="text" name="url" id="url" style="display:none">

          <label for="human">What is 3 + 4? (Anti‑bot)</label>
          <input type="text" id="human" name="human" required>

          <input type="submit" value="Send Message">
        </form>
      <?php endif; ?>
    </div>
  </section>
  <footer>
    <p>&copy; 2026 Finley Robotics Initiative. All rights reserved.</p>
    <p><a href="privacy.html" style="color:#fff; text-decoration:underline;">Privacy Policy</a> | <a href="terms.html" style="color:#fff; text-decoration:underline;">Terms of Use</a></p>
  </footer>
</body>
</html>