<?php
/**
 * В этом файле отключается весь ненужный функционал, создаваемый ядром, плагинами и темами.
 *
 * Art\Varman\Hide class
 *
 * @package varman
 */

namespace Art\Kadence_Child;

class Hide {

	public function __construct() {

		add_action( 'after_setup_theme', [ $this, 'hooks' ] );
	}

	public function hooks() {

		// Убирает notice для переключения обратно на Админа.
		// Это можно сделать и в выпадающем меню профиля админбара.
		if ( isset( $GLOBALS['user_switching'] ) ) {
			remove_action( 'all_admin_notices', [ $GLOBALS['user_switching'], 'action_admin_notices' ], 1 );
		}

		remove_action( 'welcome_panel', 'wp_welcome_panel' );
		remove_action( 'admin_print_scripts-index.php', 'wp_localize_community_events' );
		add_action( 'admin_head', [ $this, 'remove_wp_help_tab' ] );

		add_filter( 'admin_footer_text', '__return_empty_string' );
		add_filter( 'update_footer', '__return_empty_string', 11 );
		add_filter( 'pre_site_transient_php_check_' . md5( PHP_VERSION ), '__return_true' );

		add_action( 'add_admin_bar_menus', [ $this, 'admin_bar' ] );

		if ( ! current_user_can( 'edit_posts' ) ) {
			add_action( 'init', [ $this, 'remove_front_admin_bar' ] );
		}

		add_action( 'wp_dashboard_setup', [ $this, 'dashboard' ], 100 );
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );

		add_filter( 'wp_count_comments', [ $this, 'count_comments_empty' ] );
		add_filter( 'intermediate_image_sizes', [ $this, 'delete_intermediate_image_sizes' ] );
	}

	/**
	 * Удаляет админ-бар у всех пользователей, кроме администраторов сайта.
	 *
	 * @return void
	 */
	public function remove_front_admin_bar() {

		if ( ! current_user_can( 'manage_options' ) ) {
			show_admin_bar( false );
		}
	}

	/**
	 * Отключает создание миниатюр файлов для указанных размеров.
	 *
	 * @param  array $sizes
	 *
	 * @return array
	 */
	public function delete_intermediate_image_sizes( $sizes ) {

		return array_diff( $sizes, [
			'medium_large',
		] );
	}

	/**
	 * @return object
	 */
	public function count_comments_empty() {

		return (object) [
			'approved'            => 0,
			'awaiting_moderation' => 0,
			'moderated'           => 0,
			'spam'                => 0,
			'trash'               => 0,
			'post-trashed'        => 0,
			'total_comments'      => 0,
			'all'                 => 0,
		];
	}

	/**
	 * Изменяет базовый набор элементов (ссылок) в тулбаре.
	 *
	 * @return void
	 */
	public function admin_bar() {

		//remove_action( 'admin_bar_menu', 'wp_admin_bar_customize_menu', 40 );
		remove_action( 'admin_bar_menu', 'wp_admin_bar_search_menu', 4 );
		remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu', 10 );
		remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
		remove_action( 'admin_bar_menu', [ 'Admin_Bar_Menu', 'add_menu' ], 100 );

		if ( ! current_user_can( 'delete_others_posts' ) ) {
			remove_action( 'admin_bar_menu', 'wp_admin_bar_new_content_menu', 70 );

		}
	}

	/**
	 * Удаляет виджеты из Консоли WordPress.
	 *
	 * @return void
	 */
	public function dashboard() {

		$dash_side   = &$GLOBALS['wp_meta_boxes']['dashboard']['side']['core'];
		$dash_normal = &$GLOBALS['wp_meta_boxes']['dashboard']['normal']['core'];
		$dash_high   = &$GLOBALS['wp_meta_boxes']['dashboard']['normal']['high'];

		unset( $dash_high['rank_math_dashboard_widget'] );

		unset( $dash_side['dashboard_quick_press'] );       // Быстрая публикация
		unset( $dash_side['dashboard_recent_drafts'] );     // Последние черновики
		unset( $dash_side['dashboard_primary'] );           // Новости и мероприятия WordPress
		unset( $dash_side['dashboard_secondary'] );         // Другие Новости WordPress

		unset( $dash_normal['dashboard_incoming_links'] );  // Входящие ссылки
		unset( $dash_normal['dashboard_right_now'] );       // Прямо сейчас
		unset( $dash_normal['dashboard_recent_comments'] ); // Последние комментарии
		unset( $dash_normal['dashboard_plugins'] );
		unset( $dash_normal['dashboard_site_health'] );         // Виджет здоровья

		unset( $dash_normal['woo_vl_news_widget'] );         // Виджет здоровья
		unset( $dash_normal['woo_st-dashboard_right_now'] );         // Виджет здоровья
		unset( $dash_normal['woo_st-dashboard_sales'] );         // Виджет здоровья

		unset( $dash_normal['dashboard_activity'] );        // Активность
		unset( $dash_normal['owp_dashboard_news'] );        // Активность

	}

	/**
	 * Изменяет набор пунктов меню в админке.
	 *
	 * @return void
	 */
	public function admin_menu() {

		//remove_menu_page( 'tools.php' );
		//remove_menu_page( 'edit-comments.php' );
		//remove_menu_page( 'upload.php' );
		//remove_menu_page( 'index.php' );
	}

	/**
	 * Удаляет табы-помощники.
	 *
	 * @return void
	 */
	public function remove_wp_help_tab() {

		$screen = get_current_screen();
		$screen->remove_help_tabs();
	}

}

new Hide();