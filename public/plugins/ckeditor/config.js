/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

// The configuration options defined in this file will be used by CKEditor.
// For more information about the configuration options, see https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

BASE_URL = '/plugins/ckfinder/';

CKEDITOR.editorConfig = function( config ) {
	config.filebrowserBrowseUrl = BASE_URL + 'ckfinder.html',
    config.filebrowserImageBrowseUrl = BASE_URL + 'ckfinder.html?type=Images',
    config.filebrowserFlashBrowseUrl = BASE_URL + 'ckfinder.html?type=Flash'
    config.filebrowserUploadUrl =  BASE_URL + 'core/connector/php/connector.php?command=QuickUpload&type=Files',
    config.filebrowserImageUploadUrl = BASE_URL + 'core/connector/php/connector.php?command=QuickUpload&type=Images',
    config.filebrowserFlashUploadUrl = BASE_URL + 'core/connector/php/connector.php?command=QuickUpload&type=Flash'
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
