<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * Created new Post Type partners
 */

add_action( 'init', 'register_post_type_partners' );
function register_post_type_partners() {
	register_post_type( 'partners', array(
		'labels'             => array(
			'name'          => 'Партнеры',
			'singular_name' => 'Партнер', // админ панель Добавить->Проект
			'add_new'       => 'Добавить Партнера',
			'add_new_item'  => 'Добавить нового Партнера', // заголовок тега <title>
			'edit_item'     => 'Редактировать Партнера',

			'insert_into_item'      => 'Добавить в Партнеры',
			'uploaded_to_this_item' => 'Загруженные к этому Партнеру',
			'featured_image'        => 'Изображение Партнера',
			'set_featured_image'    => 'Установить изображение Партнера',
			'remove_featured_image' => 'Удалить изображение Партнера',
			'use_featured_image'    => 'Использовать как изображение Партнера',

			'new_item'           => 'Новый Партнер',
			'all_items'          => 'Все Партнеры',
			'view_item'          => 'Просмотр Партнера на сайте',
			'search_items'       => 'Искать Партнера',
			'not_found'          => 'Партнер не найден.',
			'not_found_in_trash' => 'В корзине нет Партнеров.',
			'menu_name'          => 'Партнеры' // ссылка в меню в админке

		),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-groups', // иконка в меню
//		'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
		'menu_position'      => 20, // порядок в меню
		'custom-fields'      => true,
		'supports'           => array( 'title', 'thumbnail' )
//		'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail')
	) );
}


/**
 * Created new Post Type stocks
 */
add_action( 'init', 'register_post_type_stocks' ); // Использовать функцию только внутри хука init
function register_post_type_stocks() {
	$labels = array(
		'name'          => 'Акции',
		'singular_name' => 'Акция', // админ панель Добавить->Функцию
		'add_new'       => 'Добавить Акцию',

		'add_new_item'          => 'Добавить новую Акцию', // заголовок тега <title>
		'edit_item'             => 'Редактировать Акцию',

		// from multiMedia files
		'insert_into_item'      => 'Вставить в Акцию', // Вставить в запись
		'uploaded_to_this_item' => 'Загружено для этой Акции', // Загружено для этой записи
		'featured_image'        => 'Миниатюра Акции', // Миниатюра записи
		'set_featured_image'    => 'Миниатюра Акции', // Миниатюра записи
		'remove_featured_image' => 'Удалить миниатюру Акции', // Удалить миниатюру записи
		'use_featured_image'    => 'Использовать как миниатюру Акции', // Использовать как миниатюру записи

		'new_item'           => 'Новая Акция',
		'all_items'          => 'Все Акции',
		'view_item'          => 'Просмотр Акции на сайте',
		'search_items'       => 'Искать Акцию',
		'not_found'          => 'Акций не найдено.',
		'not_found_in_trash' => 'В корзине нет Акций.',
		'menu_name'          => 'Акции' // ссылка в меню в админке
	);
	$args   = array(
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-tickets-alt', // иконка в меню
		'menu_position'      => 20, // порядок в меню
		'custom-fields'      => true,
		'show_in_rest'       => true,
		'supports'           => array( 'title', 'editor', 'author' ),
	);
	register_post_type( 'stocks', $args );
}


/**
 * Created new Post Type stocks
 */
add_action( 'init', 'register_post_type_faq' ); // Использовать функцию только внутри хука init
function register_post_type_faq() {
	$labels = array(
		'name'          => 'Часто задаваемые вопросы (FAQ)',
		'singular_name' => 'Вопрос', // админ панель Добавить->Функцию
		'add_new'       => 'Добавить вопрос',

		'add_new_item'          => 'Добавить новый вопрос', // заголовок тега <title>
		'edit_item'             => 'Редактировать вопрос',

		// from multiMedia files
		'insert_into_item'      => 'Вставить в вопрос', // Вставить в запись
		'uploaded_to_this_item' => 'Загружено для этого вопроса', // Загружено для этой записи
		'featured_image'        => 'Миниатюра вопроса', // Миниатюра записи
		'set_featured_image'    => 'Миниатюра вопроса', // Миниатюра записи
		'remove_featured_image' => 'Удалить миниатюру вопроса', // Удалить миниатюру записи
		'use_featured_image'    => 'Использовать как миниатюру вопроса', // Использовать как миниатюру записи

		'new_item'           => 'Новый вопрос',
		'all_items'          => 'Все вопросы',
		'view_item'          => 'Просмотр вопроса на сайте',
		'search_items'       => 'Искать вопрос',
		'not_found'          => 'Вопросов не найдено.',
		'not_found_in_trash' => 'В корзине нет вопросов.',
		'menu_name'          => 'Часто задаваемые вопросы (FAQ)' // ссылка в меню в админке
	);
	$args   = array(
		'public'        => false,
		'show_ui'       => true, // показывать интерфейс в админке
//		'publicly_queryable'  => false,
//		'show_in_nav_menus'   => true,
//		'exclude_from_search' => false,
		'labels'        => $labels,
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-format-chat', // иконка в меню
		'menu_position' => 20, // порядок в меню
		'custom-fields' => true,
		'show_in_rest'  => true,
		'supports'      => array( 'title', 'editor', 'author' ),
	);
	register_post_type( 'faq', $args );
}





/**
 * Created new Post Type hero_slider
 */
add_action( 'init', 'register_post_type_hero_slider' ); // Использовать функцию только внутри хука init
function register_post_type_hero_slider() {
	$labels = array(
		'name'          => 'Слайды',
		'singular_name' => 'Слайд', // админ панель Добавить->Проект
		'add_new'       => 'Добавить слайд',
		'add_new_item'  => 'Добавить новый слайд', // заголовок тега <title>
		'edit_item'     => 'Редактировать слайд',

		'insert_into_item'      => 'Добавить в слайд',
		'uploaded_to_this_item' => 'Загруженные к этому слайду',
		'featured_image'        => 'Изображение сертификат',
		'set_featured_image'    => 'Установить изображение слайда',
		'remove_featured_image' => 'Удалить изображение слайда',
		'use_featured_image'    => 'Использовать как изображение слайда',

		'new_item'           => 'Новый слайд',
		'all_items'          => 'Все слайды',
		'view_item'          => 'Просмотр слайда на сайте',
		'search_items'       => 'Искать слайд',
		'not_found'          => 'Слайдов не найдено.',
		'not_found_in_trash' => 'В корзине нет слайдов.',
		'menu_name'          => 'Слайдер на главной' // ссылка в меню в админке
	);
	$args   = array(
//		'label' => 'Отзывы',
		'public'        => false,
		'labels'        => $labels,
		'show_ui'       => true, // показывать интерфейс в админке
		'has_archive'   => false,
		'menu_icon'     => 'dashicons-images-alt2', // иконка в меню
//		'menu_icon' => get_stylesheet_directory_uri() .'/img/function_icon.png', // иконка в меню
		'menu_position' => 20, // порядок в меню
		'custom-fields' => true,
		'supports'      => array( 'title', 'thumbnail' )
	);
	register_post_type( 'hero_slider', $args );
}
