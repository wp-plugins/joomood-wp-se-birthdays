<?php/*Plugin Name: Social Engine Birthdays Plugin URI: http://sociallife.it/blog/Description: This plugin/widget retrieves the Last X SE Birthdays and display them in your Wordpress Sidebar. To show your SE birthdays in the other pages of your wp, simply put the code <code>&lt;?php joomood_bdays(); ?&gt;</code> where you want in your template.Author: JooMoodVersion: 2.0Author URI: http://2cq.it/	Copyright 2009, JooMOod	-----------------------	This program is free software: you can redistribute it and/or modify	it under the terms of the GNU General Public License as published by	the Free Software Foundation, either version 3 of the License, or	(at your option) any later version.	This program is distributed in the hope that it will be useful,	but WITHOUT ANY WARRANTY; without even the implied warranty of	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the	GNU General Public License for more details.	You should have received a copy of the GNU General Public License	along with this program.  If not, see <http://www.gnu.org/licenses/>.	*/function joomood_bdays_install() {	$newoptions = get_option('joomood_bdays_options');	    $newoptions['title']					='JooMood SE Birthdays';    $newoptions['numOfGroup']				='6';    $newoptions['how_many_groups']			='1';    $newoptions['data_type']				='3';    $newoptions['go_profile_text']			='See the profile of';    $newoptions['empty_image_url']			='images/nophoto.gif';    $newoptions['pic_dim_width']			='50';    $newoptions['pic_dim_height']			='50';    $newoptions['nametype']					='2';	$newoptions['mainbox_border_style']		='0';	$newoptions['mainbox_border_color']		='#333333';	$newoptions['mainbox_border_dim']		='1';	$newoptions['mainbox_bg_color']			='#ededed';	$newoptions['box_border_style']			='0';	$newoptions['box_border_color']			='#333333';	$newoptions['box_border_dim']			='1';	$newoptions['box_bg_color']				='#f7f7f7';	$newoptions['box_bg_color1']			='#f4f9ff';	$newoptions['outer_cellspacing']		='4';	$newoptions['outer_cellpadding']		='2';	$newoptions['inner_cellspacing']		='4';	$newoptions['inner_cellpadding']		='2';	$newoptions['text_redux']				='100';	$newoptions['no_bday']					='No birthdays...';	$newoptions['use_resize']				='yes';	add_option('joomood_bdays_options', $newoptions);}// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX// add the admin pagefunction joomood_bdays_add_pages() {	add_options_page('SE Birthdays', 'SE Birthdays', 8, __FILE__, 'joomood_bdays_options');}// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXfunction joomood_bdays() {  $newoptions = get_option("joomood_bdays_options");  	echo $before_widget;    echo $before_title;    echo "<h3>";    echo $newoptions['title'];        $title		 				= $newoptions['title'];    $numOfGroup 				= $newoptions['numOfGroup'];    $how_many_groups 			= $newoptions['how_many_groups'];    $data_type 					= $newoptions['data_type'];    $go_profile_text 			= $newoptions['go_profile_text'];    $empty_image_url 			= $newoptions['empty_image_url'];    $pic_dim_width 				= $newoptions['pic_dim_width'];    $pic_dim_height 			= $newoptions['pic_dim_height'];    $nametype 					= $newoptions['nametype'];	$mainbox_border_style		= $newoptions['mainbox_border_style'];	$mainbox_border_color		= $newoptions['mainbox_border_color'];	$mainbox_border_dim			= $newoptions['mainbox_border_dim'];	$mainbox_bg_color			= $newoptions['mainbox_bg_color'];	$box_border_style			= $newoptions['box_border_style'];	$box_border_color			= $newoptions['box_border_color'];	$box_border_dim				= $newoptions['box_border_dim'];	$box_bg_color				= $newoptions['box_bg_color'];	$box_bg_color1				= $newoptions['box_bg_color1'];	$outer_cellspacing			= $newoptions['outer_cellspacing'];	$outer_cellpadding			= $newoptions['outer_cellpadding'];	$inner_cellspacing			= $newoptions['inner_cellspacing'];	$inner_cellpadding			= $newoptions['inner_cellpadding'];	$text_redux					= $newoptions['text_redux'];	$no_bday					= $newoptions['no_bday'];	$use_resize					= $newoptions['use_resize'];	    	        echo $after_title;    echo"</h3><br />";		// Load main file	    include(ABSPATH.'wp-content/plugins/wp-se_bdays/main/se_bdays.php');    echo $after_widget;    echo "<br /><br />";} // End of se_groups function// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX	function joomood_bdays_options() {	$options = $newoptions = get_option('joomood_bdays_options');	if ( $_POST["mybdays_submit"] ) {    $newoptions['title'] =htmlspecialchars($_POST['title']);    $newoptions['numOfGroup'] = $_POST['numOfGroup'];    $newoptions['how_many_groups'] = $_POST['how_many_groups'];    $newoptions['data_type'] = $_POST['data_type'];    $newoptions['go_profile_text'] = htmlspecialchars($_POST['go_profile_text']);    $newoptions['empty_image_url'] = $_POST['empty_image_url'];    $newoptions['pic_dim_width'] = $_POST['pic_dim_width'];    $newoptions['pic_dim_height'] = $_POST['pic_dim_height'];    $newoptions['nametype'] = $_POST['nametype'];	$newoptions['mainbox_border_style'] = $_POST['mainbox_border_style'];	$newoptions['mainbox_border_color'] = $_POST['mainbox_border_color'];	$newoptions['mainbox_border_dim'] = $_POST['mainbox_border_dim'];	$newoptions['mainbox_bg_color'] = $_POST['mainbox_bg_color'];	$newoptions['box_border_style'] = $_POST['box_border_style'];	$newoptions['box_border_color'] = $_POST['box_border_color'];	$newoptions['box_border_dim'] = $_POST['box_border_dim'];	$newoptions['box_bg_color'] = $_POST['box_bg_color'];	$newoptions['box_bg_color1'] = $_POST['box_bg_color1'];	$newoptions['outer_cellspacing'] = $_POST['outer_cellspacing'];	$newoptions['outer_cellpadding'] = $_POST['outer_cellpadding'];	$newoptions['inner_cellspacing'] = $_POST['inner_cellspacing'];	$newoptions['inner_cellpadding'] = $_POST['inner_cellpadding'];	$newoptions['text_redux'] = $_POST['text_redux'];	$newoptions['no_bday'] = $_POST['no_bday'];	$newoptions['use_resize'] = $_POST['use_resize'];	}		if ( $options != $newoptions ) {		$options = $newoptions;		update_option('joomood_bdays_options', $options);	}	echo '<form method="post">';	echo "<div class=\"wrap\"><h2>JooMood Social Engine Birthdays - Display Options</h2>";	echo '<table class="form-table">';	echo '<tr valign="top">';	echo '<th scope="row">Title of the block</th><td><input name="title" type="text" value="'.$options['title'].'" /></td></tr>';	echo '<tr valign="top">';	echo '<th scope="row">How many Birthdays you want to display?</th><td><input name="numOfGroup" type="text" value="'.$options['numOfGroup'].'" /></td></tr>';	echo '<tr valign="top">';	echo '<th scope="row">How many Birthdays in every line?</th><td><input name="how_many_groups" type="text" value="'.$options['how_many_groups'].'" /></td></tr>';	echo '<tr valign="top">';	echo '<th scope="row">Type of Showed Data</th><td><select name="data_type" id="data_type">      <option ';      if($options['data_type'] == "1"){ echo ' selected '; } echo 'value="1">Pic Only</option>      <option ';      if($options['data_type'] == "2"){ echo ' selected '; } echo 'value="2">Text Only</option>      <option ';      if($options['data_type'] == "3"){ echo ' selected '; } echo 'value="3">Pic and Text</option>	  </select>	</td>	</tr>	<tr valign="top">	<th scope="row">Use Image Resize Script?</th><td>    <select name="use_resize" id="use_resize">      <option ';      if($options['use_resize'] == "yes"){ echo ' selected '; } echo 'value="yes">Yes</option>      <option ';      if($options['use_resize'] == "no"){ echo ' selected '; } echo 'value="no">No</option>    </select>	</td>	</tr>	<tr valign="top">	<th scope="row">Image Width</th><td><input name="pic_dim_width" type="text" value="'.$options['pic_dim_width'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Image Height</th><td><input name="pic_dim_height" type="text" value="'.$options['pic_dim_height'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">User Link Title</th><td><input name="go_profile_text" type="text" value="'.$options['go_profile_text'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">SE Empty Image</th><td><input name="empty_image_url" type="text" value="'.$options['empty_image_url'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Type of Name</th><td>    <select name="nametype" id="nametype">      <option ';      if($options['nametype'] == "1"){ echo ' selected '; } echo 'value="1">Username</option>      <option ';      if($options['nametype'] == "2"){ echo ' selected '; } echo 'value="2">Full Name</option>    </select>	</td>	</tr>	<tr valign="top">	<th scope="row">Mainbox Border Style</th><td>    <select name="mainbox_border_style" id="mainbox_border_style">      <option ';      if($options['mainbox_border_style'] == "0"){ echo ' selected '; } echo 'value="0">No Border</option>      <option ';      if($options['mainbox_border_style'] == "1"){ echo ' selected '; } echo 'value="1">Dotted Border</option>      <option ';      if($options['mainbox_border_style'] == "2"){ echo ' selected '; } echo 'value="2">Solid Border</option>    </select>	</td>	</tr>	<tr valign="top">	<th scope="row">Mainbox Border Color</th><td><input name="mainbox_border_color" type="text" value="'.$options['mainbox_border_color'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Mainbox Border Thickness</th><td><input name="mainbox_border_dim" type="text" value="'.$options['mainbox_border_dim'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Mainbox Background Color</th><td><input name="mainbox_bg_color" type="text" value="'.$options['mainbox_bg_color'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Inner box Border Style</th><td>    <select name="box_border_style" id="box_border_style">      <option ';      if($options['box_border_style'] == "0"){ echo ' selected '; } echo 'value="0">No Border</option>      <option ';      if($options['box_border_style'] == "1"){ echo ' selected '; } echo 'value="1">Dotted Border</option>      <option ';      if($options['box_border_style'] == "2"){ echo ' selected '; } echo 'value="2">Solid Border</option>    </select>	</td>	</tr>	<tr valign="top">	<th scope="row">Inner box Border Color</th><td><input name="box_border_color" type="text" value="'.$options['box_border_color'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Inner box Border Thickness</th><td><input name="box_border_dim" type="text" value="'.$options['box_border_dim'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Inner box Background Color</th><td><input name="box_bg_color" type="text" value="'.$options['box_bg_color'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Alternate Inner box Background Color</th><td><input name="box_bg_color1" type="text" value="'.$options['box_bg_color1'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Mainbox Cellspacing</th><td><input name="outer_cellspacing" type="text" value="'.$options['outer_cellspacing'].'" /></td>	</tr>		<tr valign="top">	<th scope="row">Mainbox Cellpadding</th><td><input name="outer_cellpadding" type="text" value="'.$options['outer_cellpadding'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Inner box Cellspacing</th><td><input name="inner_cellspacing" type="text" value="'.$options['inner_cellspacing'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Inner Cellpadding</th><td><input name="inner_cellpadding" type="text" value="'.$options['inner_cellpadding'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Text Dimensions (in %)</th><td><input name="text_redux" type="text" value="'.$options['text_redux'].'" /></td>	</tr>	<tr valign="top">	<th scope="row">Text for No-Birthdays</th><td><input name="no_bday" type="text" value="'.$options['no_bday'].'" /></td>	</tr>	<input type="hidden" name="mybdays_submit" value="true">	</table>	<p class="submit"><input type="submit" value="Update Options &raquo;"></input></p>	</div>	</form>';	} // End of se_bdays_options function// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXfunction widget_SeBday($args) {  extract($args);  $options = get_option("widget_SeBday");  if (!is_array( $options ))        {                $options = array(      'title' => 'JooMood SE Birthdays',      'numOfGroup' => '3',      'how_many_groups'=>'1',      'data_type'=>'3',      'go_profile_text'=>'See the profile of',      'empty_image_url'=>'images/nophoto.gif',      'pic_dim_width'=>'30',      'pic_dim_height'=>'30',      'nametype'=>'2',      'mainbox_width'=>'100',      'mainbox_border_style'=>'0',      'mainbox_border_color'=>'#333333',      'mainbox_border_dim'=>'1',      'mainbox_bg_color'=>'#ededed',      'box_border_style'=>'0',      'box_border_color'=>'#333333',      'box_border_dim'=>'1',      'box_bg_color'=>'#f7f7f7',      'box_bg_color1'=>'#f4f9ff',      'outer_cellspacing'=>'4',      'outer_cellpadding'=>'2',      'inner_cellspacing'=>'4',      'inner_cellpadding'=>'2',      'text_redux'=>'100',      'use_resize'=>'yes',      'no_bday'=>'No Birthday...'      );  }        	echo $before_widget;    echo $before_title;    echo $options['title'];            $title		 				= $options['title'];    $numOfGroup 				= $options['numOfGroup'];    $how_many_groups 			= $options['how_many_groups'];    $data_type 					= $options['data_type'];    $go_profile_text 			= $options['go_profile_text'];    $empty_image_url 			= $options['empty_image_url'];    $pic_dim_width 				= $options['pic_dim_width'];    $pic_dim_height 			= $options['pic_dim_height'];    $nametype 					= $options['nametype'];	$mainbox_width				= $options['mainbox_width'];	$mainbox_border_style		= $options['mainbox_border_style'];	$mainbox_border_color		= $options['mainbox_border_color'];	$mainbox_border_dim			= $options['mainbox_border_dim'];	$mainbox_bg_color			= $options['mainbox_bg_color'];	$box_border_style			= $options['box_border_style'];	$box_border_color			= $options['box_border_color'];	$box_border_dim				= $options['box_border_dim'];	$box_bg_color				= $options['box_bg_color'];	$box_bg_color1				= $options['box_bg_color1'];	$outer_cellspacing			= $options['outer_cellspacing'];	$outer_cellpadding			= $options['outer_cellpadding'];	$inner_cellspacing			= $options['inner_cellspacing'];	$inner_cellpadding			= $options['inner_cellpadding'];	$text_redux					= $options['text_redux'];	$no_bday					= $options['no_bday'];	$use_resize					= $options['use_resize'];	    	            echo $after_title;		// Load main file	    include(ABSPATH.'wp-content/plugins/wp-se_bdays/main/se_bdays.php');    echo $after_widget;} // End of widget_SeBday function// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXfunction SeBday_control(){  $options = get_option("widget_SeBday");  if (!is_array( $options ))        {                $options = array(      'title' => 'JooMood SE Birthdays',      'numOfGroup' => '3',      'how_many_groups'=>'1',      'data_type'=>'3',      'go_profile_text'=>'See the profile of',      'empty_image_url'=>'images/nophoto.gif',      'pic_dim_width'=>'30',      'pic_dim_height'=>'30',      'nametype'=>'2',      'mainbox_width'=>'100',      'mainbox_border_style'=>'0',      'mainbox_border_color'=>'#333333',      'mainbox_border_dim'=>'1',      'mainbox_bg_color'=>'#ededed',      'box_border_style'=>'0',      'box_border_color'=>'#333333',      'box_border_dim'=>'1',      'box_bg_color'=>'#f7f7f7',      'box_bg_color1'=>'#f4f9ff',      'outer_cellspacing'=>'4',      'outer_cellpadding'=>'2',      'inner_cellspacing'=>'4',      'inner_cellpadding'=>'2',      'text_redux'=>'100',      'use_resize'=>'yes',      'no_bday'=>'No Birthday...'      );  }      if ($_POST['SeBday-Submit'])  {    	    $options['numOfGroup'] = $_POST['SeBday-numOfGroup'];    if($options['numOfGroup']=="") {    $options['numOfGroup']="3";    }    $options['title'] = htmlspecialchars($_POST['SeBday-WidgetTitle']);    if($options['title']=="") {    $options['title']="Last ".$options['numOfGroup']." SE Birthdays";    }     $options['how_many_groups'] = $_POST['SeBday-how_many_groups'];    if($options['how_many_groups']=="") {    $options['how_many_groups']="1";    }     $options['data_type'] = $_POST['SeBday-data_type'];    if ($options['data_type']=="") {    $options['data_type']="3";    }     $options['go_profile_text'] = htmlspecialchars($_POST['SeBday-go_profile_text']);    if($options['go_profile_text']=="") {    $options['go_profile_text']="";    }     $options['empty_image_url'] = $_POST['SeBday-empty_image_url'];    if($options['empty_image_url']=="") {    $options['empty_image_url']="images/nophoto.gif";    }        $options['pic_dim_width'] = $_POST['SeBday-pic_dim_width'];    if($options['pic_dim_width']=="") {    $options['pic_dim_width']="30";    }    $options['pic_dim_height'] = $_POST['SeBday-pic_dim_height'];    if($options['pic_dim_height']=="") {    $options['pic_dim_height']="30";    }    $options['nametype'] = $_POST['SeBday-nametype'];    if ($options['nametype']=="") {    $options['nametype']="2";    }	$options['mainbox_width'] = $_POST['SeBday-mainbox_width'];    if ($options['mainbox_width']=="") {    $options['mainbox_width']="100";    }	$options['mainbox_border_style'] = $_POST['SeBday-mainbox_border_style'];    if ($options['mainbox_border_style']=="") {    $options['mainbox_border_style']="0";    }	$options['mainbox_border_color'] = $_POST['SeBday-mainbox_border_color'];    if ($options['mainbox_border_color']=="") {    $options['mainbox_border_color']="#333333";    }	$options['mainbox_border_dim'] = $_POST['SeBday-mainbox_border_dim'];    if ($options['mainbox_border_dim']=="") {    $options['mainbox_border_dim']="1";    }    	$options['mainbox_bg_color'] = $_POST['SeBday-mainbox_bg_color'];    if ($options['mainbox_bgcolor']=="") {    $options['mainbox_bgcolor']="#ededed";    }	$options['box_border_style'] = $_POST['SeBday-box_border_style'];    if ($options['box_border_style']=="") {    $options['box_border_style']="0";    }	$options['box_border_color'] = $_POST['SeBday-box_border_color'];    if ($options['box_border_color']=="") {    $options['box_border_color']="#333333";    }	$options['box_border_dim'] = $_POST['SeBday-box_border_dim'];    if ($options['box_border_dim']=="") {    $options['box_border_dim']="1";    }    	$options['box_bg_color'] = $_POST['SeBday-box_bg_color'];    if ($options['box_bg_color']=="") {    $options['box_bg_color']="#f7f7f7";    }	$options['box_bg_color1'] = $_POST['SeBday-box_bg_color1'];    if ($options['box_bg_color1']=="") {    $options['box_bg_color1']="#f4f9ff";    }	$options['outer_cellspacing'] = $_POST['SeBday-outer_cellspacing'];    if ($options['outer_cellspacing']=="") {    $options['outer_cellspacing']="4";    }	$options['outer_cellpadding'] = $_POST['SeBday-outer_cellpadding'];    if ($options['outer_cellpadding']=="") {    $options['outer_cellpadding']="2";    }	$options['inner_cellspacing'] = $_POST['SeBday-inner_cellspacing'];    if ($options['inner_cellspacing']=="") {    $options['inner_cellspacing']="4";    }	$options['inner_cellpadding'] = $_POST['SeBday-inner_cellpadding'];    if ($options['inner_cellpadding']=="") {    $options['inner_cellpadding']="2";    }	$options['text_redux'] = $_POST['SeBday-text_redux'];    if ($options['text_redux']=="") {    $options['text_redux']="100";    }    $options['no_bday'] = htmlspecialchars($_POST['SeBday-no_bday']);    if($options['no_bday']=="") {    $options['no_bday']="No Birthday...";    }	$options['use_resize'] = $_POST['SeBday-use_resize'];    if ($options['use_resize']=="") {    $options['use_resize']="yes";    }     update_option("widget_SeBday", $options);  }?>    <p><label for="SeBday-WidgetTitle">Widget Title: </label>    <input class="widefat"  type="text" id="SeBday-WidgetTitle" name="SeBday-WidgetTitle" value="<?php echo $options['title'];?>" /></p>    <p><label for="SeBday-numOfGroup">Total Birthdays: </label>    <input class="widefat"  type="text" id="SeBday-numOfGroup" name="SeBday-numOfGroup" value="<?php echo $options['numOfGroup'];?>" /></p>    <p><label for="SeBday-how_many_groups">Birthdays per Line: </label>    <input class="widefat"  type="text" id="SeBday-how_many_groups" name="SeBday-how_many_groups" value="<?php echo $options['how_many_groups'];?>" /></p>    <p><label for="SeBday-data_type">Type of Showed Data: </label>  	<select name="SeBday-data_type" id="SeBday-data_type">    <option <?php if($options['data_type'] == "1"){ echo ' selected '; } ?>value="1">Pic Only</option>    <option <?php if($options['data_type'] == "2"){ echo ' selected '; } ?>value="2">Text Only</option>    <option <?php if($options['data_type'] == "3"){ echo ' selected '; } ?>value="3">Pic and Text</option></select></p>	<p><label for="SeBday-use_resize">Use the Image Resize Script? </label>	<select name="SeBday-use_resize" id="SeBday-use_resize">	<option <?php if($options['use_resize'] == "yes"){ echo ' selected '; } ?>value="yes">Yes</option>	<option <?php if($options['use_resize'] == "no"){ echo ' selected '; } ?>value="no">No</option>	</select></p>    <p><label for="SeBday-go_profile_text">User Link Title: </label>    <input class="widefat"  type="text" id="SeBday-go_profile_text" name="SeBday-go_profile_text" value="<?php echo $options['go_profile_text'];?>" /></p>    <p><label for="SeBday-empty_image_url">SE Empty Image: </label>    <input class="widefat"  type="text" id="SeBday-empty_image_url" name="SeBday-empty_image_url" value="<?php echo $options['empty_image_url'];?>" /></p>    <p><label for="SeBday-pic_dim_width">Pic Width (in pixel): </label>    <input class="widefat"  type="text" id="SeBday-pic_dim_width" name="SeBday-pic_dim_width" value="<?php echo $options['pic_dim_width'];?>" /></p>    <p><label for="SeBday-pic_dim_height">Pic Width (in pixel): </label>    <input class="widefat"  type="text" id="SeBday-pic_dim_height" name="SeBday-pic_dim_height" value="<?php echo $options['pic_dim_height'];?>" /></p>    <p><label for="SeBday-nametype">Preferred Names: </label>    <select name="SeBday-nametype" id="SeBday-nametype">    <option <?php if($options['nametype'] == "1"){ echo ' selected '; } ?>value="1">Username</option>    <option <?php if($options['nametype'] == "2"){ echo ' selected '; } ?>value="2">Full Name</option></select></p>    <p><label for="SeBday-mainbox_border_style">Mainbox Border Style: </label>    <select name="SeBday-mainbox_border_style" id="SeBday-mainbox_border_style">    <option <?php if($options['mainbox_border_style'] == "0"){ echo ' selected '; } ?>value="0">No Border</option>    <option <?php if($options['mainbox_border_style'] == "1"){ echo ' selected '; } ?>value="1">Dotted Border</option>    <option <?php if($options['mainbox_border_style'] == "2"){ echo ' selected '; } ?>value="2">Solid Border</option></select></p>    <p><label for="SeBday-mainbox_width">Mainbox Width (in %): </label>    <input class="widefat"  type="text" id="SeBday-mainbox_width" name="SeBday-mainbox_width" value="<?php echo $options['mainbox_width'];?>" /></p>    <p><label for="SeBday-mainbox_border_color">Mainbox Border Color: </label>    <input class="widefat"  type="text" id="SeBday-mainbox_border_color" name="SeBday-mainbox_border_color" value="<?php echo $options['mainbox_border_color'];?>" /></p>    <p><label for="SeBday-mainbox_border_dim">Mainbox Border Thickness (in px): </label>    <input class="widefat"  type="text" id="SeBday-mainbox_border_dim" name="SeBday-mainbox_border_dim" value="<?php echo $options['mainbox_border_dim'];?>" /></p>    <p><label for="SeBday-mainbox_bg_color">Mainbox Background Color: </label>    <input class="widefat"  type="text" id="SeBday-mainbox_bg_color" name="SeBday-mainbox_bg_color" value="<?php echo $options['mainbox_bg_color'];?>" /></p>    <p><label for="SeBday-box_border_style">Inner box Border Style: </label>    <select name="SeBday-box_border_style" id="SeBday-box_border_style">    <option <?php if($options['box_border_style'] == "0"){ echo ' selected '; } ?>value="0">No Border</option>    <option <?php if($options['box_border_style'] == "1"){ echo ' selected '; } ?>value="1">Dotted Border</option>    <option <?php if($options['box_border_style'] == "2"){ echo ' selected '; } ?>value="2">Solid Border</option></select></p>   <p><label for="SeBday-box_border_color">Inner box Border Color: </label>    <input class="widefat"  type="text" id="SeBday-box_border_color" name="SeBday-box_border_color" value="<?php echo $options['box_border_color'];?>" /></p>    <p><label for="SeBday-box_border_dim">Inner box Border Thickness (in px): </label>    <input class="widefat"  type="text" id="SeBday-box_border_dim" name="SeBday-box_border_dim" value="<?php echo $options['box_border_dim'];?>" /></p>    <p><label for="SeBday-box_bg_color">Inner box Background Color: </label>    <input class="widefat"  type="text" id="SeBday-box_bg_color" name="SeBday-box_bg_color" value="<?php echo $options['box_bg_color'];?>" /></p>    <p><label for="SeBday-box_bg_color1">Alternate Inner box Background Color: </label>    <input class="widefat"  type="text" id="SeBday-box_bg_color1" name="SeBday-box_bg_color1" value="<?php echo $options['box_bg_color1'];?>" /></p>    <p><label for="SeBday-outer_cellspacing">Mainbox Cellspacing: </label>    <input class="widefat"  type="text" id="SeBday-outer_cellspacing" name="SeBday-outer_cellspacing" value="<?php echo $options['outer_cellspacing'];?>" /></p>    <p><label for="SeBday-outer_cellpadding">Mainbox Cellpadding: </label>    <input class="widefat"  type="text" id="SeBday-outer_cellpadding" name="SeBday-outer_cellpadding" value="<?php echo $options['outer_cellpadding'];?>" /></p>    <p><label for="SeBday-inner_cellspacing">Inner box Cellspacing: </label>    <input class="widefat"  type="text" id="SeBday-inner_cellspacing" name="SeBday-inner_cellspacing" value="<?php echo $options['inner_cellspacing'];?>" /></p>    <p><label for="SeBday-inner_cellpadding">Inner box Cellpadding: </label>    <input class="widefat"  type="text" id="SeBday-inner_cellpadding" name="SeBday-inner_cellpadding" value="<?php echo $options['inner_cellpadding'];?>" /></p>    <p><label for="SeBday-text_redux">Text Dimensions (in %): </label>    <input class="widefat"  type="text" id="SeBday-text_redux" name="SeBday-text_redux" value="<?php echo $options['text_redux'];?>" /></p>    <p><label for="SeBday-no_bday">Text for No-Birthdays: </label>    <input class="widefat"  type="text" id="SeBday-no_bday" name="SeBday-no_bday" value="<?php echo $options['no_bday'];?>" /></p>        <input type="hidden" id="SeBday-Submit" name="SeBday-Submit" value="1" /><?php}//-----------------------------------------------------------------------------//			ACTIONS//-----------------------------------------------------------------------------//uninstall all optionsfunction SeBday_uninstall () {	delete_option('widget_SeBday');}function joomood_bdays_uninstall () {	delete_option('joomood_bdays_options');}function SeBday_init(){  register_sidebar_widget(__('JooMood SE Birthdays'), 'widget_SeBday');  register_widget_control(   'JooMood SE Birthdays', 'SeBday_control', 300, 200 );    }add_action("plugins_loaded", "SeBday_init");add_action('admin_menu', 'joomood_bdays_add_pages');register_activation_hook( __FILE__, 'joomood_bdays_install' );register_deactivation_hook( __FILE__, 'joomood_bdays_uninstall' );?>