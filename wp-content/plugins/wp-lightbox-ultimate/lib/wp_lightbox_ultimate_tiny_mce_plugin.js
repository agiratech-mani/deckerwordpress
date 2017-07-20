(function() {
tinymce.create('tinymce.plugins.WPLightboxUltimate', {
init : function(ed, url) {
// Register commands, mceWPeStore is name of command to be executed.
ed.addCommand('mceWPLightboxUltimate', function() {
ed.windowManager.open({
file : url + '/wp_lightbox_ultimate_shortcode_insert_window.php',
height : 160 + parseInt(ed.getLang('wplightboxultimate.delta_height', 0)),
width : 510,
inline : 1
}, {
plugin_url : url
});
});

// Register buttons,this is the button will be displayed on wordpress rich editor
ed.addButton('WpLightboxUltimateButton', {title : 'WP Lightbox Ultimate Shortcodes', cmd : 'mceWPLightboxUltimate', image:url + '/lib_images/wp_lightbox_ultimate_tiny_mce_button.png'});
},

getInfo : function() {
return {
longname : 'WP Lightbox Ultimate',
author : 'Tips & Tricks HQ',
authorurl : 'http://www.tipsandtricks-hq.com',
infourl : 'http://www.tipsandtricks-hq.com',
version : tinymce.majorVersion + "." + tinymce.minorVersion
};
}
});

// Register plugin
tinymce.PluginManager.add('wplightboxultimate', tinymce.plugins.WPLightboxUltimate);
})();