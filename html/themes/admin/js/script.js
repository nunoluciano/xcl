/*
    Theme : XCL Flex Grid Admin
    Distribution : XCL 2.3 Alpha
    Version : 0.0.2
    Author : Nuno Luciano aka Gigamaster
    Date : 2019-11-01
    URL : https://github.com/xoopscube/xcl/

    -------------------- -------------------- -------------------- -------------------- DASHBOARD */

    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
    window.addEventListener('resize', () => {
      let vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);
    });
    function fullScreen() {
      if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
      } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      } else if (document.documentElement.webkitRequestFullscreen) {
        document.documentElement.webkitRequestFullscreen();
      } else if (document.documentElement.msRequestFullscreen) {
        document.documentElement.msRequestFullscreen();
      }
    }
    function smallScreen() {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      }
    }
    function lockScreen(orientation) {
      fullScreen();
      screen.orientation.lock(orientation);
    }
    $('img.svg').each(function(){
      var $img = $(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');
      $.get(imgURL, function(data) {
          var $svg = $(data).find('svg');
          if(typeof imgID !== 'undefined') {
              $svg = $svg.attr('id', imgID);
          }
          if(typeof imgClass !== 'undefined') {
              $svg = $svg.attr('class', imgClass+'-ui-icon');
          }
          $svg = $svg.removeAttr('xmlns:a');
          if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
              $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
          }
          $img.replaceWith($svg);
      }, 'xml');
    });
  $(document).ready(() => {
  sideNavControl();
  userDropdownMenu();
  mobileNavControl();
  
  // Block State Switch
  $('input[name^=uninstall]').on('change', function() {
  $(this).parent('.ui-checkbox').next('a').toggleClass('ui-update-change');
  
  // Switch only the svg background !
  // $(this).closest(".ui-card-block").find('.ui-block-image').toggleClass('ui-update-change');

  // Switch color of elements: <a> (affects border bottom), svg icon + text ! 
  $(this).closest(".ui-card-block").find('.ui-block-type').toggleClass('ui-update-change');

  // alert('Clik <{$smarty.const._AD_LEGACY_LANG_UPDATE}> to apply changes!');
  });
  // Module State Switch
  $('input[name^=isactive]').on('change', function() {
    $(this).parent('.ui-checkbox').next('a').toggleClass('ui-update-change');
    $(this).closest(".ui-card-block").find('.ui-module-image,.ui-module-state').toggleClass('ui-update-change');

    // alert('Clik <{$smarty.const._AD_LEGACY_LANG_UPDATE}> to apply changes!');
    });
});
// Set constants and grab needed elements
const MAIN_LAYOUT   = $('.grid');
const MAIN_SCROLL   = 'scrollbar';
const MOBILE_ACTIVE = '.nav-mobile';
const SIDE_NAV      = $('.side-nav');
const SIDE_ACTIVE   = 'side-menu-active';

// Local Storage
// Get the current timestamp and print it to the console
// const now = new Date(); console.log(now);

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
  const USER_MENU = $('.nav-user-control');

  USER_MENU.on('click', function(e) {
    const USER_MENU_ACTIVE = $(this).children('.nav-user-dropdown');
    toggleClass(USER_MENU_ACTIVE, 'nav-user-menu-active');
  });
}

//  Function Side Nav Control
function sideNavControl() {
  const SIDE_MENU_TITLE = $('.nav-block'); // console.log('SIDE_MENU_TITLE: ', SIDE_MENU_TITLE);
  const SIDE_MENU_TITLE_OPEN = 'nav-block-open';
  const SIDE_MENU_TITLE_CLOSE = 'nav-block-close';

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

// Function toggle side-nav
function mobileNavControl() {
  $(MOBILE_ACTIVE).on('click', function(e) {

    console.log('clicked mobile control');

    toggleClass($(MOBILE_ACTIVE),'nav-mobile-close');
    toggleClass(SIDE_NAV, SIDE_ACTIVE);
    toggleClass(MAIN_LAYOUT, MAIN_SCROLL);
  });
}
