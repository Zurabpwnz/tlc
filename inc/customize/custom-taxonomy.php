<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// хук для регистрации
add_action('init', 'create_taxonomy');
function create_taxonomy()
{

    // список параметров: wp-kama.ru/function/get_taxonomy_labels
    register_taxonomy('atribut_recepta', ['post'], [
        'label' => '', // определяется параметром $labels->name
        'labels' => [
            'name' => 'Атрибуты рецепта',
            'singular_name' => 'Атрибут Рецепта',
            'search_items' => 'Поиск Атрибута',
            'all_items' => 'Все Атрибуты',
            'view_item' => 'Просмотр Атрибута',
            'parent_item' => 'Родитель Атрибута',
            'parent_item_colon' => 'Родитель Атрибута:',
            'edit_item' => 'Редактировать Атрибут',
            'update_item' => 'Обновить Атрибут',
            'add_new_item' => 'Добавить новый Атрибут',
            'new_item_name' => 'Название нового Атрибута',
            'menu_name' => 'Атрибуты рецепта',
        ],
        'description' => '', // описание таксономии
        'public' => true,
        'publicly_queryable' => false, // равен аргументу public
//        'show_in_nav_menus' => true, // равен аргументу public
//        'show_ui' => true, // равен аргументу public
//        'show_in_menu' => true, // равен аргументу show_ui
//        'show_tagcloud' => true, // равен аргументу show_ui
//        'show_in_quick_edit' => null, // равен аргументу show_ui
        'hierarchical' => false,

        'rewrite' => false,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities' => array(),
        'meta_box_cb' => 'post_tags_meta_box', // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column' => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest' => null, // добавить в REST API
        'rest_base' => null, // $taxonomy
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ]);
}
