<?php
/*
Plugin Name: Humanable image size names
Description: It is a WordPress plugin that allows themes and other plugins to translate image size names into a readable form that is displayed using the Crop Thumbnails plugin.
Version: 1.0.0
*/

if (!function_exists('get_plugins')) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if (is_plugin_active('crop-thumbnails/crop-thumbnails.php')) {
	function sizes_filter($sizes) {

		$translations = apply_filters( 'humanable_image_size_names', []);

		foreach ($sizes as &$size) {

			foreach ($translations as $key => $value) {

				if ($size['name'] === $key) {
					$size['name'] = $value;
					break;
				}
			}
		}

		return $sizes;
	}
	add_filter( 'crop_thumbnails_image_sizes', 'sizes_filter' );
}
