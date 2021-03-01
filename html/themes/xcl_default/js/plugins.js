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

// Place any jQuery/helper plugins in here.
/** ---------- ---------- ---------- ---------- ---------- Reusable Toogle
 * Hoow To Use
 * - Call it from any clickcable element with the className to display:
 * onclick="slideToggle('.className', this)"
 * - Set the className display to :none
 * <div class="className" style="display:none">
 * </div>
 * Customize : ( time, "effect", )
 */
function slideToggle(className, obj) {
  $(className).slideToggle(500,"easeInOutCubic", obj.checked );
}
