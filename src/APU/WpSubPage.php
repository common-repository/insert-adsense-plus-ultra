<?php
abstract class APU_WpSubPage {
    protected $settings_page_properties;
	
	public function __construct( $settings_page_properties ){
		$this->settings_page_properties = $settings_page_properties;
	}
	
    public function run() {
        if (is_admin()) {
        	add_filter('plugin_action_links', array($this, 'plugin_action_links'), 10, 2);
        }
        add_action( 'admin_menu', array( $this, 'add_menu_and_page' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
        add_action( 'wp_head', array( $this, 'add_automatic_ads' ) );
        add_filter( 'the_content', array( $this, 'add_post_ads' ) );
		add_shortcode( 'APU', array( $this, 'APU_shortcode' ) );
    }
    
    public function add_menu_and_page() { 
        add_submenu_page(
            $this->settings_page_properties['parent_slug'],
			$this->settings_page_properties['page_title'],
			$this->settings_page_properties['menu_title'],
			$this->settings_page_properties['capability'],
			$this->settings_page_properties['menu_slug'],
            array( $this, 'render_settings_page' )
        );
    
    }
    
    public function register_settings() { 
    
        register_setting(
            $this->settings_page_properties['option_group'],
            $this->settings_page_properties['option_name']
        );
    
    }
	
    public function get_settings_data(){    	
     	
        return get_option( $this->settings_page_properties['option_name'], $this->get_default_settings_data() );
    }
	
	public function render_settings_page(){
		
	}
	
	public function get_default_settings_data() {
		$defaults = array();
		
		return $defaults;
	}
	
	public function plugin_action_links($actions, $plugin_file) { 
	 
	 	static $plugin;

		if (!isset($plugin))
			if ($this->settings_page_properties['plugin_url'] == $plugin_file) {

				$settings = array('settings' => '<a href="options-general.php?page=insert-adsense-plus-ultra&tab=settings">'. __('Settings', 'General') . '</a>');
		
    			$actions = array_merge($settings, $actions);
			
		}
		
	return $actions;
    }
	
	public function APU_shortcode($atts, $content = '') {
		
		$settings_data = $this->get_settings_data();
		
		// if Ads are disable for logged users
     	if($settings_data['abilita4'] !== '1'){
    
			$atts = shortcode_atts(array(
				'ad' => '1'
				), $atts);
     
			// Get ShortCode
			if($atts['ad']=='1'){
		
				$ads = esc_attr( $settings_data['APU_short1'] );	
		
			}elseif($atts['ad']=='2'){
		
				$ads = esc_attr( $settings_data['APU_short2'] );	
		
			}elseif($atts['ad']=='3'){
			
				$ads = esc_attr( $settings_data['APU_short3'] );	
			
			}
		
			return html_entity_decode( $ads );
			
		}
		
	}
}