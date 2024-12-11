<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TransportHub - Excellence in Logistics</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
  <style>
    :root {
      --primary-color: #2a2e8f; /* Modern deep blue */
      --secondary-color: #ffffff; /* Clean white */
      --text-color: #f7f7f7; /* Light text color */
      --card-bg: #3b3fbc; /* Slightly lighter blue for cards */
      --shadow-color: rgba(0, 0, 0, 0.1); /* Soft shadows */
      --transition: 0.3s ease-in-out; /* Smooth transition */
      --border-radius: 12px; /* Rounded elements */
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-color: var(--primary-color);
      color: var(--text-color);
      line-height: 1.6;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1.5rem;
    }

    header {
      background-color: var(--primary-color);
      padding: 1.2rem 0;
      box-shadow: 0 4px 6px var(--shadow-color);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .brand {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--secondary-color);
      text-decoration: none;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 1.5rem;
      margin: 0;
      padding: 0;
    }

    .nav-links a {
      text-decoration: none;
      font-weight: 500;
      color: var(--secondary-color);
      transition: opacity var(--transition);
    }

    .nav-links a:hover {
      opacity: 0.85;
    }

    .hero {
      background-color: var(--primary-color);
      color: var(--secondary-color);
      text-align: center;
      padding: 7rem 1.5rem;
    }

    .hero h1 {
      font-size: 3.8rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
    }

    .hero-buttons a {
      text-decoration: none;
      padding: 0.8rem 2.5rem;
      border-radius: var(--border-radius);
      font-weight: bold;
      display: inline-block;
      margin: 0.5rem;
      transition: background-color var(--transition), transform var(--transition);
    }

    .btn-primary {
      background-color: var(--secondary-color);
      color: var(--primary-color);
    }

    .btn-primary:hover {
      background-color: #eaeaea;
      transform: translateY(-3px);
    }

    .btn-secondary {
      background-color: transparent;
      color: var(--secondary-color);
      border: 2px solid var(--secondary-color);
    }

    .btn-secondary:hover {
      background-color: var(--secondary-color);
      color: var(--primary-color);
      transform: translateY(-3px);
    }

    .features {
      display: flex;
      justify-content: center;
      gap: 2.5rem;
      margin: 3rem 0;
      padding: 0 1rem;
      flex-wrap: wrap;
    }

    .feature-card {
      background-color: var(--card-bg);
      border-radius: var(--border-radius);
      box-shadow: 0 4px 8px var(--shadow-color);
      padding: 2rem;
      text-align: center;
      opacity: 0;
      transform: translateY(20px);
      transition: opacity var(--transition), transform var(--transition);
      width: 320px;
    }

    .feature-card h3 {
      font-size: 1.6rem;
      color: var(--secondary-color);
      margin-bottom: 1rem;
    }

    .feature-card p {
      color: var(--text-color);
      font-size: 0.95rem;
    }

    .feature-card.show {
      opacity: 1;
      transform: translateY(0);
    }

    .feature-card:hover {
      transform: scale(1.08);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      cursor: pointer;
    }

    footer {
      background-color: var(--primary-color);
      color: var(--secondary-color);
      text-align: center;
      padding: 2rem 0;
      margin-top: 3rem;
    }

    footer p {
      margin: 0.5rem 0;
      font-size: 0.9rem;
    }

    footer a {
      color: var(--secondary-color);
      text-decoration: none;
      font-weight: 500;
    }

    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <div class="container">
      <nav>
        <a href="#" class="brand">TransportHub</a>
        <ul class="nav-links">
          <li><a href="#">Home</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
    <section class="hero">
      <div class="container">
        <h1>Welcome to TransportHub</h1>
        <p>Simplify your transportation needs with our all-in-one solution tailored for efficiency and reliability.</p>
        <div class="hero-buttons">
        <a href="<?= base_url('auth/login') ?>" class="btn-primary">Sign In</a>
        <a href="<?= base_url('auth/register') ?>" class="btn-secondary">Sign Up</a>
        </div>
      </div>
    </section>

  <!-- Features Section -->
  <section class="container features">
  <div class="slideshow">
    <div class="slide-track">
      <div class="feature-card">
        <h3>Reliable Transporters</h3>
        <p>All drivers are vetted for top-notch safety and reliability.</p>
      </div>
      <div class="feature-card">
        <h3>Cutting-Edge Tech</h3>
        <p>Track and manage your logistics in real-time, effortlessly.</p>
      </div>
      <div class="feature-card">
        <h3>Exceptional Support</h3>
        <p>Our team is here to assist you around the clock.</p>
      </div>
      <div class="feature-card">
        <h3>Seamless Operations</h3>
        <p>Experience smooth and efficient logistic processes.</p>
      </div>
      <div class="feature-card">
        <h3>Cost Effective</h3>
        <p>Our pricing is competitive and transparent.</p>
      </div>
      <!-- Duplicate cards for seamless looping -->
      <div class="feature-card">
        <h3>Reliable Transporters</h3>
        <p>All drivers are vetted for top-notch safety and reliability.</p>
      </div>
      <div class="feature-card">
        <h3>Cutting-Edge Tech</h3>
        <p>Track and manage your logistics in real-time, effortlessly.</p>
      </div>
      <div class="feature-card">
        <h3>Exceptional Support</h3>
        <p>Our team is here to assist you around the clock.</p>
      </div>
      <div class="feature-card">
        <h3>Seamless Operations</h3>
        <p>Experience smooth and efficient logistic processes.</p>
      </div>
      <div class="feature-card">
        <h3>Cost Effective</h3>
        <p>Our pricing is competitive and transparent.</p>
      </div>
    </div>
  </div>
</section>

<style>
  /* Feature Slideshow */
  .slideshow {
    overflow: hidden;
    position: relative;
    width: 100%;
    height: 220px; /* Set a fixed height for the cards */
  }

  .slide-track {
    display: flex;
    animation: scroll 20s linear infinite; /* Smooth continuous scrolling */
  }

  .feature-card {
    background-color: #3b3fbc; /* Slightly lighter blue for cards */
    border-radius: 12px; /* Rounded elements */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadows */
    color: #f7f7f7; /* Light text */
    padding: 1.5rem;
    text-align: center;
    flex: 0 0 300px; /* Fixed width for each card */
    margin: 0 1rem; /* Spacing between cards */
    transition: transform 0.3s ease-in-out; /* Hover effect */
  }

  .feature-card:hover {
    transform: scale(1.1); /* Slight enlargement on hover */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* More pronounced shadow */
  }

  @keyframes scroll {
    0% {
      transform: translateX(0); /* Start at initial position */
    }
    100% {
      transform: translateX(-100%); /* Move all cards out of view */
    }
  }
</style>


  <!-- Footer -->
  <footer>
    <div class="container">
      <p>&copy; 2024 TransportHub. Elevating logistics every step of the way.</p>
      <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </div>
  </footer>

  <script>
    // Animation for feature cards
    document.addEventListener('DOMContentLoaded', () => {
      const cards = document.querySelectorAll('.feature-card');
      setTimeout(() => {
        cards.forEach((card, index) => {
          setTimeout(() => {
            card.classList.add('show');
          }, index * 200);
        });
      }, 500);
    });
  </script>
</body>
</html>
