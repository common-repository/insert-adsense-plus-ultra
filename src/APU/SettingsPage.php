<?php
class APU_SettingsPage extends APU_WpSubPage {
    
    public function render_settings_page() {
     	
     	global $current_user;
     	
        $option_name = $this->settings_page_properties['option_name'];
        $option_group = $this->settings_page_properties['option_group'];
        $settings_data = $this->get_settings_data();
		
        ?>
         <div class="wrap">
            <div id="icon-options-general" class="icon32"></div>
            <h1>Adsense Plus Ultra - <?php echo _e('Panel','insert-adsense-plus-ultra'); ?></h1>
            
        <?php
        // Exclude others users if option is enable
        $only_admin = FALSE;
        
        if($settings_data['abilita3'] === '1'){
			if($settings_data['input1'] !== $current_user->display_name){
			 	$only_admin = TRUE;
				?>
				<br><hr><br>
				
				<p><?php echo _e('You can\'t use Adsense Plus Ultra. Contact your admin manager for enable the plugin','insert-adsense-plus-ultra'); ?>.</p>
				
				<br><hr>
				<?php
			}
		}
		
		if($only_admin === FALSE){
         
        ?>
            <h3><span class="dashicons dashicons-info"></span> <?php echo _e('Automatic Ads (all pages)','insert-adsense-plus-ultra'); ?></h3>    
			<p><?php echo _e('Auto ads are a family of ad formats that offer a simple and innovative way for you to monetize your content. With Auto ads, you place the same piece of ad code once on each page. After you\'ve added the code, Google automatically shows ads at optimal times when they\'re likely to perform well for you and provide a good experience for your users.','insert-adsense-plus-ultra'); _e(' For more information visit','insert-adsense-plus-ultra'); ?> <a href="https://support.google.com/adsense/answer/7478040?hl=en&ref_topic=1307438" target="_blank">Google.com</a></p>
			
            <form method="post" action="options.php">
            
                <?php
                settings_fields( $option_group );
                ?>
                
                <table class="form-table">
                	<tr>
                        <th><label for="abilita1"><?php echo _e('Activate','insert-adsense-plus-ultra'); ?>:</label></th>
                        <td>
                            <label><input name="<?php echo esc_attr( $option_name."[abilita1]" ); ?>" id="abilita1" type="checkbox" value="1" class="code" <?php echo checked( 1, $settings_data['abilita1'], true ); ?> /><?php echo _e('Enable automatic Adsense advertising','insert-adsense-plus-ultra'); ?>.</label>
                        </td>
                    </tr>
                <?php
                
                if($settings_data['abilita1']){
                 
                 	$err1 = FALSE;
                 
                 	if(isset($settings_data['textbox1'])){
                 
                 		$textbox1 = esc_attr( $settings_data['textbox1'] );
                 	
                		// check if value are correct
                		if (strpos($textbox1, 'ca-pub-') === false) {
    						$err1 = 'error';
						}
					
					}
                 
                ?>
                    <tr>
                        <th><label for="textbox1"><?php echo _e('Paste Code','insert-adsense-plus-ultra'); ?></label></th>
                        <td>
                            <textarea id="textbox1" name="<?php echo esc_attr( $option_name."[textbox1]" )."\" "; if($err1=='error'){echo 'placeholder="'._e('Wrong Code','insert-adsense-plus-ultra').'..." ';}?> rows="5" cols="50"><?php if($err1!=='error'){echo esc_attr( $settings_data['textbox1'] );} ?></textarea>
                        </td>
                    </tr>
                            
                        <?php
                            if($err1==='error'){
								echo '<tr><th>'._e('Correct code example:','insert-adsense-plus-ultra').'</th><td>&lt;script async src=&quot;//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js&quot;&gt;&lt;/script&gt;<br>&lt;ins class=&quot;adsbygoogle&quot; style=&quot;display:block&quot; data-ad-client=&quot;ca-pub-123456789&quot; data-ad-slot=&quot;123456789&quot; data-ad-format=&quot;auto&quot; data-full-width-responsive=&quot;true&quot;&gt;&lt;/ins&gt; <br>&lt;script&gt; (adsbygoogle = window.adsbygoogle || []).push({}); &lt;/script&gt;</p></td></tr>';
							}
						?>
            		<th><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo _e('Save Options','insert-adsense-plus-ultra'); ?>"></th>
            		<td></td>
            	</tr>
            	
                <?php
                }
				else
				{
            	?>
            	
            	<tr>
            		<th><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo _e('Active Automatic Ads','insert-adsense-plus-ultra'); ?>"></th>
            		<td></td>
            	</tr>
            	
            	<?php
            	}
            	?>
            	
                </table>

            <p><em>* <?php echo _e('Get your code on your Google AdSense account for Automatic Ads', 'insert-adsense-plus-ultra'); ?>.</em>
        <br>
        <hr>
        <br>
		<h3><span class="dashicons dashicons-info"></span> <?php echo _e('Ads (all single post)','insert-adsense-plus-ultra'); ?></h3>    
			<p><?php _e('Here you can enter any type of code, we recommend using adaptable ads. You can also place inFeed and inArticle ads.','insert-adsense-plus-ultra').' '._e('For more information visit','insert-adsense-plus-ultra'); ?> <a href="https://support.google.com/adsense/answer/6002575" target="_blank">Google.com</a></p>
            
                <table class="form-table">
                	<tr>
                        <th><label for="abilita2"><?php echo _e('Activate','insert-adsense-plus-ultra'); ?>:</label></th>
                        <td>
                            <label><input name="<?php echo esc_attr( $option_name."[abilita2]" ); ?>" id="abilita2" type="checkbox" value="1" class="code" <?php echo checked( 1, $settings_data['abilita2'], true ); ?> /><?php echo _e('Enable Responsive Ads on single post','insert-adsense-plus-ultra'); ?>.</label>
                        </td>
                    </tr>
                <?php
                
                if($settings_data['abilita2']){
                 
                 	$err2 = FALSE;
                 
                 	if(isset($settings_data['textbox2'])){
                 
                 		$textbox2 = esc_attr( $settings_data['textbox2'] );
                 	
                		// check if value are correct
                		if (strpos($textbox2, 'ca-pub-') === false) {
    						$err2 = 'error';
						}
					
					}
                 
                ?>
                	<tr>
                        <th><label for="position1"><?php echo _e('Position','insert-adsense-plus-ultra'); ?></label></th>
                        <td>
                            <select name="<?php echo esc_attr( $option_name."[position1]" ); ?>" id="position1">
            					<option value="1" <?php if($settings_data['position1']=='1'){echo "selected";} ?>><?php echo _e('Before post','insert-adsense-plus-ultra'); ?></option>
            					<option value="2" <?php if($settings_data['position1']=='2'){echo "selected";} ?>><?php echo _e('Inside post (after second &lt;p&gt;)','insert-adsense-plus-ultra'); ?></option>
            					<option value="3" <?php if($settings_data['position1']=='3'){echo "selected";} ?>><?php echo _e('After post','insert-adsense-plus-ultra'); ?></option>
        					</select>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="textbox2"><?php echo _e('Paste Code','insert-adsense-plus-ultra'); ?></label></th>
                        <td>
                            <textarea id="textbox2" name="<?php echo esc_attr( $option_name."[textbox2]" )."\" "; if($err2=='error'){echo 'placeholder="'._e('Wrong Code','insert-adsense-plus-ultra').'..." ';}?> rows="5" cols="50"><?php if($err2!=='error'){echo esc_attr( $settings_data['textbox2'] );} ?></textarea>
                        </td>
                    </tr>
                            
                        <?php
                            if($err2==='error'){
								echo '<tr><th>'._e('Correct code example:','insert-adsense-plus-ultra').'</th><td>&lt;script async src=&quot;//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js&quot;&gt;&lt;/script&gt;<br>&lt;ins class=&quot;adsbygoogle&quot; style=&quot;display:block&quot; data-ad-client=&quot;ca-pub-123456789&quot; data-ad-slot=&quot;123456789&quot; data-ad-format=&quot;auto&quot; data-full-width-responsive=&quot;true&quot;&gt;&lt;/ins&gt; <br>&lt;script&gt; (adsbygoogle = window.adsbygoogle || []).push({}); &lt;/script&gt;</p></td></tr>';
							}
						?>
            		<th><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo _e('Save Options','insert-adsense-plus-ultra'); ?>"></th>
            		<td></td>
            	</tr>
                <?php
                }
				else
				{
            	?>
            	<tr>
            		<th><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo _e('Active Responsive Ads','insert-adsense-plus-ultra'); ?>"></th>
            		<td></td>
            	</tr>
            	<?php
            	}
            	?>
                </table>

            <p><em>* <?php echo _e('Get your code on your Google AdSense account for Responsive Ads','insert-adsense-plus-ultra'); ?>.</em>

		<br>
        <hr>
        <br>
		<h3><span class="dashicons dashicons-info"></span> <?php echo _e('ShortCode - where you want ;)','insert-adsense-plus-ultra'); ?></h3>    
			<p><?php _e('Here you can create your shortcodes and insert them wherever you want.','insert-adsense-plus-ultra'); ?></p>
            
                <table class="form-table">
                	<tr>
                        <th><label for="APU_short1"><?php echo _e('[APU ad="1"]','insert-adsense-plus-ultra'); ?></label></th>
                        <td>
                            <textarea id="APU_short1" name="<?php echo esc_attr( $option_name."[APU_short1]" )."\" "; ?> rows="5" cols="50"><?php echo esc_attr( $settings_data['APU_short1'] ); ?></textarea>
                        </td>
                    </tr>
					<tr>
                        <th><label for="APU_short2"><?php echo _e('[APU ad="2"]','insert-adsense-plus-ultra'); ?></label></th>
                        <td>
                            <textarea id="APU_short2" name="<?php echo esc_attr( $option_name."[APU_short2]" )."\" "; ?> rows="5" cols="50"><?php echo esc_attr( $settings_data['APU_short2'] ); ?></textarea>
                        </td>
                    </tr>
					<tr>
                        <th><label for="APU_short3"><?php echo _e('[APU ad="3"]','insert-adsense-plus-ultra'); ?></label></th>
                        <td>
                            <textarea id="APU_short3" name="<?php echo esc_attr( $option_name."[APU_short3]" )."\" "; ?> rows="5" cols="50"><?php echo esc_attr( $settings_data['APU_short3'] ); ?></textarea>
                        </td>
                    </tr>

            	<tr>
            		<th><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo _e('Save ShortCode','insert-adsense-plus-ultra'); ?>"></th>
            		<td></td>
            	</tr>

            </table>
			
			<br>
			<hr>
			<br>

        
            <h3><span class="dashicons dashicons-info"></span> <?php echo _e('Special settings for Adsense Plus Ultra!','insert-adsense-plus-ultra'); ?></h3>
                
                <input name="<?php echo esc_attr( $option_name."[input1]" ); ?>" id="input1" type="hidden" value="<?php echo $current_user->display_name; ?>" />
                <table class="form-table">
                	<tr>
                        <th><label for="abilita3"><?php echo _e('Activate','insert-adsense-plus-ultra'); ?>:</label></th>
                        <td>
                            <label><input name="<?php echo esc_attr( $option_name."[abilita3]" ); ?>" id="abilita3" type="checkbox" value="1" class="code" <?php echo checked( 1, $settings_data['abilita3'], true ); ?> /><?php echo _e('Enable Adsense Plus Ultra only for current user','insert-adsense-plus-ultra').' ('.$current_user->display_name.')'; ?>.</label>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="abilita4"><?php echo _e('Activate','insert-adsense-plus-ultra'); ?>:</label></th>
                        <td>
                            <label><input name="<?php echo esc_attr( $option_name."[abilita4]" ); ?>" id="abilita4" type="checkbox" value="1" class="code" <?php echo checked( 1, $settings_data['abilita4'], true ); ?> /><?php echo _e('No show ads for logged users','insert-adsense-plus-ultra'); ?>.</label>
                        </td>
                    </tr>
                </table>
                <input type="submit" name="submit" id="submit2" class="button button-primary" value="<?php echo _e('Save Options','insert-adsense-plus-ultra'); ?>">
            </form>
        </div>
        
<?php
    	
    } // end admin option
    
}
    
    // Add Automatic Ads  ==========================================
    public function add_automatic_ads() {
     
     	$settings_data = $this->get_settings_data();
    	
    	// if Ads are disable for logged users
     	if($settings_data['abilita4'] !== '1'){
     	 
     	 	// if Automatic Ads is active we can START
     		if($settings_data['abilita1'] === '1'){
     	 
     			$settings_data = $this->get_settings_data();
     	   		$textbox1 = $settings_data['textbox1'];
     	
     			// check if value are correct and...
     			$html = FALSE;
        		$err = '1';
        
        		if(strpos($textbox1, 'ca-pub-') === false) {
    				$err = 'error';
				}else{ // ...if no error sanitize input NO TAG SCRIPT ALLOW
					$ex = @explode("ca-pub-", $textbox1);
					$ex2 = @explode("\"", $ex['1']);
					$html = $ex2['0'];
				}
			
				// if no error... START!!!!!!!!
				if($err === '1'){
$add = <<<EOT
<!-- Generated with Adsense Plus Ultra plugin -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-{$html}",
          enable_page_level_ads: true
     });
</script>   
<!-- / Adsense Plus Ultra plugin -->
EOT;
					echo $add;
				}
			}
		}
	}
	
	// Add Post Ads  ============================================
    public function add_post_ads($content) {
     
     	$settings_data = $this->get_settings_data();
     	
     	// if Ads are disable for logged users
     	if($settings_data['abilita4'] !== '1'){
     		
     		// if Automatic Ads is active we can START
     		if($settings_data['abilita2'] === '1'){
     	 		
     	 		// Ads only on Post page
     	 		if( is_single() &&! is_home()) {

     				$textbox2 = $settings_data['textbox2'];
     	
     				// check if value are correct and...
     				$html = FALSE;
        			$err = '1';
        
        			if(strpos($textbox2, 'ca-pub-') === false) {
    					$err = 'error';
					}else{ // ...if no error sanitize input
						$html = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $textbox2);
					}
		
					if($err === '1'){
				 
$add = <<<EOT
<!-- Generated with Adsense Plus Ultra plugin -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>{$html}<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>      
<!-- / Adsense Plus Ultra plugin -->
EOT;

				 		if($settings_data['position1'] === '1'){ // Ads before Post content
						  					
							$content = $add.$content;
							
						}elseif($settings_data['position1'] === '2'){ // Ads inside Post content after second <p>	
						 	
							// easy way with explode		
							$ex = explode("<p", $content);
							
							$new[]=FALSE; // prevent error if no <p> tag
							
							$i=1;
							foreach ($ex as $par){
						 		if($i=='2'){
									$new[] = $par.'<p>'.$add.'</p>';
								}else{
									$new[] = $par;
								}
							$i++;	
							}
					
							$content = implode("<p", $new);
						
						}else{ // Ads after Post content	
						 
							$content .= $add;
							
						}
					
					}
	
				}

			}
		}

	// if nothing happens
	return $content; 
	
	}
        
	
	public function get_default_settings_data() {
	 
		$defaults = array();
		$defaults['abilita1'] = '';
		$defaults['abilita2'] = '';
		$defaults['abilita3'] = '';
		$defaults['abilita4'] = '';
		$defaults['textbox1'] = '';
		$defaults['input1'] = '';
		$defaults['position1'] = '';
		
		
		return $defaults;
	}
}