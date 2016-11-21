<?php

/**
 * FastEx Schedule Widget.
 */
class Thim_Schedule extends WP_Widget {

	/**
	 * Register Schedule widget
	 */
	function __construct() {
		parent::__construct(
			'thim_schedule',
			__( 'Thim: Schedule', 'thim' ),
			array(
				'description' => __( 'Display working schedule.', 'thim' )
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {

		echo ent2ncr( $args['before_widget'] );
		if ( !empty( $instance['weekday_title'] ) ) {
			echo '<span class="weekday_title">' . esc_html( $instance['weekday_title'] ) . '</span>';
		}

		if ( !empty( $instance['weekday_schedule'] ) ) {
			echo '<span class="weekday_schedule">' . esc_html( $instance['weekday_schedule'] ) . '</span>';
		}

		if ( !empty( $instance['weekend_title'] ) ) {
			echo '<span class="weekend_title">' . esc_html( $instance['weekend_title'] ) . '</span>';
		}

		if ( !empty( $instance['weekend_schedule'] ) ) {
			echo '<span class="weekend_schedule">' . esc_html( $instance['weekend_schedule'] ) . '</span>';
		}
		echo ent2ncr( $args['after_widget'] );
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance
	 *
	 * @return mixed
	 */
	function form( $instance ) {

		// Check values
		if ( $instance ) {
			$weekday_title    = $instance['weekday_title'];
			$weekday_schedule = $instance['weekday_schedule'];
			$weekend_title    = $instance['weekend_title'];
			$weekend_schedule = $instance['weekend_schedule'];
		} else {
			$weekday_title    = 'Mon-Sat:';
			$weekday_schedule = '8:00am-6:30pm';
			$weekend_title    = 'Sun:';
			$weekend_schedule = 'Closed';
		}
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'weekday_title' ) ); ?>"><?php esc_html_e( 'Weekdays title:', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'weekday_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'weekday_title' ) ); ?>" type="text" value="<?php echo esc_attr( $weekday_title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'weekday_schedule' ) ); ?>"><?php esc_html_e( 'Weekdays schedule:', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'weekday_schedule' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'weekday_schedule' ) ); ?>" type="text" value="<?php echo esc_attr( $weekday_schedule ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'weekend_title' ) ); ?>"><?php esc_html_e( 'Weekend title:', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'weekend_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'weekend_title' ) ); ?>" type="text" value="<?php echo esc_attr( $weekend_title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'weekend_schedule' ) ); ?>"><?php esc_html_e( 'Weekend schedule:', 'thim' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'weekend_schedule' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'weekend_schedule' ) ); ?>" type="text" value="<?php echo esc_attr( $weekend_schedule ); ?>" />
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		// Fields
		$instance['weekday_title']    = strip_tags( $new_instance['weekday_title'] );
		$instance['weekday_schedule'] = strip_tags( $new_instance['weekday_schedule'] );
		$instance['weekend_title']    = strip_tags( $new_instance['weekend_title'] );
		$instance['weekend_schedule'] = strip_tags( $new_instance['weekend_schedule'] );
		return $instance;
	}


}

/**
 * Register and load the widget
 */
function thim_register_widget_schedule() {
	register_widget( 'Thim_Schedule' );
}

add_action( 'widgets_init', 'thim_register_widget_schedule' );


