

const slide = document.querySelector(".slides");
const images = document.querySelectorAll(".slides img");

const prevBtn = document.querySelector("#prev-btn");
const nextBtn = document.querySelector("#next-btn");

let counter = 0;
const size = images[0].clientWidth;


nextBtn.addEventListener('click',()=>{
  if(counter >= images.length - 1) return;
    slide.style.transition = "transform 0.4s ease-in-out";
    counter++;
    slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

prevBtn.addEventListener('click',()=>{
  if(counter <= 0) return; 
    slide.style.transition = "transform 0.4s ease-in-out";
    counter--;
    slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

slide.addEventListener('transitionend',() => {
  if(images[counter].id ===  'lastphoto'){
    slide.style.transition = "none";
    counter = images.length - 2;
    slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
  }
  if(images[counter].id ===  'firstphoto'){
    slide.style.transition = "none";
    counter = images.length - counter;
    slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
  }

  console.log(counter);
});
