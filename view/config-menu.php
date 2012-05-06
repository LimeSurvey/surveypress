<?php

/**
 * @author Shubham Sachdeva
 * @copyright 2012
 */

//global variables
global $db_option_host,$db_option_name,$db_option_pwd,$db_option_user,$db_option_prefix,$db_option_url;
global $db_value_host,$db_value_name,$db_value_pwd,$db_value_user,$db_value_prefix,$db_value_url;

global $list_value_public_surveys,$show_value_survey_notification,$db_connection_error_name,$db_connection_error;

global $value_token_basis,$value_token_uses,$token_value_sid_list;
global $map_role_subscriber_token,$map_role_administrator_token,$map_role_editor_token,$map_role_author_token,$map_role_contributor_token;


function randomChars($length,$pattern="23456789abcdefghijkmnpqrstuvwxyz")
{
    $patternlength = strlen($pattern)-1;
    for($i=0;$i<$length;$i++)
    {
        if(isset($key))
            $key .= $pattern{rand(0,$patternlength)};
        else
            $key = $pattern{rand(0,$patternlength)};
    }
    return $key;
}

//if user is administrator
if (current_user_can('manage_options')) 
{
    //show the page title
?>
    <div class='wrap'>
        <div id='icon-options-general' class='icon32'>
            <br/>
        </div>
        <h2><?php echo __( 'Configuration', 'menu-test' ); ?></h2>
        <br />  
          
        <?php       
            
        $hidden_field_name = 'config_form_submit_hidden';

        //process some data of the form
        // See if the user has posted us some information
        // If they did, this hidden field will be set to 'Y'
        if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) 
        {
                            
            // Read the posted values
            $db_value_name   = $_POST[ $db_option_name ];
            $db_value_user   = $_POST[ $db_option_user ];
            $db_value_host   = $_POST[ $db_option_host ];
            $db_value_pwd    = $_POST[ $db_option_pwd ];
            $db_value_url    = $_POST[ $db_option_url ]; 
            $db_value_prefix = $_POST[ $db_option_prefix ];  
        
            // Save the posted values in the database
            update_option( $db_option_name, $db_value_name );
            update_option( $db_option_user, $db_value_user );
            update_option( $db_option_host, $db_value_host );
            update_option( $db_option_pwd, $db_value_pwd );
            update_option( $db_option_prefix, $db_value_prefix );
            update_option( $db_option_url, $db_value_url );
            
            
            
        
            // Put an settings updated message on the screen

            ?>
            
            <div class='updated' id='notification'>
                <p><strong><?php _e('Settings saved.', 'menu-test' ); ?></strong></p>
            </div>
            
            <?php

        }
        
        //check database connection
        if ( $db_value_user != '' && $db_value_name != '' && $db_value_host != '' )
        {
            $temp = new wpdb( $db_value_user, $db_value_pwd, $db_value_name, $db_value_host );            
        }
        else
        {
            // Put an error message regarding connection fail!
            $db_connection_error = TRUE;
            update_option( $db_connection_error_name, $db_connection_error );
            ?>
            
            <div class='updated' id='notification'>
                <p><strong><?php _e('Connection with database failed. Please correct the settings below.', 'menu-test' ); ?></strong></p>
            </div>
        <?php
        
        }
        //if there is any error in connection, put a message for the same!
        if ( isset($temp->error) && is_object($temp->error) )
        {
            // Put an error message regarding connection fail!
            $db_connection_error = TRUE;
            update_option( $db_connection_error_name, $db_connection_error );
            ?>
            
            <div class='updated' id='notification'>
                <p><strong><?php _e('Connection with database failed. Please correct the settings below.', 'menu-test' ); ?></strong></p>
            </div>
            
        <?php

        }
        else
        {
            $db_connection_error = FALSE;
            update_option( $db_connection_error_name, $db_connection_error );
        }
                   
        //setting screen form here
        ?>               

        <p><?php _e("Details about your LimeSurvey database. All the fields are mandatory."); ?></p>
                        
        <form name="an_config_form1" method="post" action="">
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y" />
            
        <table class="form-table">
            
        <tr valign="top">
        <th scope="row">
        <label for="<?php echo $db_option_host; ?>" ><?php _e("Database location:", 'menu-test' ); ?> </label>
        </th>
        <td>
        <input type="text" name="<?php echo $db_option_host; ?>" id="<?php echo $db_option_host; ?>" value="<?php echo $db_value_host; ?>" size="20" class="regular-text" />
        <span class="description"><?php _e("Location of the LimeSurvey database. In most cases, <strong>localhost</strong> will work!"); ?></span>
        </td>
        </tr>
            
        <tr valign="top">
        <th scope="row">
        <label for="<?php echo $db_option_name; ?>" ><?php _e("Database name:", 'menu-test' ); ?> </label>
        </th>
        <td>
        <input type="text" name="<?php echo $db_option_name; ?>" id="<?php echo $db_option_name; ?>" value="<?php echo $db_value_name; ?>" size="20" class="regular-text" />
        <span class="description"><?php _e("Name of the database LimeSurvey is using."); ?></span>
        </td>
        </tr>
            
        <tr valign="top">
        <th scope="row">
        <label for="<?php echo $db_option_user; ?>" ><?php _e("Database username:", 'menu-test' ); ?> </label>
        </th>
        <td>
        <input type="text" name="<?php echo $db_option_user; ?>" id="<?php echo $db_option_user; ?>" value="<?php echo $db_value_user; ?>" size="20" class="regular-text" />
        <span class="description"><?php _e("Username through which above database is being accessed by LimeSurvey. In most cases, <strong>root</strong> will work!"); ?></span>
        </td>
        </tr>
            
        <tr valign="top">
        <th scope="row">            
        <label for="<?php echo $db_option_pwd; ?>" ><?php _e("Database password:", 'menu-test' ); ?> </label>
        </th>
        <td>
        <input type="password" name="<?php echo $db_option_pwd; ?>" id="<?php echo $db_option_pwd; ?>" value="<?php echo $db_value_pwd; ?>" size="20" class="regular-text" />
        <span class="description"><?php _e("Password of the user which is accessing your LimeSurvey database."); ?></span>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">            
        <label for="<?php echo $db_option_prefix; ?>" ><?php _e("Database table prefix:", 'menu-test' ); ?> </label>
        </th>
        <td>
        <input type="text" name="<?php echo $db_option_prefix; ?>" id="<?php echo $db_option_prefix; ?>" value="<?php echo $db_value_prefix; ?>" size="20" class="regular-text" />
        <span class="description"><?php _e("LimeSurvey table's prefix in the database you mentioned above."); ?></span>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">            
        <label for="<?php echo $db_option_url; ?>" ><?php _e("LimeSurvey base url:", 'menu-test' ); ?> </label>
        </th>
        <td>
        <input type="text" name="<?php echo $db_option_url; ?>" id="<?php echo $db_option_url; ?>" value="<?php echo $db_value_url; ?>" size="20" class="regular-text code" />
        <span class="description"><?php _e("Base url of your LimeSurvey setup (<span style='color:red;'>shouldn't end with a trailing slash('/')</span>) e.g. <span class='code'>http://localhost/limesurvey</span>."); ?></span>
        </td>
        </tr>
            
        </table>
            
        <p class="submit">
        <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
        </p>
            
        </form>
            
    </div>
            
            
            
    <?php            

}
//if user is anyone except administrator, show the public active surveys that a user can take!
else
{
    global $lsdb;
    //fetch currently logged in user info
    global $current_user;
    get_currentuserinfo();
    
    //deal with tokens first!
    if ( !$value_token_basis )
    {
        //check if $token_option_sid_list is not empty
        if ( $token_value_sid_list != '' ||  $token_value_sid_list != null )
        {
            $sid_tokens = explode( ',', $token_value_sid_list );
                    
            foreach ($sid_tokens as $sid)
            {
                $sid = (int) $sid;
                $lang = $lsdb->get_var( $lsdb->prepare( "SELECT language FROM ".$db_value_prefix."surveys WHERE sid=".$sid.";" ) );
                
                //find the role of current user
                $user_roles = $current_user->roles;
                $user_role = array_shift($user_roles);
                $proceed = FALSE;
                
                switch ($user_role) {
                    
                    case "subscriber":
                        if ( $map_role_subscriber_token )
                            $proceed = TRUE;
                        break;
                    
                    case "editor":
                        if ( $map_role_editor_token )
                            $proceed = TRUE;
                        break;
                        
                    case "administrator":
                        if ( $map_role_administrator_token )
                            $proceed = TRUE;
                        break;
                        
                    case "author":
                        if ( $map_role_author_token )
                            $proceed = TRUE;
                        break;
                        
                    case "contributor":
                        if ( $map_role_contributor_token )
                            $proceed = TRUE;
                        break;
                    
                }
                
                if ( $proceed )
                {
                    //check whether a token for this user is already inserted or not?
                    $query = "SELECT token 
                              FROM ".$db_value_prefix."tokens_".$sid." 
                              WHERE firstname='".$current_user->user_login."' 
                   			  AND lastname='".$current_user->display_name."'
                              AND email='".$current_user->user_email."'";
                              
                    $token = $lsdb->get_var( $lsdb->prepare( $query ) );
                    
                    if ( is_null( $token ) )
                    {
                        //token doesn't exist, insert one!                   
                        $isvalidtoken = false;
                        while ($isvalidtoken == false)
                        {
                            $newtoken = randomChars(15);
                            //ensure same token isn't already in database!
                            
                            $query = "SELECT firstname 
                              FROM ".$db_value_prefix."tokens_".$sid." 
                              WHERE token='".$newtoken."' 
                   			  AND lastname='".$current_user->display_name."'
                              AND email='".$current_user->user_email."'";
                              
                            $temp = $lsdb->get_var( $lsdb->prepare( $query ) );
                            
                            if ( is_null( $temp ) )
                            {
                                $isvalidtoken = true;
                            }
                        }
                        
                        $sanitizedtoken = $newtoken;
                        
                        $insert_token = $lsdb->insert( 
                       	    $db_value_prefix.'tokens_'.$sid, 
                           	array( 
                          		'firstname' => $current_user->user_login,
                                'lastname' => $current_user->display_name,
                                'email' => $current_user->user_email,
                                'emailstatus' => "OK",
                                'token' => $sanitizedtoken,
                                'language' => $lang,
                                'sent' => 'N',
                                'remindersent' => 'N',
                                'completed' => 'N',
                                'usesleft' => $value_token_uses
                            ),
                           	array( 
                          		'%s', 
                          		'%s',
                                '%s', 
                          		'%s',
                                '%s', 
                          		'%s',
                                '%s',
                                '%s',
                                '%s',
                                '%d'
                           	) 
                        );
                    }
                    
                }
                              
                
                
            }
        }
        
        
        
    }
    
    
    //$lsdb = new wpdb( $db_value_user, $db_value_pwd, $db_value_name, $db_value_host );
    $query = "SELECT a.sid, b.surveyls_title, a.listpublic
              FROM ".$db_value_prefix."surveys AS a 
		      INNER JOIN ".$db_value_prefix."surveys_languagesettings AS b 
   			  ON ( surveyls_survey_id = a.sid AND surveyls_language = a.language ) 
   			  WHERE surveyls_survey_id=a.sid 
   			  AND surveyls_language=a.language 
   			  AND a.active='Y'
              AND ((a.expires >= '".date("Y-m-d H:i")."') OR (a.expires is null))
              AND ((a.startdate <= '".date("Y-m-d H:i")."') OR (a.startdate is null))
              ORDER BY surveyls_title";
                
    $public_surveys = $lsdb->get_results( $query );
    
    //number of surveys active and public
    $publiccount  = 0;
    //number of surveys active and private
    $privatecount = 0;
    //public active surveys information
    $publicsurvey  = array(); 
    //private active surveys information
    $privatesurvey = array();
          
    if ( $public_surveys )
    {
        foreach ( $public_surveys as $surveyinfo )
        {
            if ( $surveyinfo->listpublic == 'Y' )
            {
                $publicsurvey[$publiccount]['sid']   = $surveyinfo->sid;
                $publicsurvey[$publiccount]['title'] = $surveyinfo->surveyls_title;
                
                $publiccount++;
            }
            else
            {
                $privatesurvey[$privatecount]['sid']   = $surveyinfo->sid;
                $privatesurvey[$privatecount]['title'] = $surveyinfo->surveyls_title;
                
                $privatecount++;
            }
        }
    }        

    ?>
    <div class='wrap'>
        <h2> <?php echo __( 'Greetings!', 'menu-test' ); ?> </h2>
    </div>
    <br/>
    <?php 
    
    $count = $publiccount; //public surveys will always be displayed!
    if ( ((int)$list_value_public_surveys == 1 ) )
    {
        $count += $privatecount; //private surveys should be shown,hence add the count
    }
    
    if ( $count > 0 ) //there exist some active surveys which should be shown.
    {
        
        printf(__("You can take following %d survey(s), if you haven't already. Take them now :"), $count );
    ?>
    <br /><br />
    <?php    
        if ( $publiccount > 0 ) //show public surveys
        {
            echo "<b>".__("Public Survey(s)")."</b> :";
        
        
            $temp = 0;
            while ( $temp < $publiccount )
            {
                if ( $temp == 0)
                {
                    echo "<ul type='disc'>";
                }
                
                //see if there is a token for the current user
                $query = "SELECT token
                          FROM ".$db_value_prefix."tokens_".$publicsurvey[$temp]['sid']." 
               			  WHERE firstname='".$current_user->user_login."' 
               			  AND lastname='".$current_user->display_name."'
                          AND email='".$current_user->user_email."'";
                            
                $token = $lsdb->get_var( $lsdb->prepare( $query ) );
                
                //build appropriate token string
                if ( is_null( $token ) )
                {
                    $token = "";
                }
                else
                {
                    $token = "&token=".$token;
                }
                
                printf(__("<li> <a href='".$db_value_url."/index.php?sid=".$publicsurvey[$temp]['sid'].$token."' target='_blank'><strong> %s </strong></a> </li>"), $publicsurvey[$temp]['title']);
                
                if ( $temp == ( $publiccount - 1 ) )
                {
                    echo "</ul>";
                }
                $temp = $temp + 1;
            } //end while
        }
        
        if ( $privatecount > 0 && ((int)$list_value_public_surveys == 1 ) ) //shwo private surveys if (they exist and should be shown)
        {
            echo "<b>".__("Private Survey(s)")."</b> :";
        
        
            $temp = 0;
            while ( $temp < $privatecount )
            {
                if ( $temp == 0)
                {
                    echo "<ul type='disc'>";
                }
                
                //see if there is a token for the current user
                $query = "SELECT token
                          FROM ".$db_value_prefix."tokens_".$privatesurvey[$temp]['sid']." 
               			  WHERE firstname='".$current_user->user_login."' 
               			  AND lastname='".$current_user->display_name."'
                          AND email='".$current_user->user_email."'";
                            
                $token = $lsdb->get_var( $lsdb->prepare( $query ) );
                
                //build appropriate token string
                if ( is_null( $token ) )
                {
                    $token = "";
                }
                else
                {
                    $token = "&token=".$token;
                }
                
                printf(__("<li> <a href='".$db_value_url."/index.php?sid=".$privatesurvey[$temp]['sid'].$token."' target='_blank'><strong> %s </strong></a> </li>"), $privatesurvey[$temp]['title']);
                
                if ( $temp == ( $privatecount - 1 ) )
                {
                    echo "</ul>";
                }
                $temp = $temp + 1;
            } //end while
        }
    }
    else
    {
       echo _e("No survey(s) to take at the moment."); 
    }
    
    
} //end else

?>