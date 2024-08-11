<?php

  $ecommerce_store_elementor_color_palette_css = '';

  /*-------------- Copyright Text Align-------------------*/

	$ecommerce_store_elementor_copyright_text_align = ecommerce_store_elementor_get_option('ecommerce_store_elementor_copyright_text_align');
	$ecommerce_store_elementor_color_palette_css .='.site-footer{';
	$ecommerce_store_elementor_color_palette_css .='text-align: '.esc_attr($ecommerce_store_elementor_copyright_text_align).' !important;';
	$ecommerce_store_elementor_color_palette_css .='}';
	$ecommerce_store_elementor_color_palette_css .='
	@media screen and (max-width:575px) {
	.site-footer{';
	$ecommerce_store_elementor_color_palette_css .='text-align: center !important;';
	$ecommerce_store_elementor_color_palette_css .='} }';

  // copyright font size
	$ecommerce_store_elementor_copyright_text_font_size = ecommerce_store_elementor_get_option('ecommerce_store_elementor_copyright_text_font_size');
	$ecommerce_store_elementor_color_palette_css .='#colophon p, #colophon a , #colophon{';
	$ecommerce_store_elementor_color_palette_css .='font-size: '.esc_attr($ecommerce_store_elementor_copyright_text_font_size).'px;';
	$ecommerce_store_elementor_color_palette_css .='}';