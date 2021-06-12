/**
 * X -UTILS
 *
 * How to use
 * 1 - ? Place any jQuery/helper plugins above document ready ?
 * 2 - ? Place any instance in document ready function bellow ?
 *
 * Summary
 *
 * - Avoid Console Errors
 * - jquery.cookie
 * - Alert user of unsaved changes to form before unload
 * - LocalStorage : Prefers-color-scheme
 * - Reusable slide Toggle
 * - Dropdown Menu
 * - Layout View Switch
 * - Context Menu
 * - jQuery Scroll Smooth
 * - Scroll to Top (ui-nav-top)

 */

/**
 * Avoid `console` errors in browsers that lack a console.
 */
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());



/**
 * Reusable Toggle
 *
 * How To Use
 * Call it from any clickable element with the className to display:
 * 1) HTML element (eg. input) with onclick="slideToggle('.className', this)"
 <input class="switch" type="checkbox" onclick="slideToggle('.className', this)">
 * 2) Target HTML element with the "className" and style="display:none"
 <div class="className" style="display:none">
 * </div>
 * 3) Customize : ( time, "effect", )
 slideToggle(500,"easeInOutCubic"
 */
function slideToggle(className, obj) {
    $(className).slideToggle(500,"easeInOutCubic", obj.checked );
}

/**
 * LocalStorage : Prefers-color-scheme
 * Dark or Light Theme
 *
 * How To Use
 * 1. Add to body
     <label class="theme-switch" for="checkbox">
     <input type="checkbox" id="checkbox">
     </label>
 * 2. Add to CSS :
     :root {
    --bg-color: #fec150;
    }
 * 3. Add to CSS :
     [data-theme="dark"] {
     --bg-color: #111;
     }
 * Customize the input and CSS
 */
// Get the theme switch input
const themeToggle = document.querySelector(
    '.theme-switch input[type="checkbox"]'
);
// Function to switch the theme based on input checked or not
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute("data-theme", "dark");
    } else {
        document.documentElement.setAttribute("data-theme", "light");
    }
}
// Add an event listener to switch the theme
//var themeToggle = document.getElementById('overlayBtn');
if(themeToggle){
    themeToggle.addEventListener('change', switchTheme, false);
}
//themeToggle.addEventListener("change", switchTheme, false);
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute("data-theme", "dark");

        // Set theme preference to dark
        localStorage.setItem("theme", "dark");
    } else {
        document.documentElement.setAttribute("data-theme", "light");

        // Set theme preference to light
        localStorage.setItem("theme", "light");
    }
}
// Get the theme from localStorage
const currentTheme = localStorage.getItem("theme");
// If the current local storage item can be found
if (currentTheme) {
    // Set the body data-theme attribute
    document.documentElement.setAttribute("data-theme", currentTheme);
// If the current theme is dark, set the theme toggle
    if (themeToggle && currentTheme === "dark") {

        themeToggle.checked = true;
    }
}

// 1 - ? Place any jQuery/helper plugins above document ready ?
/* ------------------------------------------------------------ */
// 2 - ? Place any instance in document ready function bellow ?


$(document).ready(function () {

    /**
     * Dropdown Menu
     *
     * How to use
     * 1) Add an element with class="ui-dropdown"
     * 2) Add a link with class="ui-dropdown-toggle"
     * 3) Add an element with class="ui-dropdown-content"
     *
     <div class="ui-dropdown">
        <a href="#" class="ui-dropdown-toggle"> Menu</a>
        <div class="ui-dropdown-content">
        <a href="#">1HTML</a>
        </div>
     </div>
     */
	$( ".ui-dropdown" ).on( "click", ".ui-dropdown-toggle", function(event) {
        event.preventDefault();
		$('.ui-dropdown').removeClass('xopen');
		$(this).parent().toggleClass('xopen');
	});

    $(document).on("click", function(event){
        var $trigger = $(".ui-dropdown");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            $(".ui-dropdown").removeClass("xopen");
        }
    });


    /**
     * Layout View Switch
     *
     * How To Use
     * 1) Add two buttons or icons
     * Button icon with id=list
     * Button icon with id=grid
     * 2) Add the class to change show/hide
     * #id or .class
     * */

    $('#list').click(function (event) {
        event.preventDefault();
        //$('#webphoto_box_photo_a').addClass('list-group-item');
        $('#display-grid').hide();
        $('#display-list').show();
    });
    $('#grid').click(function (event) {
        event.preventDefault();
        // $('#webphoto_box_photo_b').removeClass('list-group-item');
        // $('#webphoto_box_photo_a').addClass('grid-group-item');
        $('#display-list').hide();
        $('#display-grid').show();
    });


    /**
     * Scroll Smooth
     *
     * How To Use
     * jQuery Scroll Smooth selects all links with hashes
     */
    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .not('a[href*="#tab"]') // prevent tab links to scroll
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });

    /**
     * Scroll To Top
     *
     * How To Use
     * 1. Add a div with id=ui-nav-top
     * 2. Customize CSS
     */
        var btop = $('#ui-nav-top');
        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btop.addClass('show');
            } else {
                btop.removeClass('show');
            }
        });
        btop.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, '300');
        });


        $("#arrow_container").click( function(event){
            event.preventDefault();
            if ( $(this).hasClass("isDown") ) {
                $("#nav-admin").stop().animate({marginTop:"-100px"}, 200);
            } else {
                $("#nav-admin").stop().animate({marginTop:"0px"}, 200);
            }
            $(this).toggleClass("isDown");
            return false;
        });


//--- document ready function

});
