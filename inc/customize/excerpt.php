<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Обрезка текста (excerpt). Шоткоды вырезаются. Минимальное значение maxchar может быть 22.
 *
 * @param string/array $args Параметры.
 *
 * @return string HTML
 *
 * @ver 2.6.5
 */
function kama_excerpt( $args = '' ){
	global $post;

	if( is_string($args) )
		parse_str( $args, $args );

	$rg = (object) array_merge( array(
		'maxchar'     => 120,   // Макс. количество символов.
		'text'        => '',    // Какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
		// Если в тексте есть `<!--more-->`, то `maxchar` игнорируется и берется
		// все до <!--more--> вместе с HTML.
		'autop'       => true,  // Заменить переносы строк на <p> и <br> или нет?
		'save_tags'   => '',    // Теги, которые нужно оставить в тексте, например '<strong><b><a>'.
		'more_text'   => '...', // Текст ссылки `Читать дальше`.
		'ignore_more' => false, // нужно ли игнорировать <!--more--> в контенте
	), $args );

	$rg = apply_filters( 'kama_excerpt_args', $rg );

	if( ! $rg->text )
		$rg->text = $post->post_excerpt ?: $post->post_content;

	$text = $rg->text;
	// убираем блочные шорткоды: [foo]some data[/foo]. Учитывает markdown
	$text = preg_replace( '~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text );
	// убираем шоткоды: [singlepic id=3]. Учитывает markdown
	$text = preg_replace( '~\[/?[^\]]*\](?!\()~', '', $text );
	$text = trim( $text );

	// <!--more-->
	if( ! $rg->ignore_more  &&  strpos( $text, '<!--more-->') ){
		preg_match('/(.*)<!--more-->/s', $text, $mm );

		$text = trim( $mm[1] );

		$text_append = ' <a href="'. get_permalink( $post ) .'#more-'. $post->ID .'">'. $rg->more_text .'</a>';
	}
	// text, excerpt, content
	else {
		$text = trim( strip_tags($text, $rg->save_tags) );

		// Обрезаем
		if( mb_strlen($text) > $rg->maxchar ){
			$text = mb_substr( $text, 0, $rg->maxchar );
			$text = preg_replace( '~(.*)\s[^\s]*$~s', '\\1...', $text ); // кил последнее слово, оно 99% неполное
		}
	}

	// сохраняем переносы строк. Упрощенный аналог wpautop()
	if( $rg->autop ){
		$text = preg_replace(
			array("/\r/", "/\n{2,}/", "/\n/",   '~</p><br ?/?>~'),
			array('',     '</p><p>',  '<br />', '</p>'),
			$text
		);
	}

	$text = apply_filters( 'kama_excerpt', $text, $rg );

	if( isset($text_append) )
		$text .= $text_append;

	return ( $rg->autop && $text ) ? "<p>$text</p>" : $text;
}
/* Сhangelog:
 * 2.6.5 - Параметр ignore_more
 * 2.6.4 - Убрал пробел между словом и многоточием
 * 2.6.3 - Рефакторинг
 * 2.6.2 - Добавил регулярку для удаления блочных шорткодов вида: [foo]some data[/foo]
 * 2.6   - Удалил параметр 'save_format' и заменил его на два параметра 'autop' и 'save_tags'.
 *       - Немного изменил логику кода.
 */
