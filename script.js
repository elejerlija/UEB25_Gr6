document.addEventListener("DOMContentLoaded", function () {

    
    const donateButton = document.querySelector('.make-a-donate');

  
    donateButton.addEventListener('click', function () {
        alert('Thank you for deciding to help! You will be redirected to the donation page.');
        window.location.href = 'donate.html'; 
    });
});
const slides = document.querySelectorAll(".slides img");
let slideIndex = 0;
let intervalid = null;

document.addEventListener("DOMContentLoaded",initializeSlider);
function initializeSlider() {
    if(slides.length >0){
        slides[slideIndex].classList.add("displaySlide");
        intervalid=setInterval(nextSlide, 5000);

    }
   

}
function  showSlide(index) {
    if(index >=slides.length){
       slideIndex=0;
    }
    else if(index<0){
     slideIndex=slides.length - 1;
    }

    slides.forEach(slide=>
    {
        slide.classList.remove("displaySlide");
    }
    );
    slides[slideIndex].classList.add("displaySlide");
}
function prevSlide(){
    clearInterval(intervalid);
    slideIndex--;
    showSlide(slideIndex); 

}
function nextSlide(){
slideIndex++;
showSlide(slideIndex);
}


<<<<<<< HEAD


=======
>>>>>>> 6620a31651f5bf6afbd2d1a0e217bf0931fb6693
const clickButtons = document.querySelectorAll('a, button');
const clickSound = document.getElementById('click-sound');

if (clickSound) { 
  clickButtons.forEach(button => {
    button.addEventListener('click', () => {
      if (clickSound.paused) {
        clickSound.play();
      }
    });
  });
<<<<<<< HEAD
});
=======
} else {
  console.error('Elementi i tingullit me id-në "click-sound" nuk u gjet.');
}
>>>>>>> 6620a31651f5bf6afbd2d1a0e217bf0931fb6693
