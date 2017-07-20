/**
 * Functionality specific to Twenty Thirteen.
 *
 * Provides helper functions to enhance the theme experience.
 */

( function( $ ) {

/**
	 * Enables menu toggle for small screens.
	 */
	( function() {
		var nav = $( '#access' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '.menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click.twentythirteen', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();


// Remove WPRM on not Book New pages
var url = window.location.href;
if (url.search("book-communicate-to-influence") < 0) { 
	$("#wprmenu_bar").attr('style', 'display: none !important');
	$("html").attr('style', 'padding-top: 0 !important');
}


})( jQuery );
