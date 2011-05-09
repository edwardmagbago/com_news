
window.addEvent('domready', function() {
	var uploader = new FancyUpload2($('uploader-progress'), $('uploader-list'), {
		url: Docman.uploader.config.url,
		data: {
			'action': 'add',
			'_token': Docman.uploader.config.token
		},
		method: 'POST',
		fieldName: 'file',
		path: Docman.uploader.config.path,
		typeFilter: Docman.uploader.config.typeFilter,
		target: 'browse-files',

		fileSizeMin: 0,

		onLoad: function() {
			$('uploader-status').setStyle('display', 'block');
			$('uploader-classic').setStyle('display', 'none');

			// We relay the interactions with the overlayed flash to the link
			this.target.addEvents({
				click: function() {
					return false;
				},
				mouseenter: function() {
					this.addClass('hover');
				},
				mouseleave: function() {
					this.removeClass('hover');
					this.blur();
				},
				mousedown: function() {
					this.focus();
				}
			});

			$('clear-files').addEvent('click', function() {
				uploader.remove();
				return false;
			});

			$('submit-form').addEvent('click', function() {
				$('uploader-progress').setStyle('display', 'block');
				uploader.start();
				return false;
			});
		},

		onSelect: function() {
			$('upload-files-container').setStyle('display', 'block');
		},
		/**
		 * Is called when files were not added, "files" is an array of invalid File classes.
		 *
		 * This example creates a list of error elements directly in the file list, which
		 * hide on click.
		 */
		onSelectFail: function(files) {
			files.each(function(file) {
				new Element('li', {
					'class': 'validation-error',
					html: file.validationErrorMessage || file.validationError,
					title: MooTools.lang.get('FancyUpload', 'removeTitle'),
					events: {
						click: function() {
							this.destroy();
						}
					}
				}).inject(this.list, 'top');
			}, this);
		},
		onFileSuccess: function(file, response) {
			var json = JSON.decode(response, true) || {};
			if (json.status) {
				file.element.addClass('file-success');
				file.info.set('html', '<strong>Image was uploaded:</strong> '+json.file.path+'</em>');
			} else {
				file.element.addClass('file-failed');
				var error = json.error ? json.error : 'Unknown error';
				file.info.set('html', '<strong>An error occurred:</strong> ' + error);
			}
		}
	});
	Docman.uploader = uploader;
});