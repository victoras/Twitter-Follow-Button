<?php

/*
* Plugin Name: Twitter Follow Button
* Plugin URI: http://www.wplook.com	
* Description: This is a follow button
* Author: The WPLOOK Team
* Version: 1.0
* Author URI: http://www.wplook.com
*/

add_action('widgets_init', create_function('', 'return register_widget("TwitterButton");'));
class TwitterButton extends WP_Widget {
	function TwitterButton() {
        parent::WP_Widget(false, $name = 'Twitter Button');
    }
	function form($instance) {
		// outputs the options form on admin
	 	$wpltitle = esc_attr($instance['wpltitle']); 
	 	$wplusername = esc_attr($instance['wplusername']);
		$wplfollowersisplay  = esc_attr($instance['wplfollowersisplay']);
		$wplbuttoncolor = esc_attr($instance['wplbuttoncolor']);
		$wpltextcolor = esc_attr($instance['wpltextcolor']);
		$wpllinkcolor = esc_attr($instance['wpllinkcolor']);
		$wpllanguage = esc_attr($instance['wpllanguage']);
		$wplwidth = esc_attr($instance['wplwidth']);	
		$wplalignment = esc_attr($instance['wplalignment']);
        ?>
		<p>
			<label for="<?php echo $this->get_field_id('wpltitle'); ?>">
				<?php _e('Title:'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wpltitle'); ?>" name="<?php echo $this->get_field_name('wpltitle'); ?>" type="text" value="<?php echo $wpltitle; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('wplusername'); ?>">
				<?php _e('Twitter Username:'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wplusername'); ?>" name="<?php echo $this->get_field_name('wplusername'); ?>" type="text" value="<?php echo $wplusername; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('wplfollowersisplay'); ?>">
				<?php _e('Folowers Display:'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('wplfollowersisplay'); ?>"  name="<?php echo $this->get_field_name('wplfollowersisplay'); ?>">
				<option value="true" <?php selected( 'true', $wplfollowersisplay ); ?>>Yes</option>
				<option value="false" <?php selected( 'false', $wplfollowersisplay ); ?>>No</option>
			</select>

		</p>
		<p>
			<label for="<?php echo $this->get_field_id('wplbuttoncolor'); ?>">
				<?php _e('Button Color:'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('wplbuttoncolor'); ?>"  name="<?php echo $this->get_field_name('wplbuttoncolor'); ?>">
				<option value="blue" <?php selected( 'blue', $wplbuttoncolor ); ?>>Blue</option>
				<option value="grey" <?php selected( 'grey', $wplbuttoncolor ); ?>>Grey</option>
			</select>
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('wpltextcolor'); ?>">
				<?php _e('Text Color:'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wpltextcolor'); ?>" name="<?php echo $this->get_field_name('wpltextcolor'); ?>" type="text" value="<?php echo $wpltextcolor; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('wpllinkcolor'); ?>">
				<?php _e('Link Color:'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wpllinkcolor'); ?>" name="<?php echo $this->get_field_name('wpllinkcolor'); ?>" type="text" value="<?php echo $wpllinkcolor; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('wpllanguage'); ?>">
				<?php _e('Language:'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('wpllanguage'); ?>"  name="<?php echo $this->get_field_name('wpllanguage'); ?>">
				<option value="en" <?php selected( 'en', $wpllanguage ); ?>>English</option>
				<option value="fr" <?php selected( 'fr', $wpllanguage ); ?>>French</option>
				<option value="de" <?php selected( 'de', $wpllanguage ); ?>>German</option>
				<option value="it" <?php selected( 'it', $wpllanguage ); ?>>Italian</option>
				<option value="ja" <?php selected( 'ja', $wpllanguage ); ?>>Japanese</option>
				<option value="ko" <?php selected( 'ko', $wpllanguage ); ?>>Korean</option>
				<option value="ru" <?php selected( 'ru', $wpllanguage ); ?>>Russian</option>
				<option value="es" <?php selected( 'es', $wpllanguage ); ?>>Spanish</option>
				<option value="tr" <?php selected( 'tr', $wpllanguage ); ?>>Turkish</option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('wplwidth'); ?>">
				<?php _e('Width:'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('wplwidth'); ?>" name="<?php echo $this->get_field_name('wplwidth'); ?>" type="text" value="<?php echo $wplwidth; ?>" />
		</p>				
		
		
		<p>
			<label for="<?php echo $this->get_field_id('wplalignment'); ?>">
				<?php _e('Alignment:'); ?>
				<br />
			</label>
			<select id="<?php echo $this->get_field_id('wplalignment'); ?>"  name="<?php echo $this->get_field_name('wplalignment'); ?>">
				<option value="right" <?php selected( 'right', $wplalignment ); ?>>Right</option>
				<option value="left" <?php selected( 'left', $wplalignment ); ?>>Left</option>
			</select>
		</p>
		
		
		
		<?php 
	} 

	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		
		$instance['wpltitle'] = sanitize_text_field($new_instance['wpltitle']);
		$instance['wplusername'] = sanitize_text_field($new_instance['wplusername']);
		$instance['wplfollowersisplay'] = sanitize_text_field($new_instance['wplfollowersisplay']);
		$instance['wplbuttoncolor'] = sanitize_text_field($new_instance['wplbuttoncolor']);
		$instance['wpltextcolor'] = sanitize_text_field($new_instance['wpltextcolor']);
		$instance['wpllinkcolor'] = sanitize_text_field($new_instance['wpllinkcolor']);
		$instance['wpllanguage'] = sanitize_text_field($new_instance['wpllanguage']);
		$instance['wplwidth'] = sanitize_text_field($new_instance['wplwidth']);
		$instance['wplalignment'] = $new_instance['wplalignment'];

        return $instance;
	}
	
	
	function widget($args, $instance) {
		// outputs the content of the widget
	      extract( $args );
        	$wpltitle = apply_filters('widget_wpltitle', $instance['wpltitle']);
			$wplusername = apply_filters('widget_wplusername', $instance['wplusername']);
			$wplfollowersisplay = apply_filters('widget_wplfollowersisplay', $instance['wplfollowersisplay']);
        	$wplbuttoncolor = apply_filters('widget_wplbuttoncolor', $instance['wplbuttoncolor']);
			$wpltextcolor = apply_filters('widget_wpltextcolor', $instance['wpltextcolor']);
			$wpllinkcolor = apply_filters('widget_wpllinkcolor', $instance['wpllinkcolor']);        
			$wpllanguage = apply_filters('widget_wpllanguage', $instance['wpllanguage']);
			$wplwidth = apply_filters('widget_wplwidth', $instance['wplwidth']);        
			$wplalignment = apply_filters('widget_wplalignment', $instance['wplalignment']);

        ?>

		<h3><?php echo $wpltitle; ?></h3>
		
		
		<a href="http://twitter.com/<?php echo $wplusername; ?>" class="twitter-follow-button" data-show-count="<?php echo $wplfollowersisplay; ?>" data-button="<?php echo $wplbuttoncolor; ?>" ata-text-color="<?php echo $wpltextcolor; ?>" data-link-color="<?php echo $wpllinkcolor; ?>" data-lang="<?php echo $wpllanguage; ?>" data-width="<?php echo $wplwidth; ?>" data-align="<?php echo $wplalignment; ?>">Follow @<?php echo $wplusername; ?></a>		
		<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>

		
<?php
	}
}
?>