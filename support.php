<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Management Plus</title>
  <link rel="stylesheet" href="css/payment.css" type="text/css"/>
</head>

<body>
  <header>
    <h1>Project Management Plus</h1>
  </header>
  <nav>
  <button id="employee-portal">Employee Portal</button>
  </nav>
  <main>
    <div class="content">
      <h2>Welcome to PM Plus payment and support page</h2>
      <p>Make payments to employees or contact support.</p>
      
      <div class="section-container">
        <div class="employee-payments">
          <h3>Employee Payments</h3>
          <ul>
            <!-- Replace this list with  MySQL database 'employee' table data -->
            <li>
              Employee 1
              <button class="payment-btn">Make Payment</button>
              <button class="history-btn">Payment History</button>
            </li>
            <li>
              Employee 2
              <button class="payment-btn">Make Payment</button>
              <button class="history-btn">Payment History</button>
            </li>
          </ul>
        </div>

        <div class="contact">
          <h3>Contact</h3>
          <form>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <br>
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5"></textarea>
            <br>
            <button type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </main>
  <footer>
    &copy; 2023 Project Management Plus. All Rights Reserved.
  </footer>
</body>

</html>
