# ucb_shortcodes
A set of CKEditor plugins to insert short codes

## Included shortcodes
- Button
- Font Awesome Icon

## Installation
This module is installed with the profile.

## Development
Extending CKEditor in broken up into two parts, the CKEditor plugin and the Drupal plugin. The Drupal plugin connects the CKEditor plugin to the site.
We are using CKEditor 4, so making plugins must adhere to the [CKEditor 4 API](https://ckeditor.com/docs/ckeditor4/latest/guide/index.html).

### CKEditor Plugin
Plugins for CKEditor follow a specific directory structure. You can add new plugins to the `plugins` directory.
````
plugin_name
|_ dialogs         // This is where to define modals for the plugin
|_ css             // Optional styles for this plugin. Styles are applied to the modal dialog only
|_ icons           // Contains the button icon that appears on the editor toolbar
|_ plugin.js       // This defines the plugin
````
To create a plugin, read this [Plugin example](https://ckeditor.com/docs/ckeditor4/latest/guide/plugin_sdk_sample_1.html). You don't have to add the `config.extraPlugins` part since Drupal will do that.

> The name of the icon image **MUST** match the name of the plugin.
> <br>
> **Example:**
> <br>
> The ckeditorfa5 plugin contains an icon called ckeditorfa5.png.
> <br>
> In the call to `editor.ui.addButton()`, the icon option is also named ckeditorfa5 without the file extension.

### Drupal Plugin
Plugins will extend the `CKEditorPluginBase` class. You can add a new plugin in the `src/Plugin/CKEditorPlugin` directory. Each file must have annotations above the class in order for Drupal to find it.

You can copy an existing Plugin file to create your own. The two important methods in this class are `getFile()` and `getButtons()`. The former will tell Drupal where the actual CKEditor plugin is. The latter will add the button to the editor toolbar.

> The value for the id in the class annotation MUST match the name of the CKEditor plugin name.
> <br>
> **Example:**
> <br>
> The ckeditorfa5 plugin defines a new plugin with `CKEDITOR.plugins.add('ckeditorfa5',{})`
> <br>
> In the IconShortcode.php annotation, the id has the value "ckeditorfa5"

> In the `getButtons()` return array, the key in the associative array **MUST** match the button name in the CKEditor plugin.
> <br>
> **Example:**
> <br>
> In IconShortcode.php, the key name is *ckeditorfa*. In ckedortorfa5/plugin.js, the first argument in the call to `editor.ui.addButton()` is also
> called *ckeditorfa*

---

### Custom Filters
Filters are applied to the text before it's rendered to the page. You can add new filters in the `src/Plugin/Filter` directory.

There is one method, `process()` where the text is transformed. Make sure to return a new string and not the `$text` variable that's passed into the function. If you're adding classes or additional markup, be sure to add it to the *Allowed HTML Tags* filter option on the text editor config page.

### Stylesheets
To add CSS to the text editor itself, add CSS files to the `ckeditor_sylesheets` key in [ucb2021_base.info.yml](https://github.com/CuBoulder/ucb2021_base/blob/main/ucb2021_base.info.yml).

