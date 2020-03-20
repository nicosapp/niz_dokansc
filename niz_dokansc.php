<?php
/*
Plugin Name: Niz Stores Carousel for Dokan
Plugin URI: https://nicolas.izac.pro/dokan-stores-carousel-plugin/
Description: Niz Stores Carousel for Dokan allows you to create a Dokan stores carousel easily!
Version: 1.0.0
Author: Nicolas
Author URI: https://nizolas.izac.pro
Text Domain: niz-dokansc
Domain Path: /languages/
License: GPLv2
*/
if (!defined('ABSPATH')){
    exit("Do not access this file directly.");
}

define( 'NIZ_DOKANSC_URL', plugins_url( '/', __FILE__ ) );
define( 'NIZ_DOKANSC_PATH', plugin_dir_path( __FILE__ ) );
define( 'NIZ_DOKANSC_PLUGIN_NAME','Niz Stores Carousel for Dokan');

require_once(NIZ_DOKANSC_PATH.'inc/class.niz-dependency-checker.php');

class NizDsc{
    public static $_instance=null;

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'frontend_scripts'));
        add_action('admin_menu', array($this, 'setup_menu' ) );

        add_shortcode('niz_dokansc',array($this, 'stores_carousel_shortcode'));
    }
    public static function get_instance() {
        self::$_instance = empty(self::$_instance) ? new NizDsc() : self::$_instance;
        return self::$_instance;
    }

    public function admin_scripts(){
        wp_enqueue_script( 'niz_dokansc-owl-admin', NIZ_DOKANSC_URL  . 'assets/js/admin.js', array('jquery'));
        wp_localize_script('niz_dokansc-owl-admin','niz_ad_params',array('prefix'=>'niz_dokansc'));
    }

    public function frontend_scripts() {
        wp_enqueue_style( 'niz_dokansc-owl-style', NIZ_DOKANSC_URL  . 'lib/owl/assets/owl.carousel.min.css');
        wp_enqueue_style( 'niz_dokansc-owl-style-theme', NIZ_DOKANSC_URL  . 'lib/owl/assets/owl.theme.default.min.css');
        wp_enqueue_style( 'niz_dokansc-style', NIZ_DOKANSC_URL  . 'assets/css/style.css',9999);

        wp_enqueue_script( 'niz_dokansc-owl', NIZ_DOKANSC_URL  . 'lib/owl/owl.carousel.min.js', array('jquery'));
        wp_enqueue_script( 'niz_dokansc-script', NIZ_DOKANSC_URL  . 'assets/js/script.js', array('jquery','niz_dokansc-owl'));
    }
    /* ADMIN */

     
    public function setup_menu(){
        $menu = add_menu_page( 
            'Dokan Stores Carousel', 
            'Niz Dokan Stores Carousel', 
            'manage_options', 
            'niz-dokan-stores-carousel', 
            array($this, 'admin_page'),
            'dashicons-images-alt' );
        add_action( 'admin_print_scripts-' . $menu, array($this, 'admin_scripts') );
    }
     
    public function admin_page(){
        $this->get_template_part('admin.php');
    }

    /*UTILS*/
    public function get_template_part( $template_path, $variables = array(), $print = true){
      $filePath=NIZ_DOKANSC_PATH."/templates/$template_path";
      $output = NULL;
        if(file_exists($filePath)){
            // Extract the variables to a local namespace
            extract($variables);
            // Start output buffering
            ob_start();
            // Include the template file
            include $filePath;
            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            echo $output;
        }
        return $output;
    }
    /*SHORTCODE*/

    public function stores_carousel_shortcode($atts){

        $args = shortcode_atts( array(
            /*Shortcode params*/
            'type'=> 'best_selling_products',
            'limit'        => '12',
            'featured'     => 0,

            /*OWL params*/
            'show_item' => 2,
            'show_item_tablet'  =>  2,
            'show_item_mobile'  =>  1,
            'autoplay'  =>  1,
            'pause'  =>  0,
            'nav'  =>  0,
            'dots'  =>  0,
            'mouse_drag'  =>  1,
            'touch_drag'  =>  1,
            'loop'  =>  1,
            'speed'  =>  '300',
            'delay'  =>  '2000',
        ), $atts );

        return $this->get_template_part('stores_carousel.php',array('data'=>$args),false );
    }

    public static function activate(){    }
    public static function deactivate(){    }
}
$dependency=new Nyz_Dependency_Checker();
if($dependency->check())
    $nizWpc=new NizDsc();


register_activation_hook(NIZ_DOKANSC_PATH.'/niz_dokansc.php','NizDsc::activate');
register_deactivation_hook(NIZ_DOKANSC_PATH.'/niz_dokansc.php','NizDsc::deactivate');



























/**
 *  Get all scripts and styles from Wordpress
 */
// function print_scripts_styles() {

//     $result = [];
//     $result['scripts'] = [];
//     $result['styles'] = [];

//     // Print all loaded Scripts
//     global $wp_scripts;
//     foreach( $wp_scripts->queue as $script ) :
//         $result['scripts'][] =  $wp_scripts->registered[$script]->src . ";";
//     endforeach;

//     // // Print all loaded Styles (CSS)
//     // global $wp_styles;
//     // foreach( $wp_styles->queue as $style ) :
//     //     $result['styles'][] =  $wp_styles->registered[$style]->src . ";";
//     // endforeach;

//     var_dump( $result );
// }

// add_action( 'wp_head', 'print_scripts_styles');

