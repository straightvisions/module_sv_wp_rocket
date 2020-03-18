<?php
	namespace sv100_companion;
	
	/**
	 * @version         1.00
	 * @author			straightvisions GmbH
	 * @package			sv100_companion
	 * @copyright		2017 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.0
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_wp_rocket extends modules {
		public function init() {
			// Section Info
			$this->set_section_title( __( 'WP Rocket', 'sv100_companion' ) )
				 ->set_section_desc( __( 'Tweaks for WP Rocket', 'sv100_companion' ) )
				 ->set_section_type( 'settings' );
			
			$this->get_root()->add_section($this);
			
			$this->load_settings();
			
			if($this->get_setting('lazy_load_threshold')->get_data()){
				add_filter( 'rocket_lazyload_threshold', function($threshold){
					return $this->get_setting('lazy_load_threshold')->get_data();
				} );
			}
		}
		public function load_settings(): sv_wp_rocket{
			$this->get_setting('lazy_load_threshold')
				 ->set_title( __( 'Adjust Threshold for Lazy Loading', 'sv100_companion' ) )
				 ->set_description( __( sprintf('see %sWP-Rocket-Manual%s.', '<a href="https://docs.wp-rocket.me/article/1032-adjust-lazyload-threshold" target="_blank">', '</a>'), 'sv100_companion' ) )
				 ->load_type( 'number' );

			return $this;
		}
	}