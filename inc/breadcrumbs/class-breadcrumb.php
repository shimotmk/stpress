<?php
/**
 *
 * トップページにはパンくずリストは必要ない
 * カテゴリーページには、「HOME > （カテゴリー名）」と表示
 * 月別アーカイブページには「HOME > （日時）」と表示
 * タグページには「HOME > （タグ名）」と表示
 * 投稿記事ページには「HOME > （カテゴリー名） > （記事タイトル）」と表示
 * 固定ページには「HOME > （固定ページタイトル）」と表示
 * 添付ファイルページには「HOME > （記事タイトル） > （ファイルの名前）」と表示
 * 検索ページには「HOME > 検索 : （検索ワード）」と表示
 * 404ページには「HOME > ページが見つかりません」と表示
 *
 */

/**
 * PHP Classについて
 * https://www.php.net/manual/ja/language.oop5.basic.php
 */
class MY_Breadcrumbs {

	public static function get_breadcrumbs() {

		/**
		 * パンくず作り
		 * 無ければ表示しない
		 * TOPページ > 一覧ページ > カテゴリー親 > カテゴリー子 > そのページ
		 */
		/**
		 * フロントページはパンくず表示しない
		 */
		if ( is_front_page() or is_home() ) {
			return;
		}

		/**
		 * リストデータここに値を貯めていく
		 * list_data
		 */
		$list_data = array();

		/**
		 * トップページ
		 */
		$list_data[] = array(
			'url'  => home_url( '/' ),
			'name' => "HOME",
		);

		if ( is_404() ) {

			/**
			 * 404
			 */
			$list_data[] = array(
				'url'  => '',
				'name' => __( 'The page was not found.', 'stpress' ),
			);

		} elseif ( is_search() ) {

			/**
			 * 検索結果ページ
			 */
			$list_data[] = array(
				'url'  => '',
				'name' => get_search_query(),
			);

		} elseif ( is_tax() ) {

			/**
			 * タクソノミーページ
			 */
			$taxonomy = get_query_var( 'taxonomy' );
			$term     = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
			$list_data[] = array(
				'url'  => get_term_link( $term ),
				'name' => $term->name,
			);

		} elseif ( is_attachment() ) {

			/**
			 * アタッチメントページ
			 */
			$list_data[] = array(
				'url'  => get_the_title(),
				'name' => get_the_permalink(),
			);

		} elseif ( is_page() ) {
			/**
			 * 固定ページ
			 */
			$list_data[] = array(
				'url'  => get_the_permalink(),
				'name' => get_the_title(),
			);

		} elseif ( is_post_type_archive() ) {
			/**
			 * 投稿タイプアーカイブ
			 */
			$post_type        = get_post_type();
			$post_type_object = get_post_type_object( $post_type );
			$label            = $post_type_object->label;

			$list_data[] = array(
				'url'  => get_post_type_archive_link( $post_type_object->name ),
				'name' => $label,
			);

		} elseif ( is_single() ) {
			/**
			 * 投稿ページ
			 */
			$post_type = get_post_type();
			if ( $post_type && 'post' !== $post_type ) {
				$post_type_object = get_post_type_object( $post_type );
				$label            = $post_type_object->label;
				$taxonomies       = $post_type_object->taxonomies;
				$taxonomy         = array_shift( $taxonomies );
				$terms            = get_the_terms( get_the_ID(), $taxonomy );
				$list_data[] = array(
					'url'  => get_post_type_archive_link( $post_type ),
					'name'  => $label
				);
				if ( $terms ) {
					$term = array_shift( $terms );
					// $this->set_ancestors( $term->term_id, $taxonomy );
					$list_data[] = array(
						'url'  => get_term_link( $term ),
						'name'  => $term->name
					);
				}
			} else {
				$categories = get_the_category( get_the_ID() );
				$category   = $categories[0];
				// $this->set_ancestors( $category->term_id, 'category' );
				$link = get_term_link( $category );
				if ( is_wp_error( $link ) ) {
					$link = '';
				}
				$list_data[] = array(
					'url'  => $link,
					'name' => $category->name
				);
			}

			$list_data[] = array(
				'url'  => get_the_permalink(),
				'name' => get_the_title(),
			);

		} elseif ( is_category() ) {

			/**
			 * カテゴリーアーカイブ
			 */
			$category_name = single_cat_title( '', false );
			$category_id   = get_cat_ID( $category_name );
			$list_data[] = array(
				'url'  => get_the_category( $category_id ),
				'name' => $category_name,
			);

		} elseif ( is_tag() ) {

			/**
			 * タグアーカイブ
			 */
			$list_data[] = array(
				'url'  => get_tag_link( get_queried_object() ),
				'name' => single_tag_title( '', false ),
			);

		} elseif ( is_author() ) {

			/**
			 * 投稿者アーカイブ
			 */
			$author_id = get_query_var( 'author' );
			$list_data[] = array(
				'url'  => get_author_posts_url( $author_id ),
				'name' => get_the_author_meta( 'display_name', $author_id ),
			);

		} elseif ( is_day() ) {

			/**
			 * 日アーカイブ
			 */
			$list_data[] = array(
				'url'  => "",
				'name' => get_the_date( 'd日' ),
			);

		} elseif ( is_month() ) {

			/**
			 * Monthアーカイブ
			 */
			$list_data[] = array(
				'url'  => "",
				'name' => get_the_date( 'm月' ),
			);

		} elseif ( is_year() ) {

			/**
			 * Yearアーカイブ
			 */
			$list_data[] = array(
				'url'  => "",
				'name' => get_the_date( 'y年' ),
			);

		}

		return $list_data = apply_filters( 'my_breadcrumb_list_data', $list_data );

	}

	public static function my_breadcrumb() {
		$list_data = self::get_breadcrumbs();
		if ( empty( $list_data ) ) {
			return;
		}
		ob_start();
		?>
		<?php
		/**
		 * Bootstrapパンくず
		 * https://getbootstrap.jp/docs/4.2/components/breadcrumb/
		 */
		?>
		<div class="bg-light">
			<nav class="container" aria-label="breadcrumb">
				<ol class="breadcrumb bg-light">
					<?php
					foreach ( $list_data as $list ) :
						if ($list !== end($list_data)) :
						?>
							<li class="breadcrumb-item">
								<a href="<?php echo esc_url( $list['url'] ); ?>"><?php echo esc_html( $list['name'] ); ?></a>
							</li>
						<?php else:?>
							<li class="breadcrumb-item active" aria-current="page"><?php echo esc_html( $list['name'] ); ?></li>
						<?php
						endif;
					endforeach;
					?>
				</ol>
			</nav>
		</div>
		<?php
		$content = ob_get_clean();
		$content = apply_filters( 'my_breadcrumb_template', $content );
		return $content;
	}
}
