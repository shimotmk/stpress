<?php
if( have_comments()) {
	wp_list_comments(
		array(
			'style' => 'div',
			'reply_text'=> '返信する'
		)
	);
}
?>

<?php if ( get_comment_pages_count() > 1 ) : ?>
	<nav class="pagination" role="navigation">
		<?php
			paginate_comments_links(
				array(
					'mid_size'  => 1,
				)
			);
		?>
	</nav>
<?php endif; ?>
<?php

/**
 * comment_form
 * https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/comment_form
 */
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields =  array(
	'author' =>
		'<div class="form-group"><label for="author">名前</label> ' .
		( $req ? '<span class="required">*</span>' : '' ) .
		'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30"' . $aria_req . ' /></div>',
	'cookies' =>
	'<div class="form-group form-check comment-form-cookies-consent">
		<input id="wp-comment-cookies-consent" class="form-check-input" name="wp-comment-cookies-consent" type="checkbox" value="yes">
		<label class="form-check-label" for="wp-comment-cookies-consent">次回のコメントで使用するためブラウザーに自分の名前、メールアドレス、サイトを保存する。</label>
	</div>',
);

$args = array (
	'comment_field' => '
		<div class="form-group">
			<label for="comment">コメント</label>
			<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
		</div>
	',
	'fields' => $fields,
	'class_submit' => 'btn btn-primary',
);
comment_form( $args );
