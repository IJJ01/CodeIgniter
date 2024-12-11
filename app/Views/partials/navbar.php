<nav class="navbar">
  <div class="containernav">
    <a href="/" class="brand">TransportHub</a>
    <ul class="nav-links">
      <li><a href="/client/search_services">Search Services</a></li>
      <li><a href="/client/manage_requests">Manage Requests</a></li>
    </ul>
    <div class="profile-menu">
      <div class="profile-icon">P</div>
      <div class="dropdown">
        <a href="/client/view_profile">View Profile</a>
        <a href="/logout">Log Out</a>
      </div>
    </div>
  </div>
</nav>

<style>
  .navbar {
    background-color: #2a2e8f; /* Deep blue */
    padding: 1.3rem 0; /* Matches landing page */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
  }

  .navbar .containernav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
  }

  .brand {
    font-size: 1.8rem;
    font-weight: 700;
    color: #ffffff;
    text-decoration: none;
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
    color: #ffffff;
    transition: opacity 0.3s ease;
  }

  .nav-links a:hover {
    opacity: 0.85;
  }

  .profile-menu {
    position: relative;
  }

  .profile-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #ffffff;
    color: #2a2e8f;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    cursor: pointer;
  }

  .dropdown {
    display: none;
    position: absolute;
    top: 60px;
    right: 0;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    z-index: 1000;
  }

  .dropdown a {
    display: block;
    padding: 0.8rem 1.5rem;
    text-decoration: none;
    color: #333333;
    transition: background-color 0.3s ease;
  }

  .dropdown a:hover {
    background-color: #f7f7f7;
  }

  .profile-menu:hover .dropdown {
    display: block;
  }
</style>
