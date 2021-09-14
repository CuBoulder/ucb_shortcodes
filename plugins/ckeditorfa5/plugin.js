CKEDITOR.plugins.add('ckeditorfa5',{
icons:'ckeditorfa5',
init:function(editor){
editor.addCommand('ckeditorfa', new CKEDITOR.dialogCommand('ckeditorFaDialog',{allowedContent:'span(!fa-*)'}));
editor.ui.addButton('ckeditorfa',{label:'FontAwesome5 icons',command:'ckeditorfa',toolbar:'insert',icon: 'ckeditorfa5'});
CKEDITOR.dialog.add('ckeditorFaDialog', this.path + 'dialogs/ckeditorfa.js');
CKEDITOR.document.appendStyleSheet(this.path + 'css/ckeditorfa.css');
CKEDITOR.document.appendStyleSheet("/themes/custom/ucb2021_base/css/fontawesome/fontawesome.min.css");
CKEDITOR.document.appendStyleSheet("/themes/custom/ucb2021_base/css/fontawesome/brands.min.css");
CKEDITOR.document.appendStyleSheet("/themes/custom/ucb2021_base/css/fontawesome/solid.min.css");
CKEDITOR.dtd.$removeEmpty['span'] = false;
}
});