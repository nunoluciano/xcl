// HOW TO USE USE X-UTILS

// 1 - 🔺 Place any jQuery/helper plugins above document ready 🔺
// 2 - 🔻 Place any instance in document ready function bellow 🔻
//
// Summary
// - Avoid Console Errors
// - Reusable Toggle
// - Context Menu
// - jQuery Scroll Smooth
// - Nav to Top



// Avoid `console` errors in browsers that lack a console.
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



// 1 - 🔺 Place any jQuery/helper plugins above document ready 🔺
// 2 - 🔻 Place any instance in document ready function bellow 🔻


$(document).ready(function () {

    /**
     * Reusable Dropdown Menu
     *
     * How to use
     * 1) Add an element with class="xdropdown"
     * 2) Add a link with class="xdropdown-toggle"
     * 3) Add an element with class="xdropdown-content"
     *
     <div class="xdropdown">
        <a href="#" class="xdropdown-toggle"> Menu</a>
        <div class="xdropdown-content">
        <a href="#">1HTML</a>
        </div>
     </div>
     */
	$( ".xdropdown" ).on( "click", ".xdropdown-toggle", function(event) {
        event.preventDefault();
		$('.xdropdown').removeClass('xopen');
		$(this).parent().toggleClass('xopen');
	});

    $(document).on("click", function(event){
        var $trigger = $(".xdropdown");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            $(".xdropdown").removeClass("xopen");
        }
    });


    /**
     * Reusable View Switch
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
     * Reusable Scroll Smooth
     *
     * How To Use
     * jQuery Scroll Smooth selects all links with hashes
     */
    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
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
     * Add a div with id=navtop
     */
        var btop = $('#navtop');
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








