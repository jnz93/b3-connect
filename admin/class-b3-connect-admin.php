<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       unitycode.tech
 * @since      1.0.0
 *
 * @package    B3_Connect
 * @subpackage B3_Connect/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    B3_Connect
 * @subpackage B3_Connect/admin
 * @author     jnz93 <contato@unitycode.tech>
 */
class B3_Connect_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// Adc menu item
		add_action('admin_menu', array($this, 'create_admin_page'));
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in B3_Connect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The B3_Connect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/b3-connect-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in B3_Connect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The B3_Connect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/b3-connect-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Create page admin of plugin
	 * 
	 * @since 1.0.0
	 */
	public function create_admin_page()
	{
		$page_title = 'B3 Connect';
		$menu_title = 'B3 Connect';
		$menu_slug 	= 'b3-connect';
		$capability = 10;
		$icon_url 	= 'dashicons-chart-area';
		$position 	= 10;

		add_menu_page($page_title, $menu_title, $capability, $menu_slug, array($this, 'construct_admin_page'), $icon_url, $position);
	}

	/**
	 * Construct page admin function
	 * 
	 * @since 1.0.0
	 */
	public function construct_admin_page()
	{
		// $this->price_stock_exchanges_and_coins();
		$this->stock_prices();
	}

	/**
	 * Cotações das principais bolsas e moedas do mundo
	 * 
	 * @since 1.0.0
	 */
	public function price_stock_exchanges_and_coins()
	{
		$endpoint = 'https://api.hgbrasil.com/finance/';
		$response = wp_remote_get( $endpoint );
		$response_body = wp_remote_retrieve_body( $response );

		$result = json_decode($response_body);

		if (!is_wp_error($result)) :
			echo '<pre>';
			print_r($result);
			echo '</pre>';
		else:
			echo 'Erro';
		endif;
	}

	/**
	 * Cotações de ações na IBOVESPA
	 * 
	 * @since 1.0.0
	 */
	public function stock_prices()
	{
		// Modelo: https://api.hgbrasil.com/finance/stock_price?key=c44c855c&symbol=bidi4,petr4,qual3,ciel3
		$endpoint = 'https://api.hgbrasil.com/finance/stock_price?key=c44c855c&symbol=ALZR11';
		$response = wp_remote_get($endpoint);
		$response_body = wp_remote_retrieve_body($response);

		$result = json_decode($response_body);

		if (!is_wp_error($result)) :
			echo '<pre>';
			print_r($result);
			echo '</pre>';
		else:
			echo 'ERRO';
		endif;
	}
	
}
