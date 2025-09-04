<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Me</title>
  <link rel="stylesheet" href="./css/style.css">
  <style>
    .contact-section {
      max-width: 700px;
      margin: 60px auto;
      background: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }

    .contact-section h2 {
      text-align: center;
      font-size: 2rem;
      color: #ff4081;
      margin-bottom: 20px;
    }

    .contact-form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .contact-form input,
    .contact-form textarea {
      padding: 12px 15px;
      border-radius: 8px;
      border: 2px solid #ccc;
      font-size: 1rem;
      transition: border-color 0.3s;
    }

    .contact-form input:focus,
    .contact-form textarea:focus {
      border-color: #ff4081;
      outline: none;
    }

    .contact-form textarea {
      resize: vertical;
      min-height: 120px;
    }

    .btn-submit {
      background: #2c6e49;
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s;
    }

    .btn-submit:hover {
      background: #1e4d34;
      transform: translateY(-2px);
    }

    .contact-info {
      margin-top: 30px;
      text-align: center;
      font-size: 1rem;
      color: #555;
    }

    .contact-info a {
      color: #ff4081;
      font-weight: bold;
      text-decoration: none;
    }

    .contact-info a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="contact-section">
    <h2>Get in Touch</h2>
    <form class="contact-form" method="POST" action="send_message.php">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" placeholder="Your Message" required></textarea>
      <button type="button" class="btn-submit" onclick="sendMessage()">Send Message</button>

        <script>
        function sendMessage() {
            alert("Your message has been sent!");
        }
        </script>

    </form>

    <div class="contact-info">
      <p>Or email me directly at: 
        <a href="mailto:ayesha@example.com">ayesha.mehereen01@gmail.com</a>
      </p>
    </div>
  </div>
  <?php include 'includes/footer.php'; ?>
</body>
</html>
