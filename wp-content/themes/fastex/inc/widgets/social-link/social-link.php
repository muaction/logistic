<?php

/**
 * Created by PhpStorm.
 * User: Quoc
 * Date: 7/28/15
 * Time: 3:28 PM
 */
class Thim_Social_Link_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'social_link_widget',
			__( 'Thim: Social Link', 'thim' ),
			array( 'description' => __( 'Display a list of social links', 'thim' ), )
		);
	}

// Creating widget frontend
	public function widget( $args, $instance ) {
		?>
		<div class="social-link">
			<ul>
				<li>
					<a href="<?php if ( isset( $instance['facebook'] ) ) {
						echo esc_url( $instance['facebook'] );
					} ?>">
						<i class="fa fa-facebook fa-lg"></i>
					</a>
				</li>
				<li>
					<a href="<?php if ( isset( $instance['twitter'] ) ) {
						echo esc_url( $instance['twitter'] );
					} ?>">
						<i class="fa fa-twitter fa-lg"></i>
					</a>
				</li>
				<li>
					<a href="<?php if ( isset( $instance['skype'] ) ) {
						echo esc_url( $instance['skype'] );
					} ?>">
						<i class="fa fa-skype fa-lg"></i>
					</a>
				</li>
				<li>
					<a href="<?php if ( isset( $instance['pinterest'] ) ) {
						echo esc_url( $instance['pinterest'] );
					} ?>">
						<i class="fa fa-pinterest fa-lg"></i>
					</a>
				</li>
			</ul>
		</div>

		<?php
	}

// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance['facebook'] ) ) {
			$facebook = $instance['facebook'];
		} else {
			$facebook = '#';
		}

		if ( isset( $instance['twitter'] ) ) {
			$twitter = $instance['twitter'];
		} else {
			$twitter = '#';
		}

		if ( isset( $instance['skype'] ) ) {
			$skype = $instance['skype'];
		} else {
			$skype = '#';
		}

		if ( isset( $instance['pinterest'] ) ) {
			$pinterest = $instance['pinterest'];
		} else {
			$pinterest = '#';
		}

// Widget admin form
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook URL:', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter URL:', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'skype' ) ); ?>"><?php esc_html_e( 'Skype URL:', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'skype' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skype' ) ); ?>" type="text" value="<?php echo esc_attr( $skype ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest URL:', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
		</p>
		<?php
	}

// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance              = array();
		$instance['facebook']  = ( !empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['twitter']   = ( !empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['skype']     = ( !empty( $new_instance['skype'] ) ) ? strip_tags( $new_instance['skype'] ) : '';
		$instance['pinterest'] = ( !empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';
		return $instance;
	}
}

// Register and load the widget
function social_link_load_widget() {
	register_widget( 'Thim_Social_Link_Widget' );
}

add_action( 'widgets_init', 'social_link_load_widget' );