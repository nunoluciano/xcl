/*
  Theme : XCL Admin Flex Grid
  Distribution : XCL 2.3 Alpha
  Version : 0.0.4
  Author : Nuno Luciano aka Gigamaster
  Date : 2019-11-11
  URL : https://github.com/xoopscube/xcl/

  -------------------- -------------------- -------------------- -------------------- ADMIN DASHBOARD */

  /**
   * Remove html class='no-js'
   * Show Color Mode Selection
   */

  document.documentElement.classList.remove('no-js');

  /** ---------- ---------- ---------- ---------- ---------- Render Settings
   *
   * Get the value of the current viewport by using the global variable
   * Set the consistent and correct sizing for Viewport units with a
   * CSS custom variable '--vh'
   * @param {HTMLELement} element=document.documentElement
   * @param window.innerHeight
   * @param vh='--vh'
   */

    // Set property vh
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);

    window.addEventListener('resize', () => {

      let vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);

    });

    // Request Full Screen
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

    // Exit Full Screen
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

    // Lock Screen Orientation
    function lockScreen(orientation) {

      fullScreen();
      screen.orientation.lock(orientation);

    }

    /** ---------- ---------- ---------- ---------- ---------- Render SVG
     *
     * Replace < img > with < svg >
     *
     * Get the classname property of object < image >
     * Get the element SVG
     * Remove the element SVG unused attributes
     * Set element SVG inline
     * Set element with a new className property
     * @param   {Object} img
     * @param   {Id} imgID
     * @param   {ClasseName} img.class='svg'
     * @param   {imgURL} img src='ui-icon-*name*.svg'
     * @returns {SVG} svg class="svg-ui-icon"
     *
     * !TODO
     * Output svg with custom class="svg-ui-icon"
     * and cache all icons or make a single sprite
     */
    $('img.svg').each(function(){

      var $img      = $(this);
      var imgID     = $img.attr('id');
      var imgClass  = $img.attr('class');
      var imgURL    = $img.attr('src');

      $.get(imgURL, function(data) {

        // Find image with class"svg"
        var $svg  = $(data).find('svg');

        if(typeof imgID !== 'undefined') {
            $svg  = $svg.attr('id', imgID);
        }

        if(typeof imgClass !== 'undefined') {
            // SVG inline with ClassName='svg-ui-icon'
            $svg  = $svg.attr('class', imgClass+'-ui-icon');
        }

        // Remove the element SVG unused attributes
        $svg = $svg.removeAttr('xmlns:a');
        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
        }

        $img.replaceWith($svg);

      }, 'xml');

    });


  /** ---------- ---------- ---------- ---------- ---------- Document Ready
   *
   * UI Navigation elements
   * Block & Module Management switch status
   * Alert user of Unsaved Changes before unload
   */

  $(document).ready(() => {

    sideNavControl();
    mobileNavControl();

  /** ---------- ---------- ---------- ---------- ---------- Management switch status
   *
   * Block and Module Management
   * Switch card block color on change
   */

  $('input[name^=uninstall]').on('change', function() {

    $(this).parent('.ui-checkbox').next('a').toggleClass('ui-update-change');

    // Switch only the svg background !
    // $(this).closest(".ui-card-block").find('.ui-card-block-image').toggleClass('ui-update-change');

    // Switch color of elements: <a> (affects border bottom), svg icon and text !
    $(this).closest(".ui-card-block").find('.ui-block-type').toggleClass('ui-update-change');

    // alert('Clik <{$smarty.const._AD_LEGACY_LANG_UPDATE}> to apply changes!');

  });


  // !TODO merge block and module switch

    // Module Management State Switch
    $('input[name^=isactive]').on('change', function() {

      $(this).parent('.ui-checkbox').next('a').toggleClass('ui-update-change');
      $(this).closest(".ui-card-block").find('.ui-card-block-image,.ui-module-state').toggleClass('ui-update-change');

      // alert('Clik <{$smarty.const._AD_LEGACY_LANG_UPDATE}> to apply changes!');

    });


    /** ---------- ---------- ---------- ---------- ---------- Alert Unsaved Changes
     *
     * Alert user of unsaved changes to form before unload !
     */

    var unsaved = false;

    // Alert to bind the event before unload page
    /* $(window).bind('beforeunload', function() {
      if(unsaved){
        // Most modern browsers (Chrome 51+, Safari 9.1+ etc) ignore custom messages and only display a generic message
        return "You have unsaved changes on this page. Do you want to <{$smarty.const._AD_LEGACY_LANG_UPDATE}> or discard your changes and leave this page?";
      }
    }); */

    // Triggers change in all input fields including text type
    $(document).on('change', ':input', function(){

      unsaved = true;

    });

    // Submit button exception
    $('input[type="submit"]').click(function() {

      unsaved = false;

    });

    function unloadPage(){

      // Most modern browsers (Chrome 51+, Safari 9.1+ etc) ignore custom messages and only display a generic message
      if(unsaved){
          return "You have unsaved changes on this page. Do you want to <{$smarty.const._AD_LEGACY_LANG_UPDATE}> or discard your changes and leave this page?";
      }

    }

    window.onbeforeunload = unloadPage;

  });


  /** ---------- ---------- ---------- ---------- ---------- Navigation elements
   *
   * Layout Navigation
   * sideNavControl();
   * userDropdownMenu();
   * mobileNavControl();
   */

  const MAIN_LAYOUT     = $('.grid');
  const MAIN_SCROLL     = 'scrollbar';

  const MOBILE_ACTIVE   = '.nav-mobile';

  const SIDE_NAV        = $('.nav-aside');
  const SIDE_ACTIVE     = 'nav-aside-active';

  const userMenu             = $('.nav-user-control');

  const sideNavBlock       = $('.nav-block'); // console.log('sideNavBlock: ', sideNavBlock);
  const SIDE_MENU_BLOCK_OPEN  = 'nav-block-open';
  const SIDE_MENU_BLOCK_CLOSE = 'nav-block-close';

  // Function Toggle Class
  function toggleClass(el, className) {

    if (el.hasClass(className)) {
      el.removeClass(className);
    } else {
      el.addClass(className);
    }

  }


  // Function Side Nav Control
  function sideNavControl() {

    sideNavBlock.each((i, sideMenuTitleToggle) => {

      $(sideMenuTitleToggle).on('click', (e) => {

        const SIDE_MENU_LINK = $(sideMenuTitleToggle).siblings();

        // Toggle class of side menu title
        if (sideMenuTitleToggle) {
          toggleClass($(sideMenuTitleToggle), SIDE_MENU_BLOCK_OPEN);
        }

        // Switch view of side menu
        if (SIDE_MENU_LINK && SIDE_MENU_LINK.length === 1) {
          toggleClass($(SIDE_MENU_LINK), SIDE_MENU_BLOCK_CLOSE);
        }

      });

    });

  }

  // Function toggle nav-aside
  function mobileNavControl() {

    $(MOBILE_ACTIVE).on('click', function(e) {

      console.log('clicked mobile control'); // Check

      toggleClass($(MOBILE_ACTIVE),'nav-mobile-close');
      toggleClass(SIDE_NAV, SIDE_ACTIVE);
      toggleClass(MAIN_LAYOUT, MAIN_SCROLL);

    });

  }


 /** ---------- ---------- ---------- ---------- ---------- Web Storage API
  *
  * sessionStorage : data is stored until the browser (or tab) is closed.
  * localStorage   : data with no expiration date until cleared by JS or Browser Cache
  * Source :
  * https://developer.mozilla.org/en-US/docs/Web/API/Web_Storage_API
  * https://developer.mozilla.org/en-US/docs/Web/CSS/@media/prefers-color-scheme
  *
  */

  // Local Storage
  // Get the current timestamp and print it to the console
  // const now = new Date(); console.log(now);

  /**
   * Set constants for user color scheme
   * Color mode key
   */
  const UI_STORAGE_KEY    = 'user-color-scheme';
  const UI_COLOR_MODE_KEY    = '--color-mode';

  const uiColorModeText    = document.querySelector('.ui-color-mode-label');
  const uiColorModeSwitch  = document.querySelector('.ui-color-mode-switch');


 /**
  * Get property value from CSS
  * getComputedStyle() method returns an object containing the values of all CSS properties of an element
  * getPropertyValue() method is used to return the value of the CSS property declared in the declaration block.
  * Syntax: object.getPropertyValue(propertyname)
  *
  * @param   {HTMLELement} element=document.documentElement
  * @param   {String} propertyKey='string'
  * @returns {*}
  *
  * Document Object Model (DOM) Level 2 Style Specification, Section 2.2 :
  * https://www.w3.org/TR/2000/REC-DOM-Level-2-Style-20001113/css.html
  *
  * Note:
  * Access properties with bracket notation ex.: style['ui-color-mode']
  * It is defined in the runtime specification of JavaScript (ECMAScript)
  * and can use variables (string) to access properties in an object
  * Syntax: arrayName[element]
  */
 const getCSSProperty = (propertyKey) => {

   let response = getComputedStyle(document.documentElement).getPropertyValue(propertyKey);

   // String trim() removes whitespace
   if (response.length) {
     response = response.replace(/\'|"/g, '').trim();
   }

   // Return string
   return response;

 };

 /**
  * Localstorage set color mode 'light'|'dark'
  * Fallback to CSS color media query
  */
 const setColorMode = selectColorMode => {

   let userColorMode = selectColorMode || localStorage.getItem(UI_STORAGE_KEY);

   if(userColorMode) {
     document.documentElement.setAttribute('data-color-scheme', userColorMode);
     setLabel(userColorMode);
   }
   else {
     setLabel(getCSSProperty(UI_COLOR_MODE_KEY));
   }

 }

 /**
  * Get current color mode, switch and store
  */
 const switchColorMode = () => {

   let userColorMode = localStorage.getItem(UI_STORAGE_KEY);

   switch(userColorMode) {

     case null:
       userColorMode = getCSSProperty(UI_COLOR_MODE_KEY) === 'dark' ? 'light' : 'dark';
       break;

     case 'light':
       userColorMode = 'dark';
       break;

     case 'dark':
       userColorMode = 'light';
       break;

   }

   localStorage.setItem(UI_STORAGE_KEY, userColorMode);

   return userColorMode;

 }

 /**
  * Set label and switch color mode
  */
 const setLabel = userColorMode => {

   uiColorModeText.innerText = `${userColorMode === 'dark' ? 'light' : 'dark'} mode`;


 }

 /**
  * Set user color mode selection
  */
 uiColorModeSwitch.addEventListener('change', evt => {

   evt.preventDefault();

   setColorMode(switchColorMode());

 });

 setColorMode();