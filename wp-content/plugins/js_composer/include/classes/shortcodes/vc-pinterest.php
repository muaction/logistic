<?php

class WPBakeryShortCode_VC_Pinterest extends WPBakeryShortCode {
	protected function contentInline( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type' => 'horizontal'
		), $atts ) );

		$css = isset( $atts['css'] ) ? $atts['css'] : '';
		$el_class = isset( $atts['el_class'] ) ? $atts['el_class'] : '';

		$class_to_filter = 'wpb_googleplus vc_social-placeholder wpb_content_element vc_socialtype-' . $type;
		$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

		return '<div class="' . $css_class . '"></div>';
	}
}