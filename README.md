# Humanable image size names

It is a WordPress plugin that allows themes and other plugins to translate image size names into a readable form that is displayed using the [Crop Thumbnails](https://github.com/vollyimnetz/crop-thumbnails) plugin.

## How to use

Move the plugin folder to the *wp-content/plugins/directory*, activate the plugin in the admin panel of your site, and then use it in the code of other plugins and themes:

```php
function translate_names($names) {

	return array_merge($names, [
		'your-image-size' => _( 'Home background' ),
		'user-avatar' => _( 'Main profile photo ' ),
	]);
}
add_filter( 'humanable_image_size_names', 'translate_names' );
```
