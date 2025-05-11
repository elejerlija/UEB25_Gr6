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
  <meta charset="UTF-8">
  <title>Donate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/donate.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  
</head>

<body>

<div class="donation-container">
  <h2>Make a Donation</h2>
  <form id="donationForm">
    <!-- Amount -->
    <div class="donation-group">
      <label>Donation Amount ($)</label>
      <div class="amount-buttons">
        <input type="radio" id="amt10" name="amount" value="10" checked>
        <label for="amt10">$10</label>

        <input type="radio" id="amt25" name="amount" value="25">
        <label for="amt25">$25</label>

        <input type="radio" id="amt50" name="amount" value="50">
        <label for="amt50">$50</label>

        <input type="radio" id="amt100" name="amount" value="100">
        <label for="amt100">$100</label>

        <input type="radio" id="amtCustom" name="amount" value="custom">
        <label for="amtCustom">Custom</label>
      </div>
      <input type="number" id="customAmount" class="donation-input" placeholder="Enter custom amount" style="display: none;">
    </div>

    <!-- Personal Info -->
    <div class="donation-group">
      <label>Full Name</label>
      <input type="text" class="donation-input" required>
    </div>
    <div class="donation-group">
      <label>Email</label>
      <input type="email" class="donation-input" required>
    </div>

    <!-- Payment Method -->
    <div class="donation-group">
      <label>Payment Method</label>
      <div class="payment-method">
        <label><input type="radio" name="paymentMethod" value="card" checked> Card</label>
        <label><input type="radio" name="paymentMethod" value="paypal"> PayPal</label>
      </div>
    </div>

    <!-- Card Fields -->
    <div id="cardFields">
      <div class="donation-group">
        <label>Card Number</label>
        <input type="text" class="donation-input" placeholder="1234 5678 9012 3456">
      </div>
      <div class="donation-group">
        <label>Expiry Date</label>
        <input type="text" class="donation-input" placeholder="MM/YY">
      </div>
      <div class="donation-group">
        <label>CVV</label>
        <input type="text" class="donation-input" placeholder="123">
      </div>
    </div>

    <!-- PayPal Notice -->
    <div id="paypalButton" style="display: none;">
      <p>You will be redirected to PayPal to complete your donation.</p>
    </div>

    <button type="submit" class="donation-btn">Donate Now</button>
  </form>
</div>

<?php showFooter(); ?>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const amountRadios = document.querySelectorAll('input[name="amount"]');
    const customAmount = document.getElementById('customAmount');
    const paymentRadios = document.querySelectorAll('input[name="paymentMethod"]');
    const cardFields = document.getElementById('cardFields');
    const paypalButton = document.getElementById('paypalButton');

    amountRadios.forEach(radio => {
      radio.addEventListener('change', function () {
        customAmount.style.display = (this.value === 'custom') ? 'block' : 'none';
      });
    });

    paymentRadios.forEach(radio => {
      radio.addEventListener('change', function () {
        const isPayPal = this.value === 'paypal';
        cardFields.style.display = isPayPal ? 'none' : 'block';
        paypalButton.style.display = isPayPal ? 'block' : 'none';
      });
    });
  });
</script>

</body>
</html>
