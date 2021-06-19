//Glide js Carousel

// const slider1 = document.getElementById("glide_1");
const slider2 = document.getElementById("glide_2");
const slider3 = document.getElementById("glide_3");
const slider4 = document.getElementById("glide_4");
const slider5 = document.getElementById("glide_5");
const slider6 = document.getElementById("glide-6");
const slider7 = document.getElementById("glide-7");
const slider8 = document.getElementById("glide_8");
// const toggle = document.querySelector(".toggle");

// const navOpen2 = document.querySelector(".nav__hamburger");

//Latest Products
if (slider2) {
  new Glide(slider2, {
    type: "carousel",
    starAt: 0,
    autoplay: 3000,
    hoverpause: true,
    perView: 5,
    animationDuration: 800,
    animationTimingFunc: "ease-in-out",
    breakpoints: {
      1200: {
        perView: 4,
      },
      950: {
        perView: 3,
      },
      700: {
        perView: 1,
      },
    },
  }).mount();
}

if (slider8) {
  new Glide(slider8, {
    type: "carousel",
    starAt: 0,
    autoplay: 3000,
    hoverpause: true,
    perView: 5,
    animationDuration: 800,
    animationTimingFunc: "ease-in-out",
    breakpoints: {
      1200: {
        perView: 4,
      },
      950: {
        perView: 3,
      },
      700: {
        perView: 1,
      },
    },
  }).mount();
}

if (slider5) {
  new Glide(slider5, {
    type: "carousel",
    starAt: 0,
    autoplay: 3000,
    hoverpause: true,
    perView: 4,
    animationDuration: 800,
    animationTimingFunc: "ease-in-out",
    breakpoints: {
      1200: {
        perView: 4,
      },
      999: {
        perView: 3,
      },
      700: {
        perView: 2,
      },
    },
  }).mount();
}

//Testimonial
if (slider3) {
  new Glide(slider3, {
    type: "carousel",
    starAt: 0,
    autoplay: 3000,
    hoverpause: true,
    perView: 1,
    animationDuration: 800,
    animationTimingFunc: "ease-in-out",
  }).mount();
}

// News Slide
// News Slide
// News Slide

if (slider4) {
  new Glide(slider4, {
    type: "carousel",
    starAt: 0,
    hoverpause: true,
    autoplay: 3000,
    perView: 3,
    animationDuration: 800,
    animationTimingFunc: "ease-in-out",
    breakpoints: {
      998: {
        perView: 2,
      },
      768: {
        perView: 1,
      },
    },
  }).mount();
}

// Hamburger Menu Slider
if (slider6) {
  new Glide(slider6, {
    type: "carousel",
    starAt: 0,
    autoplay: 3000,
    hoverpause: true,
    perView: 3.5,
    animationDuration: 800,
    animationTimingFunc: "ease-in-out",
  }).mount();
}

if (slider7) {
  new Glide(slider7, {
    type: "carousel",
    starAt: 0,
    autoplay: 3000,
    hoverpause: true,
    perView: 3.5,
    animationDuration: 800,
    animationTimingFunc: "ease-in-out",
  }).mount();
}
