<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Management Plus</title>
  <link rel="stylesheet" href="css/payment.css" type="text/css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <header>
    <h1>Project Management Plus</h1>
  </header>
  <nav>
    <!-- Redirect to login.php -->
  <button onclick="location.href = 'login.php';" id="employee-portal">Employee Portal</button>
  </nav>
  <main>
    <div class="content">
      <h2>Welcome to PM Plus Payment and Support</h2>

      <div class="section-container">
        <div class="payment">
          <h3> Pay Invoice </h3>
          <!-- Payment form validated by sys.invoices -->
          <form>
            <label for="Invoice">Invoice:</label>
            <input type="text" id="invoice" name="invoice">
            <br>
            <label for="account_number">Account Number:</label>
            <input type="text" id="accountNum" name="accountNum">
            <br>
            <label for="routingNum">Routing Number:</label>
            <input type="text" id="routingNum" name="routingNum">
            <br>
            <button type="submit">Submit</button>
          </form>
        
        </div>

        <div class="contact">
          <h3>Contact</h3>
          <!-- Contact form sent to sys.contactform -->
          <form id="contact-form" method="POST" action="processContactForm.php">
          <label for="name">Name:</label>
           <input type="text" id="name" name="contactName">
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="contactEmail">
            <br>
            <label for="message">Message:</label>
            <textarea id="message" name="contactMessage" rows="5"></textarea>
            <br>
            <button type="submit">Submit</button>
          </form>
          <div id="success-message" style="display: none;
              margin: 10px 10px 10px 10px;
              text-align: center;">Message sent successfully!</div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    &copy; 2023 Project Management Plus. All Rights Reserved.
  </footer>
  <script>
  $(document).ready(function() {
    $("#contact-form").submit(function(e) {
      e.preventDefault(); // Prevent default form submission behavior
      
      // Serialize the form data
      const formData = $(this).serialize();
      
      
      $.ajax({
        type: "POST",
        url: "processContactForm.php",
        data: formData,
        success: function() {
          // Show the success message
          $("#success-message").fadeIn();
          
          // Clear the form fields
          $("#contact-form").trigger("reset");
          
          // Hide the success message after 5 seconds
          setTimeout(function() {
            $("#success-message").fadeOut();
          }, 5000);
        },
        error: function() {
          // Display an error message
          alert("An error occurred. Please try again.");
        }
      });
    });
  });
</script>

</body>

</html>
