document.addEventListener("DOMContentLoaded", function () {

    
    const donateButton = document.querySelector('.make-a-donate');

  
    donateButton.addEventListener('click', function () {
        alert('Thank you for deciding to help! You will be redirected to the donation page.');
        window.location.href = 'donate.html'; 
    });
});
