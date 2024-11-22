<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* Custom dark mode styles */
      body[data-bs-theme="dark"] {
        background-color: #121212;
        color: white;
      }

      body[data-bs-theme="dark"] .btn-light {
        background-color: #333;
        color: white;
      }

      body[data-bs-theme="dark"] .btn-dark {
        background-color: #bbb;
        color: black;
      }
    </style>
    <title>Bootstrap Dark Mode Toggle</title>
  </head>
  <body data-bs-theme="light">
    <div class="container">
      <h1 class="text-center">Toggle Bootstrap Dark Mode!</h1>
      <p>This page uses Bootstrap's dark theme, which can be toggled.</p>
      <button class="btn btn-light" id="theme-toggle">Toggle Dark Mode</button>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      // Handle the dark mode toggle
      document.getElementById('theme-toggle').addEventListener('click', function () {
        // Get the current theme from the body
        const currentTheme = document.body.getAttribute('data-bs-theme');
        
        // Toggle between 'light' and 'dark' theme
        if (currentTheme === 'dark') {
          document.body.setAttribute('data-bs-theme', 'light');
        } else {
          document.body.setAttribute('data-bs-theme', 'dark');
        }
      });
    </script>
  </body>
</html>
