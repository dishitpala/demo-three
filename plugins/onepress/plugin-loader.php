<?php


class OnePressPluginLoader {
	/**
	 * The plugin loader instance.
	 *
	 * @var OnePressPluginLoader
	 */
	private static $instance;

	/**
	 * The loaded plugins.
	 *
	 * @var array
	 */
	private $loaded_plugins = [];

	/**
	 * The constructor.
	 */
	public function __construct() {
		$this->load_plugins();
	}

	/**
	 * Get the plugin loader instance.
	 *
	 * @return OnePressPluginLoader
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Load the plugins.
	 */
	public function load_plugins() {
		$plugins = $this->get_plugins();

		foreach ( $plugins as $plugin ) {
			if ( ! in_array( $plugin, $this->loaded_plugins, true ) ) {
//				$this->loaded_plugins[] = $plugin;
				wpcom_vip_load_plugin( $plugin );
			}
		}

		return $this->loaded_plugins;
	}

	/**
	 * Get the list of plugins to load.
	 *
	 * @return array
	 */
	private function get_plugins() {
		$file = ONEPRESS_PATH . '/loading-info/' . ONEPRESS_BRAND_NAME . '.php';

		if ( ! file_exists( $file ) ) {
			return [];
		}

		return apply_filters( 'onepress_plugin_loader_plugins', require $file );
	}
}
