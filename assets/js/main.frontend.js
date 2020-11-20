(function(window, $, undefined) {

	$(function() {

		wpcf7_wysiwyg_init_all();

	});

	function wpcf_wysiwyg_update_content(editor_id, content) {
		$('textarea.wysiwyg#' + editor_id).text(content);
	}

	function wpcf7_wysiwyg(id) {

		wp.editor.initialize(id, {
            tinymce: {
            	wpautop: 	true,
            	plugins: 	'charmap colorpicker compat3x directionality fullscreen hr image lists media paste tabfocus textcolor wordpress wpautoresize wpdialogs wpeditimage wpemoji wpgallery wplink wptextpattern wpview',
            	toolbar1: 	'formatselect bold italic | bullist numlist | blockquote | alignleft aligncenter alignright | link unlink | wp_more fullscreen wp_adv',
            	toolbar2: 	'strikethrough, hr, forecolor, pastetext, removeformat, charmap, outdent, indent, undo, redo, wp_help',
            	setup: function(editor) {
 					editor.on('keyup', function(e) {
						wpcf_wysiwyg_update_content(editor.id, editor.getContent());
					});
            	}
        	},
        	quicktags: true,
        	mediaButtons: true
        });

	}

	function wpcf7_wysiwyg_init(id) {

		wp.editor.remove(id);
		wpcf7_wysiwyg(id);

	}

	function wpcf7_wysiwyg_init_all() {

		$('.wpcf7-wysiwyg-container').each(function() {

			if ( $(this).find('textarea.wysiwyg').length > 0 ) {

				wp.editor.remove($(this).find('textarea.wysiwyg').attr('id'));
				wpcf7_wysiwyg($(this).find('textarea.wysiwyg').height('300px').attr('id'));

			}

		});

	}

	// Expose functions
	window.wpcf7_wysiwyg_init 		= wpcf7_wysiwyg_init;
	window.wpcf7_wysiwyg_init_all 	= wpcf7_wysiwyg_init_all;

})(window, jQuery);