const slider1 = document.getElementById("glide_1");
const toggle = document.querySelector(".toggle");

//Hero
if (slider1) {
  var banner = new Glide(slider1, {
    type: "carousel",
    starAt: 0,
    autoplay: 3000,
    hoverpause: true,
    preview: 1,
    animationDuration: 800,
    animationTimingFunc: "linear",
  }).mount();
  function bannerpause() {
    banner._o.autoplay = false;
  }
  function bannerplay() {
    banner._o.autoplay = 3000;
  }
}

function updateButton() {
  const icon = toggle.innerHTML;
  console.log(icon);
  if (icon === '<i class="fas fa-pause" aria-hidden="true"></i>') {
    bannerpause();
    // toggle.textContent = "►";
    toggle.innerHTML = `<i class="fas fa-play" aria-hidden="true"></i>`;
  } else {
    bannerplay();
    toggle.textContent = "❚ ❚";
    toggle.innerHTML = `<i class="fas fa-pause" aria-hidden="true"></i>`;
  }
}

toggle.addEventListener("click", updateButton);
