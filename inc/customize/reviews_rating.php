<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//ДОБАВЛЯЕМ РЕЙТИНГ К КОММЕНТАРИЯМ
add_action( 'comment_form_logged_in_after', 'comm_rating_rating_field' );
add_action( 'comment_form_after_fields', 'comm_rating_rating_field' );
function comm_rating_rating_field () { ?>
	<div class="com_block_star">
		<label for="rating">Рейтинг<span class="required">*</span></label>
		<fieldset class="comments-rating">
<span class="rating-container">
            <?php for ( $i = 5; $i >= 1; $i-- ) : ?>
	            <input type="radio" id="rating-<?php echo esc_attr( $i ); ?>" name="rating" value="<?php echo esc_attr( $i ); ?>" /><label for="rating-<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></label>
            <?php endfor; ?>
<input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0">0</label>
</span>
		</fieldset>
	</div>
	<?php
}
//СОХРАНЯЕМ РЕЗУЛЬТАТ
add_action( 'comment_post', 'comm_rating_save_comment_rating' );
function comm_rating_save_comment_rating( $comment_id ) {
	if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) )
		$rating = intval( $_POST['rating'] );
	add_comment_meta( $comment_id, 'rating', $rating );
}

//ОБЯЗАТЕЛЬНОСТЬ РЕЙТИНГА
add_filter( 'preprocess_comment', 'comm_rating_require_rating' );
function comm_rating_require_rating( $commentdata ) {

	if ( is_admin() ) {
		return $commentdata;
	}
	else {
		if ( ! isset( $_POST['rating'] ) || 0 === intval( $_POST['rating'] ) )
			wp_die('Ошибка: Вы не добавили оценку. Нажмите кнопку «Назад» в своем веб-браузере и повторно отправьте свой комментарий с оценкой.');
		return $commentdata;
	}

}

//ВЫВОДИМ РЕЙТИНГ В ОПУБЛИКОВАННОМ КОММЕНТАРИИ
add_filter( 'comment_text', 'comm_rating_display_rating');
function comm_rating_display_rating( $comment_text ){
	if ( $rating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
		$stars = '<div class="com_star">';
		for ( $i = 1; $i <= $rating; $i++ ) {$stars .= '<span class="dashicons dashicons-star-filled"></span>';}
		$stars .= '</div>';
		$comment_text = $comment_text . $stars;
		return $comment_text;
	} else {return $comment_text;}
}

//ПОДКЛЮЧАЕМ СТИЛИ DASHICONS
add_action( 'wp_enqueue_scripts', 'comm_rating_styles' );
function comm_rating_styles() {
	wp_enqueue_style( 'dashicons');
}
