/**
 * @namespace
 * @desc Handles video management.
 */

const Video = (function() {
	/**
	 * @memberOf Video
	 * @access public
	 * @desc Initialize Video module.
	 * @constant {Object}
	 */

	function initialize() {
		$('.play').click(function(event){
			event.preventDefault();
			$(".video-js").append('<iframe width="560" height="315" src="https://www.youtube.com/embed/2xs4dAXzw40?autoplay=1&amp;rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');
			$(this).hide();
		});
	}

	return {
		initialize: initialize
	};
})(jQuery);
