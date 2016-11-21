<?php

/**
 * Adds Contact Phone Widget.
 */
class Thim_Contact extends WP_Widget {

	// constructor
	function __construct() {
		parent::__construct(
			'thim_contact',
			__( 'Thim: Contact', 'thim' ),
			array( 'description' => __( 'Display contact information.', 'thim' ), )
		);
	}

	// widget form creation
	function form( $instance ) {

		// Check values
		if ( $instance ) {
			$title     = $instance['title'];
			$text      = $instance['text'];
			$email     = $instance['email'];
			$emailname = $instance['emailname'];
		} else {
			$title     = 'Call us: ';
			$text      = '+00 123 456 789';
			$email     = 'or email: ';
			$emailname = 'hello@thimpress.com';
		}
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Contact Title', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Phone number:', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'Email Contact Tittle', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'emailname' ) ); ?>"><?php esc_html_e( 'Email Name', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'emailname' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'emailname' ) ); ?>" type="text" value="<?php echo esc_attr( $emailname ); ?>" />
		</p>
		<?php
	}

	// update widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		// Fields
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['text']      = strip_tags( $new_instance['text'] );
		$instance['email']     = strip_tags( $new_instance['email'] );
		$instance['emailname'] = strip_tags( $new_instance['emailname'] );
		return $instance;
	}

	// display widget
	function widget( $args, $instance ) {
		extract( $args );

		echo ent2ncr($args['before_widget']);
		if ( !empty( $instance['title'] ) ) {
			echo '<span class="call_us_title">' . esc_html( $instance['title'] ) . '</span>';
		}

		if ( !empty( $instance['text'] ) ) {
			echo '<span class="phone_number">' . esc_html( $instance['text'] ) . '</span>';
		}

		if ( !empty( $instance['email'] ) ) {
			echo '<span class="email_title">' . esc_html( $instance['email'] ) . '</span>';
		}

		if ( !empty( $instance['emailname'] ) ) {
			echo '<a class="email_name" href="mailto:' . esc_attr( $instance['emailname'] ) . '" target="_top">' . esc_html( $instance['emailname'] ) . '</a>';
		}
		echo ent2ncr( $args['after_widget']);
	}


}

// Register and load the widget
function thim_register_widget_contact() {
	register_widget( 'Thim_Contact' );
}

add_action( 'widgets_init', 'thim_register_widget_contact' );


