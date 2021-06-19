/*
=============
Navigation
=============
 */
const navOpen = document.querySelector(".nav__hamburger");
const categoryNavOpen1 = document.getElementById("men-all");
const categorysuit = document.getElementById("suit");
const categoryJacket = document.getElementById("jacket");
const categoryTuxedo = document.getElementById("tuxedo");
const navClose = document.querySelector(".close__toggle");
const categoryNavClose = document.querySelector(".category-close-toggle");
const menu = document.querySelector(".hamburger-menu");
const categoryMenu = document.querySelector(".hamburger-category-menu");
const scrollLink = document.querySelectorAll(".scroll-link");
const navContainer = document.querySelector(".hamburger-menu");
const productSize = document.querySelector(".select-wrapper");
const detailsdropdown1 = document.querySelector(".details-dropdown1");
const detailsdropdown2 = document.querySelector(".details-dropdown2");
const detailsdropdown3 = document.querySelector(".details-dropdown3");
const mobiledetailsdropdown1 = document.querySelector(
  ".mobile-details-dropdown1"
);
const mobiledetailsdropdown2 = document.querySelector(
  ".mobile-details-dropdown2"
);
const mobiledetailsdropdown3 = document.querySelector(
  ".mobile-details-dropdown3"
);
const sameHeightAll = document.querySelectorAll(".complete-look-div");
const sameHeight = document.querySelector(".complete-look-div");
const categoryDropdownSuit = document.querySelector(".category-dropdown-suit");
const categoryDropdownJacket = document.querySelector(
  ".category-dropdown-jacket"
);
const categoryDropdownTuxedo = document.querySelector(
  ".category-dropdown-tuxedo"
);

navOpen.addEventListener("click", () => {
  menu.classList.add("open");
  document.body.classList.add("active");
  navContainer.style.left = "0";
  // navContainer.style.width = "25rem";
  // navContainer.style.width = "90%";
});

navClose.addEventListener("click", () => {
  menu.classList.remove("open");
  document.body.classList.remove("active");
  // navContainer.style.left = "-25rem";
  navContainer.style.left = "-100%";
  // navContainer.style.width = "0";
});

categorysuit.addEventListener("click", () => {
  categoryDropdownSuit.classList.toggle("active");
  categorysuit.classList.toggle("suit-category");
  categoryDropdownJacket.classList.remove("active");
  categoryDropdownTuxedo.classList.remove("active");
  categoryJacket.classList.remove("jacket-category");
  categoryTuxedo.classList.remove("tuxedo-category");
});
categoryJacket.addEventListener("click", () => {
  categoryDropdownJacket.classList.toggle("active");
  categoryJacket.classList.toggle("jacket-category");
  categoryDropdownSuit.classList.remove("active");
  categoryDropdownTuxedo.classList.remove("active");
  categorysuit.classList.remove("suit-category");
  categoryTuxedo.classList.remove("tuxedo-category");
});
categoryTuxedo.addEventListener("click", () => {
  categoryDropdownTuxedo.classList.toggle("active");
  categoryTuxedo.classList.toggle("tuxedo-category");
  categoryDropdownSuit.classList.remove("active");
  categoryDropdownJacket.classList.remove("active");
  categorysuit.classList.remove("suit-category");
  categoryJacket.classList.remove("jacket-category");
});

// categoryNavOpen1.addEventListener("click", () => {
//   categoryMenu.classList.add("open");
// });
// categoryNavOpen2.addEventListener("click", () => {
//   categoryMenu.classList.add("open");
// });
// categoryNavOpen3.addEventListener("click", () => {
//   categoryMenu.classList.add("open");
// });
// categoryNavOpen4.addEventListener("click", () => {
//   categoryMenu.classList.add("open");
// });
// categoryNavClose.addEventListener("click", () => {
//   categoryMenu.classList.remove("open");
// });

productSize.addEventListener("click", () => {
  productSize.classList.toggle("active");
});
detailsdropdown1.addEventListener("click", () => {
  detailsdropdown1.classList.toggle("active");
  detailsdropdown2.classList.remove("active");
  detailsdropdown3.classList.remove("active");
});
detailsdropdown2.addEventListener("click", () => {
  detailsdropdown2.classList.toggle("active");
  detailsdropdown1.classList.remove("active");
  detailsdropdown3.classList.remove("active");
});
detailsdropdown3.addEventListener("click", () => {
  detailsdropdown3.classList.toggle("active");
  detailsdropdown2.classList.remove("active");
  detailsdropdown1.classList.remove("active");
});

mobiledetailsdropdown1.addEventListener("click", () => {
  mobiledetailsdropdown1.classList.toggle("active");
  mobiledetailsdropdown2.classList.remove("active");
  mobiledetailsdropdown3.classList.remove("active");
});
mobiledetailsdropdown2.addEventListener("click", () => {
  mobiledetailsdropdown2.classList.toggle("active");
  mobiledetailsdropdown1.classList.remove("active");
  mobiledetailsdropdown3.classList.remove("active");
});
mobiledetailsdropdown3.addEventListener("click", () => {
  mobiledetailsdropdown3.classList.toggle("active");
  mobiledetailsdropdown2.classList.remove("active");
  mobiledetailsdropdown1.classList.remove("active");
});

console.log(sameHeight.clientWidth);
// sameHeight.style.height = `${sameHeight.clientWidth}px`;
sameHeightAll.forEach(function (div) {
  div.style.height = `${sameHeight.clientWidth - 20}px`;
});
/*
=============
PopUp
=============
 */
// const popup = document.querySelector(".popup");
// const closePopup = document.querySelector(".popup__close");

// if (popup) {
//   closePopup.addEventListener("click", () => {
//     popup.classList.add("hide__popup");
//   });

//   window.addEventListener("load", () => {
//     setTimeout(() => {
//       popup.classList.remove("hide__popup");
//     }, 500);
//   });
// }

/*
=============
Fixed Navigation
=============
 */

const navBar = document.querySelector(".navigation");
const gotoTop = document.querySelector(".goto-top");

// Smooth Scroll
// Array.from(scrollLink).map((link) => {
//   link.addEventListener("click", (e) => {
//     // Prevent Default
//     e.preventDefault();

//     const id = e.currentTarget.getAttribute("href").slice(1);
//     const element = document.getElementById(id);
//     const navHeight = navBar.getBoundingClientRect().height;
//     const fixNav = navBar.classList.contains("fix__nav");
//     let position = element.offsetTop - navHeight;

//     if (!fixNav) {
//       position = position - navHeight;
//     }

//     window.scrollTo({
//       left: 0,
//       top: position,
//     });
//     navContainer.style.left = "-25rem";
//     document.body.classList.remove("active");
//   });
// });

// Fix NavBar

window.addEventListener("scroll", (e) => {
  const scrollHeight = window.pageYOffset;
  const navHeight = navBar.getBoundingClientRect().height;
  if (scrollHeight > navHeight) {
    navBar.classList.add("fix__nav");
  } else {
    navBar.classList.remove("fix__nav");
  }

  if (scrollHeight > 300) {
    gotoTop.classList.add("show-top");
  } else {
    gotoTop.classList.remove("show-top");
  }
});

//
AOS.init();
