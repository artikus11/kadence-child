<?php

namespace Art\Kadence_Child;

class Enqueue {

	public $suffix;

	/**
	 * @var string Ссылка на папку со стилями и скриптами.
	 */
	public $url_assets;

	/**
	 * @var string Путь к папке со стилями и скриптами.
	 */
	public $path_assets;


	public function __construct() {

		$this->suffix      = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : 'min.';
		$this->url_assets  = get_theme_file_uri( '/assets/' );
		$this->path_assets = get_theme_file_path( '/assets/' );

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ], 999 );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_style' ] );

		add_filter( 'script_loader_tag', [ $this, 'add_async_attribute' ], 10, 2 );

		add_action( 'wp_default_scripts', [ $this, 'disable_jq_migrate' ] );
	}

	public function disable_jq_migrate( $scripts ) {

		if ( ! empty( $scripts->registered['jquery'] ) ) {
			$scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, [ 'jquery-migrate' ] );
		}
	}

	public function add_async_attribute( $tag, $handle ) {

		$scripts_to_async = [
			//'jquery-blockui',
			//'magnific-popup',
			//'oceanwp-lightbox',
			//'vv-addon-header-script',
			//'mmenu',
			//'scripts-mobile',
			//'wp-postratings',
			//'mc4wp-forms-api',
			//'mc4wp-forms-placeholders',
			'comment-reply',
			//'script-cf7',
			//'masked-input',
			//'contact-form-7',

		];

		foreach ( $scripts_to_async as $async_script ) {
			if ( $async_script === $handle ) {
				return str_replace( ' src', ' async="async" src', $tag );
			}
		}

		return $tag;
	}

	public function enqueue_scripts() {
		wp_enqueue_script(
			'phone-mask',
			$this->url_assets . 'jquery.mask.min.js',
			[ 'jquery' ],
			filemtime( $this->path_assets . 'jquery.mask.min.js' )
		);

	}

	public function enqueue_style() {

	}

}

new Enqueue();


