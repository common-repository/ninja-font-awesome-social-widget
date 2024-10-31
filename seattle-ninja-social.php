<?php
   /*
   Plugin Name: Seattle Ninja Social
   Plugin URI: http://seattleninja.com/wordpress/plugins
   Description: Font-Awesome Based social icon widget that allows you to enter the icon by name and link. 
   Version: 4.6.3
   Author: Ken Fujimoto
   Author URI: http://www.ninjaseattle.com
   License: GPLv2 or later
   License URI: http://www.gnu.org/licenses/gpl-2.0.html
   
   Legal Statements: 
    NO warranty
	All products, support, services, information and software are provided "as is" without warranty of any kind, express or implied, 
    including, but not limited to, the implied warranties of fitness for a particular purpose, and non-infringement.

    No Liability
    In no event shall Seattle Ninja be liable to you or any third party for any direct or indirect, special, incidental, or consequential damages in connection with 
    or arising from errors, omissions, delays or other cause of action that may be attributed to your use of any product, support, services, information or software provided, 
    including, but not limited to, lost profits or lost data, even if Seattle Ninja had been advised of the possibility of such damages.
*/
  
if ( !defined('ABSPATH') ) die('-1'); 
  
  
	add_action( 'widgets_init', 'ninja_load_widget' );
	
	function ninja_load_widget() {
		register_widget( 'Seattle_Ninja_Social' );
	}
  
  
  
class Seattle_Ninja_Social extends WP_Widget {
     
	protected $defaults;

	function __construct() {
		/**
		 * Default widget option values.
		 */

		parent::__construct(			
			'seattle_ninja_social',
			'Seattle Ninja Social',
			array('description'=>__('Add a font awesome icon and hyperlink.'))
		);	

		 
		$this->defaults = apply_filters( 'seattle_ninja_social', array(
			'title'                  => '',
			'new_window'             => 0,
			'icon_size'              => 26,
			'icon_color'			 => '#FF0000',
			'hover_color'			 => '#000000'
			
		));	 		
		 	

		//add_action('admin_head', array($this, 'seattle_ninja_admin_styles'));	
		add_action('wp_enqueue_scripts', array($this,'apply_ninja_style'));
		add_action('wp_enqueue_scripts', array($this, 'update_ninja_style'));

	}



	function form($instance) {
	  	
	  $instance = wp_parse_args( (array)$instance, $this->defaults );
    
	     $title = $instance['title'];

	  	 $icon_color = esc_attr( $instance[ 'icon_color' ] );
 	  	 $icon_hover = esc_attr( $instance[ 'icon_hover' ] );
 
 
	     $icon_1 = $instance['icon_1']; $url_1 = $instance['url_1'];
	     $icon_2 = $instance['icon_2']; $url_2 = $instance['url_2'];
	     $icon_3 = $instance['icon_3']; $url_3 = $instance['url_3'];
	     $icon_4 = $instance['icon_4']; $url_4 = $instance['url_4'];
	     $icon_5 = $instance['icon_5']; $url_5 = $instance['url_5'];
	     $icon_6 = $instance['icon_6']; $url_6 = $instance['url_6'];
	     $icon_7 = $instance['icon_7']; $url_7 = $instance['url_7'];
	     $icon_8 = $instance['icon_8']; $url_8 = $instance['url_8'];
	     $icon_9 = $instance['icon_9']; $url_9 = $instance['url_9'];
	     $icon_10 = $instance['icon_10']; $url_10 = $instance['url_10'];

	  ?>
	  <div id="seattle-ninja-controller">

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" placeholder="Enter Title" /></p>
		<p><label><input id="<?php echo $this->get_field_id( 'new_window' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'new_window' ); ?>" value="1" <?php checked( 1, $instance['new_window'] ); ?>/> <?php esc_html_e( 'Open links in new window?', 'seattleninja' ); ?></label></p>
		<p><label for="<?php echo $this->get_field_id( 'icon_size' ); ?>"><?php _e( 'Size: ', 'seattleninja' ); ?>: </label> <input id="<?php echo $this->get_field_id( 'size' ); ?>" placeholder="eg., 24" name="<?php echo $this->get_field_name( 'icon_size' ); ?>" type="text" value="<?php echo esc_attr( $instance['icon_size'] ); ?>" />px</p>

		<p><label for="<?php echo $this->get_field_id('icon_color'); ?>"><?php _e('Icon Color: '); ?></label>
		<input type="color" id="<?php echo $this->get_field_id( 'icon_color' ); ?>" name="<?php echo $this->get_field_name( 'icon_color' ); ?>" value="<?php echo esc_attr( $instance['icon_color'] ); ?>"  /></p>		
		<p><label for="<?php echo $this->get_field_id( 'hover_color' ); ?>"><?php _e( 'Icon Hover Shadow', 'seattleninja' ); ?>:</label>
		<input type="color" id="<?php echo $this->get_field_id( 'hover_color' ); ?>" name="<?php echo $this->get_field_name( 'hover_color' ); ?>" value="<?php echo esc_attr( $instance['hover_color'] ); ?>" /></p>	

		<hr/>	 

		<div id="ninja-thickbox-id1">
     	  <div class="thickbox-frame">
  
      		<p class="ninja-font-description">Looking for more icons: <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank" title="Font Icon List">Need more Help? </a><br/>
      			Go directly to the Cheat sheet to find more icons from Font Awesome</p>


     	  </div>
		</div>
			
		
		<p><label>Font Awesome Name:</label></p>
				<p> 	    
				<label></label>
				<input type="text" name="<?php echo $this->get_field_name('icon_1') ?>" placeholder="trophy" value="<?php echo esc_attr($icon_1); ?>" />
			    <input type="text"  name="<?php echo $this->get_field_name('url_1') ?>" placeholder="http://www.google.com"  value="<?php echo esc_attr($url_1); ?>" /> 
			    </p>
			    
	 	        <p><label></label>
	 	         <input type="text" name="<?php echo $this->get_field_name('icon_2') ?>" placeholder="envelope" value="<?php echo esc_attr($icon_2); ?>" />
			    <input type="text" name="<?php echo $this->get_field_name('url_2') ?>" placeholder="mailto:yourname@yourwebsite.com" value="<?php echo esc_attr($url_2); ?>"/> 
				</p>
			 	
			 	
			 	<p><label></label>
	 	         <input type="text" name="<?php echo $this->get_field_name('icon_3') ?>"   value="<?php echo esc_attr($icon_3); ?>" />
			    <input type="text" name="<?php echo $this->get_field_name('url_3') ?>" placeholder="http://ninjaseattle.com" value="<?php echo esc_attr($url_3); ?>"/> 
				</p>		
				
			
			 	<p><label></label>
	 	         <input type="text" name="<?php echo $this->get_field_name('icon_4') ?>"   value="<?php echo esc_attr($icon_4); ?>" />
			    <input type="text" name="<?php echo $this->get_field_name('url_4') ?>" value="<?php echo esc_attr($url_4); ?>"/> 
				</p>		
				
			
			 	<p><label></label>
	 	         <input type="text" name="<?php echo $this->get_field_name('icon_5') ?>"   value="<?php echo esc_attr($icon_5); ?>" />
			    <input type="text" name="<?php echo $this->get_field_name('url_5') ?>" value="<?php echo esc_attr($url_5); ?>"/> 
				</p>		
		
		
			 	<p><label></label>
	 	         <input type="text" name="<?php echo $this->get_field_name('icon_6') ?>"   value="<?php echo esc_attr($icon_6); ?>" />
			    <input type="text" name="<?php echo $this->get_field_name('url_6') ?>" value="<?php echo esc_attr($url_6); ?>"/> 
				</p>		
							
	    
			 	<p><label></label>
	 	         <input type="text" name="<?php echo $this->get_field_name('icon_7') ?>"   value="<?php echo esc_attr($icon_7); ?>" />
			    <input type="text" name="<?php echo $this->get_field_name('url_7') ?>" value="<?php echo esc_attr($url_7); ?>"/> 
				</p>		
							
							
		
			 	<p><label></label>
	 	         <input type="text" name="<?php echo $this->get_field_name('icon_8') ?>"   value="<?php echo esc_attr($icon_8); ?>" />
			    <input type="text" name="<?php echo $this->get_field_name('url_8') ?>" value="<?php echo esc_attr($url_8); ?>"/> 
				</p>		
												
		
			 	<p><label></label>
	 	         <input type="text" name="<?php echo $this->get_field_name('icon_9') ?>"   value="<?php echo esc_attr($icon_9); ?>" />
			    <input type="text" name="<?php echo $this->get_field_name('url_9') ?>" value="<?php echo esc_attr($url_9); ?>"/> 
				</p>		
		
			 	<p><label></label>
	 	         <input type="text" name="<?php echo $this->get_field_name('icon_10') ?>"   value="<?php echo esc_attr($icon_10); ?>" />
			    <input type="text" name="<?php echo $this->get_field_name('url_10') ?>" value="<?php echo esc_attr($url_10); ?>"/> 
				</p>		
						
																								
	   </div>
	    
		
	<?php }	


     function widget($args, $instance) {
	 
	    extract($args, EXTR_SKIP);
	
		$instance = wp_parse_args((array) $instance, $this->defaults );
	    
	    echo $before_widget;
	
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );		
	    		
		$new_window = $instance['new_window'] ? 'target="_blank"' : '';
		
		$icon_color = $instance['icon_color'];
		$hover_color = $instance['hover_color'];
		
	    $icon_1 = empty($instance['icon_1']) ? '' : $instance['icon_1'];
	    $icon_2 = empty($instance['icon_2']) ? '' : $instance['icon_2'];
	    $icon_3 = empty($instance['icon_3']) ? '' : $instance['icon_3'];
	    $icon_4 = empty($instance['icon_4']) ? '' : $instance['icon_4'];
	    $icon_5 = empty($instance['icon_5']) ? '' : $instance['icon_5'];
	    $icon_6 = empty($instance['icon_6']) ? '' : $instance['icon_6'];
	    $icon_7 = empty($instance['icon_7']) ? '' : $instance['icon_7'];
	    $icon_8 = empty($instance['icon_8']) ? '' : $instance['icon_8'];
	    $icon_9 = empty($instance['icon_9']) ? '' : $instance['icon_9'];
	    $icon_10 = empty($instance['icon_10']) ? '' : $instance['icon_10'];

		
		$url_1 = empty($instance['url_1']) ? '' : $instance['url_1'];
	    $url_2 = empty($instance['url_2']) ? '' : $instance['url_2'];
	    $url_3 = empty($instance['url_3']) ? '' : $instance['url_3'];
	    $url_4 = empty($instance['url_4']) ? '' : $instance['url_4'];
	    $url_5 = empty($instance['url_5']) ? '' : $instance['url_5'];
	    $url_6 = empty($instance['url_6']) ? '' : $instance['url_6'];
	    $url_7 = empty($instance['url_7']) ? '' : $instance['url_7'];
	    $url_8 = empty($instance['url_8']) ? '' : $instance['url_8'];
	    $url_9 = empty($instance['url_9']) ? '' : $instance['url_9'];
	    $url_10 = empty($instance['url_10']) ? '' : $instance['url_10'];


		$hide_li_1 = empty($instance['url_1']) ? 'hide' : $instance['url_1'];
	    $hide_li_2 = empty($instance['url_2']) ? 'hide' : $instance['url_2'];
	    $hide_li_3 = empty($instance['url_3']) ? 'hide' : $instance['url_3'];
	    $hide_li_4 = empty($instance['url_4']) ? 'hide' : $instance['url_4'];
	    $hide_li_5 = empty($instance['url_5']) ? 'hide' : $instance['url_5'];
	    $hide_li_6 = empty($instance['url_6']) ? 'hide' : $instance['url_6'];
	    $hide_li_7 = empty($instance['url_7']) ? 'hide' : $instance['url_7'];
	    $hide_li_8 = empty($instance['url_8']) ? 'hide' : $instance['url_8'];
	    $hide_li_9 = empty($instance['url_9']) ? 'hide' : $instance['url_9'];
	    $hide_li_10 = empty($instance['url_10']) ? 'hide' : $instance['url_10'];



		
	    if(!empty($title)){
	    	 echo $before_title . $title . $after_title; 
		}
	    echo '<ul class="seattle_social_ninja_list">
	    <li class="'. $hide_li_1 . '"><a href="' . $url_1 . '" ' . $new_window. ' ><i class="fa fa-' . $icon_1 . '"></i></a></li>
	    <li class="'. $hide_li_2 . '"><a href="' . $url_2 . '" ' . $new_window. ' ><i class="fa fa-' . $icon_2 . '"></i></a></li>
	    <li class="'. $hide_li_3 . '"><a href="' . $url_3 . '" ' . $new_window. ' ><i class="fa fa-' . $icon_3 . '"></i></a></li>
	    <li class="'. $hide_li_4 . '"><a href="' . $url_4 . '" ' . $new_window. ' ><i class="fa fa-' . $icon_4 . '"></i></a></li>
	    <li class="'. $hide_li_5 . '"><a href="' . $url_5 . '" ' . $new_window. ' ><i class="fa fa-' . $icon_5 . '"></i></a></li>
	    <li class="'. $hide_li_6 . '"><a href="' . $url_6 . '" ' . $new_window. ' ><i class="fa fa-' . $icon_6 . '"></i></a></li>
	    <li class="'. $hide_li_7 . '"><a href="' . $url_7 . '" ' . $new_window. ' ><i class="fa fa-' . $icon_7 . '"></i></a></li>
	    <li class="'. $hide_li_8 . '"><a href="' . $url_8 . '" ' . $new_window. ' ><i class="fa fa-' . $icon_8 . '"></i></a></li>
	    <li class="'. $hide_li_9 . '"><a href="' . $url_9 . '" ' . $new_window. ' ><i class="fa fa-' . $icon_9 . '"></i></a></li>
	    <li class="'. $hide_li_10 . '"><a href="' . $url_10 . '" ' . $new_window. ' ><i class="fa fa-' . $icon_10 . '"></i></a></li>

	    </ul>';

	    echo $after_widget;
	
	}

	function update($new_instance, $old_instance) {
		
		$instance = $old_instance;
	    $instance['title'] = strip_tags($new_instance['title']);

		$instance['new_window'] = $new_instance['new_window'];
		$instance['icon_size'] = $new_instance['icon_size'];
		$instance['icon_color'] = $new_instance['icon_color'];
		$instance['hover_color'] = $new_instance['hover_color'];
		
	    $instance['icon_1'] = $new_instance['icon_1'];
	    $instance['icon_2'] = $new_instance['icon_2'];
	    $instance['icon_3'] = $new_instance['icon_3'];
	    $instance['icon_4'] = $new_instance['icon_4'];
	    $instance['icon_5'] = $new_instance['icon_5'];
	    $instance['icon_6'] = $new_instance['icon_6'];
	    $instance['icon_7'] = $new_instance['icon_7'];
	    $instance['icon_8'] = $new_instance['icon_8'];
	    $instance['icon_9'] = $new_instance['icon_9'];
	    $instance['icon_10'] = $new_instance['icon_10'];

	
	
	    $instance['url_1'] = $new_instance['url_1'];
	    $instance['url_2'] = $new_instance['url_2'];
	    $instance['url_3'] = $new_instance['url_3'];
	    $instance['url_4'] = $new_instance['url_4'];
	    $instance['url_5'] = $new_instance['url_5'];
	    $instance['url_6'] = $new_instance['url_6'];
	    $instance['url_7'] = $new_instance['url_7'];
	    $instance['url_8'] = $new_instance['url_8'];
	    $instance['url_9'] = $new_instance['url_9'];
	    $instance['url_10'] = $new_instance['url_10'];


	    return $instance;
    }

				
	function apply_ninja_style() {	

		wp_enqueue_style('add-ninja-admin-style', plugins_url('css/font-awesome.min.css', __FILE__));
		$ninjacss = apply_filters( 'ninja_social_default_css', plugin_dir_url( __FILE__ ) . 'css/ninja-style.min.css' );
		wp_enqueue_style( 'simple-social-icons-font', esc_url( $ninjacss ), array(), '1.0', 'all' );
		
	}

	function update_ninja_style() {
	
			$all_instances = $this->get_settings();
			$instance = wp_parse_args( $all_instances[$this->number], $this->defaults );
	
			$font_size = $instance['icon_size'];
			$icon_color = $instance['icon_color'];			
			$hover_color = $instance['hover_color'];

			$css = '
			div .widget_seattle_ninja_social ul.seattle_social_ninja_list li a > i {
				color: ' . $icon_color . ' !important;
				font-size: ' . $font_size . 'px;
			}
	
			div .widget_seattle_ninja_social ul.seattle_social_ninja_list > li:hover {
				text-shadow: 0 1px 1px ' . $hover_color . ' !important;
			
			}';
	
			/** Minify **/
			$css = str_replace( "\t", '', $css );
			$css = str_replace( array( "\n", "\r" ), ' ', $css );
	
			/** Echo the CSS */
			echo '<style type="text/css" media="screen">' . $css . '</style>';
	
	}
		
// end of constructor
}
?>