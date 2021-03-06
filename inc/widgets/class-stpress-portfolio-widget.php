<?php
/**
 * Stpress_Portfolio_Widget class.
 *
 * フッターポートフォリオメニュー
 *
 * @package stpress
 */

/**
 * Stpress_Portfolio_Widget
 */
class Stpress_Portfolio_Widget extends WP_Widget {

	/**
	 * Construct
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct(
			'Stpress_Portfolio_Widget',
			__( 'Footer Portfolio', 'stpress' ),
			array(
				'description' => __( 'Footer Displays the portfolio menu.', 'stpress' ),
			)
		);
	}

	/**
	 * Widget
	 * ウィジェットのページ上での出力処理
	 *
	 * @param array $args args.
	 * @param array $instance — The settings for the particular instance of the widget.
	 * @return string
	 */
	public function widget( $args, $instance ) {
		$title                 = sanitize_text_field( $instance['title'] );
		$stpress_before_widget = $args['before_widget'];
		$stpress_after_widget  = $args['after_widget'];
		if ( ! empty( $title ) ) {
			$output_title = '<h4 class="d-inline-block py-3 border-bottom border-info">' . $title . '</h4>';
		}
		if ( ! has_nav_menu( 'footer-navigation' ) ) {
			return;
		}
		$output_portfolio_nav_menu =
		wp_nav_menu(
			array(
				'menu_class'     => 'list-unstyled',
				'container'      => 'ul',
				'link_before'    => '<div class="p-3 border-top border-secondary text-reset">',
				'link_after'     => '</div>',
				'depth'          => -1,
				'theme_location' => 'footer-navigation',
				'echo'           => false,
			)
		);

		// 出力するHTML
		echo wp_kses_post( $stpress_before_widget );
		if ( ! empty( $output_title ) ) {
			echo wp_kses_post( $output_title );
		}
		wp_nav_menu(
			array(
				'menu_class'     => 'list-unstyled',
				'container'      => 'ul',
				'link_before'    => '<div class="p-3 border-top border-secondary text-reset">',
				'link_after'     => '</div>',
				'depth'          => -1,
				'theme_location' => 'footer-navigation',
			)
		);
		echo wp_kses_post( $stpress_after_widget );
	}

	/**
	 * Form
	 * ウィジェットの管理画面上での設定表示
	 *
	 * @param array $instance — The settings for the particular instance of the widget.
	 */
	public function form( $instance ) {
		$defaults              = array(
			'title' => '',
		);
		$instance              = wp_parse_args( (array) $instance, $defaults );
		$author_image_id       = $this->get_field_id( 'title' );
		$author_image_name     = $this->get_field_name( 'title' );
		$author_image_instance = esc_attr( $instance['title'] );
		?>
			<p><?php echo esc_html__( 'Appearance > Menu will display the menu you set for the footer portfolio.', 'stpress' ); ?></p>
			<p>
				<label for="<?php echo esc_attr( $author_image_id ); ?>"><?php echo esc_html__( 'Title', 'stpress' ); ?></label><br>
				<input class="widefat" id="<?php echo esc_attr( $author_image_id ); ?>" name="<?php echo esc_attr( $author_image_name ); ?>" type="text" value="<?php echo esc_attr( $author_image_instance ); ?>" /><br>
			</p>
		<?php
	}

	/**
	 * Update
	 * ウィジェットが管理画面で更新されたときの保存処理
	 *
	 * @param array $new_instance new_instance.
	 * @param array $old_instance old_instance.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}
}
