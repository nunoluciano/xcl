/* XCL Admin css grid dashboard */

$(document).ready(() => {
  // mobileScroll();
  sideNavControl();
  userDropdownMenu();
  mobileNavControl();
  // mobileNavClose();
  $("textarea").resizable();
});

// Set constants and grab needed elements
const MAIN_LAYOUT   = $('.grid');
const MAIN_SCROLL   = 'scrollbar';
const MOBILE_ACTIVE = '.header-nav-mobile';
const SIDE_NAV      = $('.side-nav');
const SIDE_ACTIVE   = 'side-menu-active';

// Local Storage
// Get the current timestamp and print it to the console
// const now = new Date(); console.log(now);
// If statements are separated by a newline, the semicolon is optional.
// Two statements separated by newlines
// const now = new Date()
// console.log(now)


// Cube example function
// function functionNameCube() {}

// Initialize a function to calculate the volume of a cube
// function cube(number) {
//     return Math.pow(number, 3);
// }

// Invoke the function
// cube(5);

// Attention not all code encased in curly brackets will end without a semicolon.
// Objects are encased in curly brackets, and should end in a semicolon.

// Cube example object
//const objectName = {};

// Initialize triangle object
// const triangle = {
//     type: "right",
//     angle: 90,
//     sides: 3,
// };


// Function Toggle Class
function toggleClass(el, className) {
  if (el.hasClass(className)) {
    el.removeClass(className);
  } else {
    el.addClass(className);
  }
}


// Function User dropdown menu
function userDropdownMenu() {
  const USER_MENU = $('.header-nav-user');

  USER_MENU.on('click', function(e) {
    const USER_MENU_ACTIVE = $(this).children('.user-dropdown');
    toggleClass(USER_MENU_ACTIVE, 'user-dropdown-menu-active');
  });
}
// function notify() {
//   alert( "clicked" );
// }
// $( "button" ).on( "click", notify );

//  Function Side Nav Control
function sideNavControl() {
  const SIDE_MENU_TITLE = $('.side-module-block'); // console.log('SIDE_MENU_TITLE: ', SIDE_MENU_TITLE);
  const SIDE_MENU_TITLE_OPEN = 'side-module-block-open';
  const SIDE_MENU_TITLE_CLOSE = 'side-nav-close';

  SIDE_MENU_TITLE.each((i, sideMenuTitleToggle) => {
    $(sideMenuTitleToggle).on('click', (e) => {
      const SIDE_MENU_LINK = $(sideMenuTitleToggle).siblings();

      // Toggle class of side menu title
      if (sideMenuTitleToggle) {
        toggleClass($(sideMenuTitleToggle), SIDE_MENU_TITLE_OPEN);
      }

      // Switch view of side menu
      if (SIDE_MENU_LINK && SIDE_MENU_LINK.length === 1) {
        toggleClass($(SIDE_MENU_LINK), SIDE_MENU_TITLE_CLOSE);
      }
    });
  });
}


// If mobile viewport expand without closing the menu,
// enable scroll and remove side-nav active class
/* function mobileScroll() {
  $(window).resize(function(e) {
    const MENU_WIDTH = window.innerWidth; console.log('MENU_WIDTH: ', MENU_WIDTH);

    if (MENU_WIDTH > 900) {
      SIDE_NAV.removeClass(SIDE_ACTIVE);
      MAIN_LAYOUT.removeClass(MAIN_SCROLL);

    }
  });
} */

// Function toggle side-nav
function mobileNavControl() {
  $(MOBILE_ACTIVE).on('click', function(e) {

    console.log('clicked mobile control');

    toggleClass($(MOBILE_ACTIVE),'header-nav-mobile-close');
    toggleClass(SIDE_NAV, SIDE_ACTIVE);
    toggleClass(MAIN_LAYOUT, MAIN_SCROLL);
  });
}
