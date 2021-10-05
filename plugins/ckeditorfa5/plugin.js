(function(CKEDITOR, drupalSettings) {
  CKEDITOR.plugins.add('ckeditorfa5', {
    icons:'ckeditorfa5',
    init: function(editor){
      editor.addCommand('ckeditorfa', new CKEDITOR.dialogCommand('ckeditorFaDialog',{ allowedContent:'span(!fa-*)' }) );
      editor.ui.addButton('ckeditorfa', {
        label:'FontAwesome5 icons',
        command:'ckeditorfa',
        toolbar:'insert',
        icon: 'ckeditorfa5'
      });
      CKEDITOR.dialog.add('ckeditorFaDialog', this.path + 'dialogs/ckeditorfa.js');
      CKEDITOR.document.appendStyleSheet(this.path + 'css/ckeditorfa.css');
      CKEDITOR.document.appendStyleSheet(`/${drupalSettings.themePath}/css/fontawesome/all.min.css`);
      CKEDITOR.dtd.$removeEmpty['span'] = false;
    }
  });
})(CKEDITOR, drupalSettings);
