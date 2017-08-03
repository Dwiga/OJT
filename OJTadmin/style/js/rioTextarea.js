(function( $, window, document, undefined ) {
	$.fn.rioTextarea = function( options ) {
		var settings = $.extend({
			width: '100%',
			height: '200px'
		}, options);

		return this.each(function() {
			var $this = $(this),
				wrapTexteditor = $this.hide(),
				container = $('<div/>', {
					css: {
						width: settings.width,
						height: settings.height,
						border: '1px solid #ccc'
					}
				});
			wrapTexteditor.after(container);
			
			var editor = $('<iframe/>', {
				id: $this.attr('id'),
				name: $this.attr('name'),
				frameborder: '0',
				width: settings.width
			}).appendTo(container).get(0);
			editor.contentWindow.document.open();
			editor.contentWindow.document.close();
			editor.contentWindow.document.designMode = 'on';

			var frameEditor = editor.contentWindow.document.body;
			if ( $this.val() !== '' ) {
				frameEditor.innerHTML = $this.val();
			}
			frameEditor.onkeyup = applyToTextarea;
			frameEditor.onmouseleave = applyToTextarea;

			var buttonPanel = $('<div/>', {
				'class': 'rioBtnPanel',
				css: {
					width: settings.width,
					padding: '5px',
					background: '#f5f5f5',
					borderBottom: '1px solid #ccc'
				}
			}).prependTo(container);

			var iBold = $('<a/>', {
				'class': 'btn btn-sm btn-default',
				href: '#',
				title: 'Bold/Tebalkan',
				html: '<i class="fa fa-fw fa-bold"></i>',
				css: {
					marginRight: '5px'
				},
				data: {
					commandName: 'bold'
				},
				click: execCommand
			}).appendTo(buttonPanel);

			var iItalic = $('<a/>', {
				'class': 'btn btn-sm btn-default',
				href: '#',
				title: 'Italic/Miringkan',
				html: '<i class="fa fa-fw fa-italic"></i>',
				css: {
					marginRight: '5px'
				},
				data: {
					commandName: 'italic'
				},
				click: execCommand
			}).appendTo(buttonPanel);

			var iUnderline = $('<a/>', {
				'class': 'btn btn-sm btn-default',
				href: '#',
				title: 'Underline/Garis Bawah',
				html: '<i class="fa fa-fw fa-underline"></i>',
				css: {
					marginRight: '5px'
				},
				data: {
					commandName: 'underline'
				},
				click: execCommand
			}).appendTo(buttonPanel);

			var iOlist = $('<a/>', {
				'class': 'btn btn-sm btn-default',
				href: '#',
				title: 'List Number',
				html: '<i class="fa fa-fw fa-list-ol"></i>',
				css: {
					marginRight: '5px'
				},
				data: {
					commandName: 'InsertOrderedList'
				},
				click: execCommand
			}).appendTo(buttonPanel);

			var iUlist = $('<a/>', {
				'class': 'btn btn-sm btn-default',
				href: '#',
				title: 'List Style',
				html: '<i class="fa fa-fw fa-list-ul"></i>',
				css: {
					marginRight: '5px'
				},
				data: {
					commandName: 'InsertUnorderedList'
				},
				click: execCommand
			}).appendTo(buttonPanel);

			var iLink = $('<a/>', {
				'class': 'btn btn-sm btn-default',
				href: '#',
				title: 'Insert Link/Anchor',
				html: '<i class="fa fa-fw fa-link"></i>',
				css: {
					marginRight: '5px'
				},
				data: {
					commandName: 'CreateLink'
				},
				click: execCommandLink
			}).appendTo(buttonPanel);

			var iUnlink = $('<a/>', {
				'class': 'btn btn-sm btn-default',
				href: '#',
				title: 'Unlink/Hapus Anchor',
				html: '<i class="fa fa-fw fa-unlink"></i>',
				css: {
					marginRight: '5px'
				},
				data: {
					commandName: 'Unlink'
				},
				click: execCommandUnlink
			}).appendTo(buttonPanel);

			/* function instal textarea editor */
			function execCommand(e) {
				$(this).toggleClass('active');
				var contentWindow = editor.contentWindow;
				contentWindow.focus();
				contentWindow.document.execCommand($(this).data('commandName'), false, this.value || '');
				contentWindow.focus();
				return false;
			}

			function execCommandLink(e) {
				var contentWindow = editor.contentWindow,
					linkURL = prompt('Silakan masukkan link URL', 'http://');
				contentWindow.focus();
				contentWindow.document.execCommand($(this).data('commandName'), false, linkURL);
				contentWindow.focus();
				return false;
			}

			function execCommandUnlink(e) {
				var contentWindow = editor.contentWindow;
				contentWindow.focus();
				contentWindow.document.execCommand($(this).data('commandName'), false, null);
				contentWindow.focus();
				return false;
			}

			function applyToTextarea() {
				var self = this.innerHTML;
				$this.val( self );
			}
		});
	};
})(jQuery);