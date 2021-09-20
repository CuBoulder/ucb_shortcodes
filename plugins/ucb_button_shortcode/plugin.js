(function(CKEDITOR) {
  CKEDITOR.plugins.add('ucb_button_shortcode', {
    icons: 'ucb_button_shortcode',
    init: function( editor ){
      editor.addCommand( 'ucb_button_shortcode', new CKEDITOR.dialogCommand( 'button_generatorDialog' ) );
      if( editor.ui.addButton ){
        editor.ui.addButton( 'ButtonGenerator', {
          label: 'Button', //this is the tooltip text for the button
          command: 'ucb_button_shortcode',
          icon: 'ucb_button_shortcode'
         });
      }

      // defines the dialog window
      CKEDITOR.dialog.add( 'button_generatorDialog', this.path + 'dialogs/button_generator.js' );
    }
  });
})(CKEDITOR);