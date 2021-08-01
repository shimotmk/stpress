<?php
/**
 * フッターポートフォリオメニュー
 */
class stpress_portfolio_widget extends WP_Widget {
	function __construct(){
		parent::__construct(
			'stpress_portfolio_widget',
			'フッター ポートフォリオ',
			array(
				'description' => 'フッター ポートフォリオメニューを表示します。'
			)
		);
	}

	//ウィジェットのページ上での出力処理
	public function widget( $args, $instance ) {
		$title         = sanitize_text_field( $instance['title'] );
		$before_widget = $args['before_widget'];
		$after_widget  = $args['after_widget'];
		if ( ! empty( $title ) ){
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

		//出力するHTML
		echo $before_widget;
		echo $output_title;
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
		echo $after_widget;
	}

	public function form( $instance ) {
		//ウィジェットの管理画面上での設定表示です
		$defaults = array(
			'title' => '',
		);
		$instance              = wp_parse_args( (array) $instance, $defaults );
		$author_image_id       = $this->get_field_id('title');
		$author_image_name     = $this->get_field_name('title');
		$author_image_instance = esc_attr($instance['title']);
		?>
			<p>外観 > メニュー でフッター ポートフォリオに設定したメニューが表示されます</p>
			<p>
				<label for="<?php echo $author_image_id; ?>">タイトル</label><br>
				<input class="widefat" id="<?php echo $author_image_id; ?>" name="<?php echo $author_image_name; ?>" placeholder="Portfolio" type="text" value="<?php echo $author_image_instance; ?>" /><br>
			</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		//ウィジェットが管理画面で更新されたときの保存処理です
		$instance          = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}
}
