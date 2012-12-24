(function($) {

/**
 * jQuery debugging helper.
 *
 * Invented for Dreditor.
 *
 * @usage
 *   $.debug(var [, name]);
 *   $variable.debug( [name] );
 */
jQuery.extend({
  debug: function () {
    // Setup debug storage in global window. We want to look into it.
    window.debug = window.debug || [];

    args = jQuery.makeArray(arguments);
    // Determine data source; this is an object for $variable.debug().
    // Also determine the identifier to store data with.
    if (typeof this == 'object') {
      var name = (args.length ? args[0] : window.debug.length);
      var data = this;
    }
    else {
      var name = (args.length > 1 ? args.pop() : window.debug.length);
      var data = args[0];
    }
    // Store data.
    window.debug[name] = data;
    // Dump data into Firebug console.
    if (typeof console != 'undefined') {
      console.log(name, data);
    }
    return this;
  }
});
// @todo Is this the right way?
jQuery.fn.debug = jQuery.debug;

})(jQuery);
;
(function($) {
	Drupal.behaviors.colorboxNode = {
		// Lets find our class name and change our URL to
		// our defined menu path to open in a colorbox modal.
		attach : function(context, settings) {
			$('a.colorbox-node', context).once('colorboxNode').each(function() {
				var href = $(this).attr('href');
				// Create an element so we can parse our a URL no matter if its internal or external.
				var parse = document.createElement('a');
				parse.href = href;
				// Lets add our colorbox link after the base path if necessary.
				var base_path = Drupal.settings.basePath;
				var pathname = parse.pathname;

				// Lets check to see if the pathname has a forward slash.
				// This problem happens in IE7/IE8
				if(pathname.charAt(0) != '/') {
					pathname = '/' + parse.pathname;
				}
				
				if(base_path != '/') {
					var link = pathname.replace(base_path, base_path + 'colorbox/');
				} else {
					var link = base_path + 'colorbox' + pathname;
				}
				// Update our href to the link containing colorbox.
				$(this).attr('href', link + parse.search);
				
				// Bind Ajax behaviors to all items showing the class.
			    var element_settings = {};
			    // Clicked links look better with the throbber than the progress bar.
			    element_settings.progress = { 'type': 'throbber' };
	
			    // For anchor tags, these will go to the target of the anchor rather
			    // than the usual location.
			    if ($(this).attr('href')) {
			    	element_settings.url = $(this).attr('href');
			    	element_settings.event = 'click';
			    }
			    var base = $(this).attr('id');
			    Drupal.ajax[base] = new Drupal.ajax(base, this, element_settings);
			});			
			
			// When using contextual links and clicking from within the colorbox
			// we need to close down colorbox when opening the built in overlay.
			$('ul.contextual-links a', context).once('colorboxNodeContextual').click(function() {
				$.colorbox.close();
			});
		}
	};
})(jQuery);
;
(function ($) {

  $(document).ready(function () {
    function stemm_phrase(event) {
      var phrase_in = $(this).attr("value");
      var url = $(this).attr("href");
      var module = $(this).attr("module");

	 // alert('module='+module+'\nphrase='+phrase_in+'\nurl='+url);
      var phrase = function(data) 
      {
        $('#phrase-out').attr('value',data.phrase_out);
      }

	// make the AJX call. 
	// If successful the function pointed to by "success" is called
      $.ajax({
        type:	"POST",
        url:	url,
	dataType: "json",
	data:	{ "js" : "1",
		  "phrase_in" : phrase_in,
		  "module" : module,
		},
	success: phrase,
        error: function (xmlhttp,textStatus,errorThrown) {
                 alert('module='+module+
                      '\nphrase='+phrase_in+
                      '\nurl='+url+
                      '\n\nerror='+textStatus + 
                      '\nstatus='+ xmlhttp.status + 
                      '\nreadyState='+ xmlhttp.readyState);
      		 return false;
               }
      });
	// prevent the browser from handling the event
      return false;
    };

    $('#phrase-in').bind('change', stemm_phrase);

    $('#phrase-in').bind('keydown keypress', function(event){
	// when ENTER is pressed then stemm_phrase is called twice. But why?
	// When the call to trigger() is commented out, 
	// then stemm_phrase is called not at all
        if ( event.keyCode == 13 ) {	// enter key pressed
	  $('#phrase-in').trigger('change');
          event.preventDefault();
	  event.stopPropagation();
      	  return false;
	}
    });

  });
})(jQuery);
;
