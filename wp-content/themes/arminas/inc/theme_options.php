<?php
//**********Theme Options Page*************//

add_action("admin_menu", "add_theme_menu_item");

function add_theme_menu_item()

{
add_submenu_page("themes.php","General Theme Options","Theme Options","manage_options","arminas_theme_options_page","theme_options_page");
}

function theme_options_page(){

?>

<div class="wrap">

<h1>Theme Options</h1>

<form method="post" action="options.php" enctype="multipart/form-data">

<?php

settings_fields("section"); //settings_fields("$option_group");

do_settings_sections("theme-options"); //do_settings_sections( $page );

submit_button();

?>

</form>

</div>

<?php

}

//Activating Hook

add_action("admin_init", "display_theme_panel_fields");

function display_theme_panel_fields()

{

//add_settings_section( $id, $title, $callback, $page );

add_settings_section("section", "General Settings", null, "theme-options");

//register_setting( $option_group, $option_name, $sanitize_callback );
register_setting("section", "HeaderLogo", "handle_header_logo_upload");
register_setting("section", "edit_facebook_url");
register_setting("section", "edit_instagram_url");
register_setting("section", "edit_pinterest_url");
register_setting("section", "edit_twitter_url");
register_setting("section", "edit_license_text");


//add_settings_field( $id, $title, $callback, $page, $section, $args );
add_settings_field("HeaderLogo", "Upload Header Logo", "display_handle_header_logo_upload", "theme-options", "section");
add_settings_field("edit_facebook_url", "Edit Facebook Url", "display_facebook_element", "theme-options", "section");
add_settings_field("edit_instagram_url", "Edit Instagram Url", "display_instagram_element", "theme-options", "section");
add_settings_field("edit_pinterest_url", "Edit Pinterest Url", "display_pinterest_element", "theme-options", "section");
add_settings_field("edit_twitter_url", "Edit Twitter Url", "display_twitter_element", "theme-options", "section");
add_settings_field("edit_license_text", "Edit License Text", "display_license_text_element", "theme-options", "section");

}


//Functions to handle HTML
function display_handle_header_logo_upload()
{?>
		<input type="file" name="HeaderLogo" id="HeaderLogo"/> 
        <img src="<?php echo get_option('HeaderLogo'); ?>" height="100%" width="50%">
<?php
}


function display_license_text_element()
{
?>
    <input type="text" name="edit_license_text" style="width:600px;" id="edit_license_text" value="<?php echo get_option('edit_license_text'); ?> " />
<?php
}
function display_facebook_element()
{
?>
    <input type="text" name="edit_facebook_url" style="width:600px;" id="edit_facebook_url" value="<?php echo get_option('edit_facebook_url'); ?> " />
    

<?php
}
function display_instagram_element()
{
?>
    <input type="text" name="edit_instagram_url" style="width:600px;" id="edit_instagram_url" value="<?php echo get_option('edit_instagram_url'); ?> " />
    

<?php
}
function display_pinterest_element()
{
?>
    <input type="text" name="edit_pinterest_url" style="width:600px;" id="edit_pinterest_url" value="<?php echo get_option('edit_pinterest_url'); ?> " />
    

<?php
}
function display_twitter_element()
{
?>
    <input type="text" name="edit_twitter_url" style="width:600px;" id="edit_twitter_url" value="<?php echo get_option('edit_twitter_url'); ?> " />
    

<?php
}

function handle_header_logo_upload($option) {

	if(!empty($_FILES["HeaderLogo"]["tmp_name"])) {
		$urls = wp_handle_upload($_FILES["HeaderLogo"], array('test_form' => FALSE));
		$temp = $urls["url"];
		return $temp;
	}
	//return $option;
	return get_option('HeaderLogo');
	
}

?>