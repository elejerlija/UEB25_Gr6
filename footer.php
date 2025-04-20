<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
 
    echo '<div style="background-color: #d4edda; color: #155724; padding: 12px; margin-top: 20px; 
                border: 1px solid #c3e6cb; border-radius: 5px; font-family: Arial;">
    <strong>Thank you for your message. It has been safely submitted.</strong>          </div>';
      
    $debug_mode = false;  

    if ($debug_mode) {
              var_dump($_POST);
    }
    
}
?>