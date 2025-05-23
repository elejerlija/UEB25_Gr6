<?php
session_start();
$isLocalhost = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);

function sanitize_input($data) {
    return trim(filter_var($data, FILTER_SANITIZE_STRING));
}

$errors = [];
$success_message = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $amount = $_POST['amount'] ?? '';
    if ($amount === 'custom') {
        $customAmount = filter_var($_POST['customAmount'] ?? '', FILTER_SANITIZE_NUMBER_INT);
        if (!$customAmount || $customAmount < 1) {
            $errors[] = "Please enter a valid custom donation amount.";
        } else {
            $amount = $customAmount;
        }
    } elseif (!in_array($amount, ['10', '25', '50', '100'])) {
        $errors[] = "Invalid donation amount selected.";
    }

    $fullname = sanitize_input($_POST['fullname'] ?? '');
    if (empty($fullname)) {
        $errors[] = "Full name is required.";
    }

    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    $paymentMethod = $_POST['paymentMethod'] ?? '';
    if (!in_array($paymentMethod, ['card', 'paypal'])) {
        $errors[] = "Invalid payment method selected.";
    }

    $bank = '';
    $otherBank = '';
    if ($paymentMethod === 'card') {
        $bank = $_POST['bank'] ?? '';
        if (empty($bank)) {
            $errors[] = "Please select your bank.";
        }
        if ($bank === 'other') {
            $otherBank = sanitize_input($_POST['otherBank'] ?? '');
            if (empty($otherBank)) {
                $errors[] = "Please specify your bank name.";
            }
        }

        $cardNumber = preg_replace('/\D/', '', $_POST['cardNumber'] ?? '');
        if (!preg_match('/^\d{13,19}$/', $cardNumber)) {
            $errors[] = "Please enter a valid card number (13-19 digits).";
        }

        $expiryDate = $_POST['expiryDate'] ?? '';
        if (!preg_match('/^(0[1-9]|1[0-2])\/?([0-9]{2})$/', $expiryDate)) {
            $errors[] = "Please enter expiry date in MM/YY format.";
        }

        $cvv = $_POST['cvv'] ?? '';
        if (!preg_match('/^\d{3,4}$/', $cvv)) {
            $errors[] = "Please enter a valid CVV (3 or 4 digits).";
        }
    }

    if (count($errors) === 0) {
        $to = 'charitywebsite25@gmail.com';
        $subject = "New Donation Received from $fullname";

        $message = "You have received a new donation.\n\n";
        $message .= "Details:\n";
        $message .= "Full Name: $fullname\n";
        $message .= "Email: $email\n";
        $message .= "Donation Amount: $" . htmlspecialchars($amount) . "\n";
        $message .= "Payment Method: $paymentMethod\n";

        if ($paymentMethod === 'card') {
            $bankName = ($bank === 'other') ? $otherBank : $bank;
            $message .= "Bank: $bankName\n";
            $message .= "Card Number: **** **** **** " . substr($cardNumber, -4) . "\n";
            $message .= "Expiry Date: $expiryDate\n";
            $message .= "CVV: ***\n";
        } else {
            $message .= "PayPal donation selected.\n";
        }

        $headers = "From: Charity Kosovo <charitywebsite25@gmail.com>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (!$isLocalhost) {
          if (mail($to, $subject, $message, $headers)) {
              $success_message = "Thank you for your donation, $fullname!";
          } else {
              $errors[] = "Failed to send confirmation email. Please try again later.";
          }
      } else {
         
          $success_message = "Thank you for your donation, $fullname! (Mail sending disabled on localhost)";
      }
    }
}
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

    <?php if (!empty($errors)): ?>
      <div
        class="error-box"
        style="color: red; background: #ffe6e6; padding: 10px; border-radius: 5px;"
      >
        <ul>
          <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if (!empty($success_message)): ?>
      <div
        class="success-box"
        style="color: green; background: #e6ffe6; padding: 10px; border-radius: 5px;"
      >
        <?= htmlspecialchars($success_message) ?>
      </div>
    <?php endif; ?>

    <form id="donationForm" method="POST" action="">
      <div class="donation-group">
        <label>Donation Amount ($)</label>
        <div class="amount-buttons">
          <input type="radio" id="amt10" name="amount" value="10" <?= (!isset($_POST['amount']) || (isset($_POST['amount']) && $_POST['amount'] == '10')) ? 'checked' : '' ?> />
          <label for="amt10">$10</label>

          <input type="radio" id="amt25" name="amount" value="25" <?= (isset($_POST['amount']) && $_POST['amount'] == '25') ? 'checked' : '' ?> />
          <label for="amt25">$25</label>

          <input type="radio" id="amt50" name="amount" value="50" <?= (isset($_POST['amount']) && $_POST['amount'] == '50') ? 'checked' : '' ?> />
          <label for="amt50">$50</label>

          <input type="radio" id="amt100" name="amount" value="100" <?= (isset($_POST['amount']) && $_POST['amount'] == '100') ? 'checked' : '' ?> />
          <label for="amt100">$100</label>

          <input type="radio" id="amtCustom" name="amount" value="custom" <?= (isset($_POST['amount']) && $_POST['amount'] == 'custom') ? 'checked' : '' ?> />
          <label for="amtCustom">Custom</label>
        </div>
        <input
          type="number"
          id="customAmount"
          name="customAmount"
          class="donation-input"
          placeholder="Enter custom amount"
          style="display: <?= (isset($_POST['amount']) && $_POST['amount'] == 'custom') ? 'inline-block' : 'none' ?>"
          min="1"
          value="<?= isset($_POST['customAmount']) ? htmlspecialchars($_POST['customAmount']) : '' ?>"
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
          value="<?= isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : '' ?>"
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
          value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
        />
      </div>

      <div class="donation-group">
        <label>Payment Method</label>
        <div class="payment-method">
          <label><input type="radio" name="paymentMethod" value="card" <?= (!isset($_POST['paymentMethod']) || (isset($_POST['paymentMethod']) && $_POST['paymentMethod'] == 'card')) ? 'checked' : '' ?> /> Card</label>
          <label><input type="radio" name="paymentMethod" value="paypal" <?= (isset($_POST['paymentMethod']) && $_POST['paymentMethod'] == 'paypal') ? 'checked' : '' ?> /> PayPal</label>
        </div>
      </div>

      <div class="donation-group" id="bankSelectionDiv" style="display: <?= (isset($_POST['paymentMethod']) && $_POST['paymentMethod'] == 'card') || !isset($_POST['paymentMethod']) ? 'block' : 'none' ?>">
        <label>Select Your Bank</label>
        <select name="bank" id="bankSelect" class="donation-input" <?= (isset($_POST['paymentMethod']) && $_POST['paymentMethod'] == 'card') || !isset($_POST['paymentMethod']) ? 'required' : '' ?>>
          <option value="" disabled <?= !isset($_POST['bank']) ? 'selected' : '' ?>>-- Select Bank --</option>
          <option value="TEB" <?= (isset($_POST['bank']) && $_POST['bank'] == 'TEB') ? 'selected' : '' ?>>TEB</option>
          <option value="NLB" <?= (isset($_POST['bank']) && $_POST['bank'] == 'NLB') ? 'selected' : '' ?>>NLB</option>
          <option value="BKT" <?= (isset($_POST['bank']) && $_POST['bank'] == 'BKT') ? 'selected' : '' ?>>BKT</option>
          <option value="Raiffeisen" <?= (isset($_POST['bank']) && $_POST['bank'] == 'Raiffeisen') ? 'selected' : '' ?>>Raiffeisen</option>
          <option value="other" <?= (isset($_POST['bank']) && $_POST['bank'] == 'other') ? 'selected' : '' ?>>Other (please specify)</option>
        </select>
        <input type="text" name="otherBank" id="otherBankInput" class="donation-input" placeholder="Enter your bank name" style="display: <?= (isset($_POST['bank']) && $_POST['bank'] == 'other') ? 'block' : 'none' ?>; margin-top:10px;" value="<?= isset($_POST['otherBank']) ? htmlspecialchars($_POST['otherBank']) : '' ?>">
      </div>

      <div id="cardFields" style="display: <?= (isset($_POST['paymentMethod']) && $_POST['paymentMethod'] == 'card') || !isset($_POST['paymentMethod']) ? 'block' : 'none' ?>">
        <div class="donation-group">
          <label>Card Number</label>
          <input
            type="text"
            name="cardNumber"
            class="donation-input"
            placeholder="1234 5678 9012 3456"
            <?= ((isset($_POST['paymentMethod']) && $_POST['paymentMethod'] == 'card') || !isset($_POST['paymentMethod'])) ? 'required' : '' ?>
            pattern="\d{13,19}"
            title="Please enter a valid card number (13-19 digits)."
            inputmode="numeric"
            autocomplete="cc-number"
            value="<?= isset($_POST['cardNumber']) ? htmlspecialchars($_POST['cardNumber']) : '' ?>"
          />
        </div>
        <div class="donation-group">
          <label>Expiry Date</label>
          <input
            type="text"
            name="expiryDate"
            class="donation-input"
            placeholder="MM/YY"
            <?= ((isset($_POST['paymentMethod']) && $_POST['paymentMethod'] == 'card') || !isset($_POST['paymentMethod'])) ? 'required' : '' ?>
            pattern="^(0[1-9]|1[0-2])\/?([0-9]{2})$"
            title="Please enter expiry date in MM/YY format."
            autocomplete="cc-exp"
            value="<?= isset($_POST['expiryDate']) ? htmlspecialchars($_POST['expiryDate']) : '' ?>"
          />
        </div>
        <div class="donation-group">
          <label>CVV</label>
          <input
            type="text"
            name="cvv"
            class="donation-input"
            placeholder="123"
            <?= ((isset($_POST['paymentMethod']) && $_POST['paymentMethod'] == 'card') || !isset($_POST['paymentMethod'])) ? 'required' : '' ?>
            pattern="\d{3,4}"
            title="Please enter a valid 3 or 4 digit CVV."
            inputmode="numeric"
            autocomplete="cc-csc"
            value="<?= isset($_POST['cvv']) ? htmlspecialchars($_POST['cvv']) : '' ?>"
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
    const otherBankInput = document.getElementById("otherBankInput");

    amountRadios.forEach((radio) => {
      radio.addEventListener("change", () => {
        if (document.getElementById("amtCustom").checked) {
          customAmount.style.display = "inline-block";
          customAmount.required = true;
        } else {
          customAmount.style.display = "none";
          customAmount.required = false;
          customAmount.value = "";
        }
      });
    });

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
        cardFields.querySelectorAll("input").forEach(
          (input) => (input.required = true)
        );
      } else {
        bankDiv.style.display = "none";
        cardFields.style.display = "none";
        paypalButton.style.display = "block";
        cardSubmitBtn.style.display = "none";
        bankSelect.required = false;
        cardFields.querySelectorAll("input").forEach(
          (input) => (input.required = false)
        );
        otherBankInput.style.display = "none";
        otherBankInput.required = false;
        otherBankInput.value = "";
      }
    }

    paymentRadios.forEach((radio) => {
      radio.addEventListener("change", updatePaymentFields);
    });

    bankSelect.addEventListener("change", function () {
      if (this.value === "other") {
        otherBankInput.style.display = "block";
        otherBankInput.required = true;
      } else {
        otherBankInput.style.display = "none";
        otherBankInput.required = false;
        otherBankInput.value = "";
      }
    });

    updatePaymentFields();
  });
</script>
</body>
</html>
