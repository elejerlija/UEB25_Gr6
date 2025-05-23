<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signin.php?reason=protected");
    exit();
}

include_once 'includes/header.php';
include_once 'includes/footer.php';
showHeader();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Donate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/donate.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
  />
  <style>
    /* Në rast që don me shtu CSS të vogël */
    #customAmount {
      width: 150px;
    }
    #bankSelectionDiv {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="donation-container">
    <h2>Make a Donation</h2>

    <?php if (isset($_SESSION['donation_errors'])): ?>
      <div
        class="error-box"
        style="color: red; background: #ffe6e6; padding: 10px; border-radius: 5px;"
      >
        <ul>
          <?php foreach ($_SESSION['donation_errors'] as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
          <?php endforeach; unset($_SESSION['donation_errors']); ?>
        </ul>
      </div>
    <?php endif; ?>

    <form id="donationForm" method="POST" action="donate_process.php">
      <div class="donation-group">
        <label>Donation Amount ($)</label>
        <div class="amount-buttons">
          <input type="radio" id="amt10" name="amount" value="10" checked />
          <label for="amt10">$10</label>

          <input type="radio" id="amt25" name="amount" value="25" />
          <label for="amt25">$25</label>

          <input type="radio" id="amt50" name="amount" value="50" />
          <label for="amt50">$50</label>

          <input type="radio" id="amt100" name="amount" value="100" />
          <label for="amt100">$100</label>

          <input type="radio" id="amtCustom" name="amount" value="custom" />
          <label for="amtCustom">Custom</label>
        </div>
        <input
          type="number"
          id="customAmount"
          name="customAmount"
          class="donation-input"
          placeholder="Enter custom amount"
          style="display: none"
          min="1"
        />
      </div>

      <div class="donation-group">
        <label>Full Name</label>
        <input
          type="text"
          name="fullname"
          class="donation-input"
          required
          autocomplete="name"
        />
      </div>

      <div class="donation-group">
        <label>Email</label>
        <input
          type="email"
          name="email"
          class="donation-input"
          required
          autocomplete="email"
        />
      </div>

      <div class="donation-group">
        <label>Payment Method</label>
        <div class="payment-method">
          <label><input type="radio" name="paymentMethod" value="card" checked /> Card</label>
          <label><input type="radio" name="paymentMethod" value="paypal" /> PayPal</label>
        </div>
      </div>

      <div class="donation-group" id="bankSelectionDiv">
        <label>Select Your Bank</label>
        <select name="bank" id="bankSelect" class="donation-input" required>
          <option value="" disabled selected>-- Select Bank --</option>
          <option value="bank1">Bank 1</option>
          <option value="bank2">Bank 2</option>
          <option value="bank3">Bank 3</option>
          <option value="bank4">Bank 4</option>
        </select>
      </div>

      <div id="cardFields">
        <div class="donation-group">
          <label>Card Number</label>
          <input
            type="text"
            name="cardNumber"
            class="donation-input"
            placeholder="1234 5678 9012 3456"
            required
            pattern="\d{13,19}"
            title="Please enter a valid card number (13-19 digits)."
            inputmode="numeric"
            autocomplete="cc-number"
          />
        </div>
        <div class="donation-group">
          <label>Expiry Date</label>
          <input
            type="text"
            name="expiryDate"
            class="donation-input"
            placeholder="MM/YY"
            required
            pattern="^(0[1-9]|1[0-2])\/?([0-9]{2})$"
            title="Please enter expiry date in MM/YY format."
            autocomplete="cc-exp"
          />
        </div>
        <div class="donation-group">
          <label>CVV</label>
          <input
            type="text"
            name="cvv"
            class="donation-input"
            placeholder="123"
            required
            pattern="\d{3,4}"
            title="Please enter a valid 3 or 4 digit CVV."
            inputmode="numeric"
            autocomplete="cc-csc"
          />
        </div>
      </div>

      <button type="submit" class="donation-btn" id="cardSubmitBtn">Donate Now</button>
    </form>

    <div id="paypalButton" style="display: none; margin-top: 20px;">
      <p>You will be redirected to PayPal to complete your donation.</p>
      <button
        type="button"
        class="donation-btn"
        onclick="window.open('https://www.paypal.com/donate?business=youremail@example.com&currency_code=USD', '_blank')"
      >
        Donate with PayPal
      </button>
    </div>
  </div>

  <?php showFooter(); ?>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const amountRadios = document.querySelectorAll('input[name="amount"]');
      const customAmount = document.getElementById("customAmount");
      const paymentRadios = document.querySelectorAll('input[name="paymentMethod"]');
      const cardFields = document.getElementById("cardFields");
      const paypalButton = document.getElementById("paypalButton");
      const cardSubmitBtn = document.getElementById("cardSubmitBtn");
      const bankDiv = document.getElementById("bankSelectionDiv");
      const bankSelect = document.getElementById("bankSelect");

      // Show/hide custom amount input
      amountRadios.forEach((radio) => {
        radio.addEventListener("change", () => {
          if (document.getElementById("amtCustom").checked) {
            customAmount.style.display = "inline-block";
            customAmount.required = true;
          } else {
            customAmount.style.display = "none";
            customAmount.required = false;
          }
        });
      });

      // Show/hide fields based on payment method
      function updatePaymentFields() {
        const paymentMethod = document.querySelector(
          'input[name="paymentMethod"]:checked'
        ).value;
        if (paymentMethod === "card") {
          bankDiv.style.display = "block";
          cardFields.style.display = "block";
          paypalButton.style.display = "none";
          cardSubmitBtn.style.display = "inline-block";
          bankSelect.required = true;
          cardFields.querySelectorAll("input").forEach((input) => (input.required = true));
        } else {
          bankDiv.style.display = "none";
          cardFields.style.display = "none";
          paypalButton.style.display = "block";
          cardSubmitBtn.style.display = "none";
          bankSelect.required = false;
          cardFields.querySelectorAll("input").forEach((input) => (input.required = false));
        }
      }

      paymentRadios.forEach((radio) => {
        radio.addEventListener("change", updatePaymentFields);
      });

      // Initialize the correct view on page load
      updatePaymentFields();
    });
  </script>
</body>
</html>
