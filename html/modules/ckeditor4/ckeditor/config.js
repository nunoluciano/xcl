/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://docs.ckeditor.com/#!/api/CKEDITOR.config

	// Define changes to default configuration here. For example:
	// config.language = 'en';
	// config.uiColor = '#AADC6E';

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];


	

/* 	config.placeholder_select = {
		placeholders: ['FirstName', 'LastName', 'EmailAddress', 'eClasse'],
	
		format : '@@some-token@@'
	}; */

/* 	editor.balloonToolbars.create ( {
		buttons: 'Link,Unlink,Image',
		widgets: 'image'
	} ); */
/* 	config.skin = 'moono-dark';
	config.extraPlugins='codesnippet,inserthtmlfile';
	config.codeSnippet_theme = 'monokai_sublime';
	config.codeSnippet_languages = {
		javascript: 'JavaScript',
		php: 'PHP'
	}; */

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Save,NewPage,Flash';

	// Set the most common block elements.
	//config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	//config.removeDialogTabs = 'image:advanced;link:advanced';
};
