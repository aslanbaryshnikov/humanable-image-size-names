<?php
/*
Plugin Name: Удобные названия размеров изображений
Description: Данный плагин позволяет Crop Thumbnails использовать удобные и понятные размеры изображений.
Version: 1.0.0
*/

if (!function_exists('get_plugins')) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if (is_plugin_active('crop-thumbnails/crop-thumbnails.php')) {
	function sizes_filter($sizes) {

		$translates = apply_filters( 'humanable_image_size_names', []);

		foreach ($sizes as &$size) {
			$translatedName = '';

			foreach ($translates as $key => $value) {
				if ($size['name'] === $key) {
					$translatedName = $value;
					break;
				}
			}

			if (!empty($translatedName)) {
				$size['name'] = $translatedName;
			}
		}

		return $sizes;
	}
	add_filter( 'crop_thumbnails_image_sizes', 'sizes_filter' );
}
