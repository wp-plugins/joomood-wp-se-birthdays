<?php

// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					JOOMOOD START PLAYING
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

// SHOW LAST SE X BIRTHDAYS

    include(ABSPATH.'wp-content/plugins/giggi_functions/giggi_database.php');
    require_once(ABSPATH.'wp-content/plugins/giggi_functions/giggi_functions.php');


// Check some data...

if($nametype=="1" OR $nametype=="2") {
$nametypez=$nametype;
} else {
$nametypez="2";
}

		// Check for hidden description
		
		$hiddesc=strtolower($hide_desc);
		if($hiddesc=="yes") {
		$hide_desc="yes";
		} else {
		$hide_desc="no";
		}

		// Check the group description cut-off point
		
        if (!$cut_off=="") {
        $cut="1";
        } else {
        $cut="0";  // vuol dire che l'utente non ha inserito un numero!
        }

		// Check for Splitted Stats
		
		$split_stat=strtolower($split_stat);
		if($split_stat=="yes") {
		$split="1";
		} else {
		$split="0";
		}
		
		// Check if Stats are Showed
		
		$show_stat=strtolower($show_stat);
		if($show_stat=="yes") {
		$shows="1";
		} else {
		$shows="0";
		}
		
		// Check personal width & height...

        if (preg_match ("/^([0-9.,-]+)$/", $pic_dim_width)) {
        $my_w="1";
        } else {
        $my_w="0";  // vuol dire che l'utente non ha inserito un numero!
        }
        if (preg_match ("/^([0-9.,-]+)$/", $pic_dim_height)) {
        $my_h="1";
        } else {
        $my_h="0";  // vuol dire che l'utente non ha inserito un numero!
        }

        if($pic_dim_width=="0" OR $pic_dim_height=="0" OR $pic_dim_width=="" OR $pic_dim_height=="" OR $my_w=="0" OR $my_h=="0") {
        $pic_dimensions="0";
        } else {
        $pic_dimensions="1";
        }

        if($pic_dimensions =="1") {
		
		$mywidth=$pic_dim_width;
		$myheight=$pic_dim_height;
		
		} else {
		$mywidth="60";
		$myheight="60";
		
		}

		// Check Num of Groups...

		if($numOfGroup<0) {
		$numOfGroup=1;
		}

		if($how_many_groups>$numOfGroup) {
		$how_many_groups=$numOfGroup;
		}
		

		// Text Reduction...

		// Check personal width & height...

        if (preg_match ("/^([0-9.,-]+)$/", $text_redux)) {
        $my_t="1";
        } else {
        $my_t="0";  // vuol dire che l'utente non ha inserito un numero!
        }

		if($my_t=="0") {
		$redux="100";
		} else {
		$redux=$text_redux;
		}

// ---------------------------------------------------------

		// Check Main Box border style
		
		if ($mainbox_border_style=="0" OR $mainbox_border_style=="1" OR $mainbox_border_style=="2") {
		$mainbox_border_res="1";
		} else {
		$mainbox_border_res="0";
		}

		// Check Main Box border color
		
		if ($mainbox_border_color!=='') {
		$mainbox_bordercol_res="1";
		} else {
		$mainbox_bordercol_res="0";
		}

		// Substitute empty or wrong fields
		
		if ($mainbox_border_res=="0") {
		$mainboxbord="0px solid";
		} 
		
		if ($mainbox_border_style=="1") {
		$mainboxbord="{$mainbox_border_dim}px dotted";
		} 
		
		if ($mainbox_border_style=="2") {
		$mainboxbord="{$mainbox_border_dim}px solid";
		} 
		

		if ($mainbox_bordercol_res=="0") {
		$mainboxbordcol="#ffffff";
		} else {
		$mainboxbordcol=$mainbox_border_color;
		}
		
		$mainboxbgcol=$mainbox_bg_color;

		$mainbox_width=$mainbox_width."%";
		
		if($mainbox_width=="" || $mainbox_width=="%") {
		$mainbox_width="100%";
		}

// ---------------------------------------------------------

		
		
		// Check Inner Box border style
		
		if ($box_border_style=="0" OR $box_border_style=="1" OR $box_border_style=="2") {
		$box_border_res="1";
		} else {
		$box_border_res="0";
		}

		// Check box border color
		
		if ($box_border_color!=='') {
		$box_bordercol_res="1";
		} else {
		$box_bordercol_res="0";
		}
		
		
		// Substitute empty or wrong fields
		
		if ($box_border_res=="0") {
		$boxbord="0px solid";
		} 
		
		if ($box_border_style=="1") {
		$boxbord="{$box_border_dim}px dotted";
		} 
		
		if ($box_border_style=="2") {
		$boxbord="{$box_border_dim}px solid";
		} 
		

		if ($box_bordercol_res=="0") {
		$boxbordcol="#ffffff";
		} else {
		$boxbordcol=$box_border_color;
		}
		
		$boxbgcol=$box_bg_color;
		$boxbgcol1=$box_bg_color1;
		

		// Build Full Style Variables
		
		$mystyle="style=\"border:".$boxbord." ".$boxbordcol."; background-color: ".$boxbgcol.";\"";
		$mystyle0="style=\"border:".$boxbord." ".$boxbordcol."; background-color: ".$boxbgcol.";\"";
		$mystyle1="style=\"border:".$boxbord." ".$boxbordcol."; background-color: ".$boxbgcol1.";\"";
		$mymainstyle="style=\"border:".$mainboxbord." ".$mainboxbordcol."; background-color: ".$mainboxbgcol.";\"";
		$titlestyle="padding: 0px 2px 2px 0px; border-bottom: 1px solid #CCCCCC; margin-bottom: 2px;";
		$bodystyle="margin-bottom: 0px;";
		$statstyle="font-size: 7pt; color: #777777; font-weight: normal;";
		$smalltxt="font-size:{$redux}%;";



// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					LET'S START QUERY TO RETRIEVE OUR DATA
// ----------------------------------------------------------------------------------------------------------------------------------------------------------


$today=date('Y-m-d');
$myday=substr($today, -5);


// Check if exist at least 1 birthday (otherwise skip all the story and avoid a query)

$query  = "SELECT COUNT(profilevalue_id) as totti
FROM se_profilevalues WHERE substring(profilevalue_4,-5)='{$myday}'";
$result = mysql_query($query);
while($row = mysql_fetch_array($result, MYSQL_ASSOC))

{
$mytot=$row['totti'];
}

if ($mytot<1) {
echo"
<table width=\"{$mainbox_width}\" cellspacing=\"{$outer_cellspacing}\" cellpadding=\"{$outer_cellpadding}\" bgcolor=\"{$mainbox_bg_color}\" {$mymainstyle}>
<tr>
<td>
<table width=\"100%\" cellspacing=\"{$inner_cellspacing}\" cellpadding=\"{$inner_cellpadding}\" ".$mystyle.">
<tr>
<td>{$no_bday}
</td>
</tr>
</table>
</td>
</tr>
</table>
";

} else {

$query  = "SELECT u.*, t.*
FROM se_profilevalues t LEFT JOIN se_users u ON (t.profilevalue_user_id=u.user_id)
WHERE substring(t.profilevalue_4,-5)='{$myday}' limit ".$numOfGroup."";

$result = mysql_query($query);

$i = 0;
$kk=0;
$zz=0;
$pp=0;

while($row = mysql_fetch_array($result, MYSQL_ASSOC))

{
	
// Choose a name...

if ($nametype=="2") {
$mynome=$row['user_displayname'];
} else {
$mynome=$row['user_username'];
}


// How old are u dude?

$miovalore=$today-$row['profilevalue_4'];

// Yo man!

if($how_many_groups>1) {
$yo="({$miovalore})";
} else {
$yo="({$miovalore} years old)";
}

$mydir=$wpdir."/wp-content/plugins/wp-se_bdays";
$subdir = $row['user_id']+999-(($row['user_id']-1)%1000);

if($use_resize !=="no") { // RESIZING SCRIPT

if ($row['user_photo']!='') {
// Creates a thumbnail based on your personal dims (width/height), without stretching the original pic
$mypic="<img src=\"{$mydir}/image.php/{$row['user_photo']}?width={$mywidth}&amp;height={$myheight}&amp;cropratio=1:1&amp;quality=100&amp;image={$socialdir}/uploads_user/{$subdir}/{$row['user_id']}/{$row['user_photo']}\" style=\"border:".$image_border."px solid ".$image_bordercolor."\" alt=\"".$myn."\" />";
} else {
$mypic="<img src=\"{$mydir}/image.php/nophoto.gif?width={$mywidth}&amp;height={$myheight}&amp;cropratio=1:1&amp;quality=100&amp;image={$socialdir}/{$empty_image_url}\" style=\"border:".$image_border."px ".$image_bordercolor." solid\" alt=\"".$myn."\" />";
}

} else { // NO RESIZING SCRIPT

if ($row['user_photo']!='') {
// Creates a thumbnail based on your personal dims (width/height)
$myp=str_replace(".", "_thumb.", $row['user_photo']);
$mypfile=$socialdir."/uploads_user/{$subdir}/{$row['user_id']}/{$myp}";

if (@fopen($mypfile, "r")) {
$myps=str_replace(".", "_thumb.", $row['user_photo']);
$mypfile=$socialdir."/uploads_user/{$subdir}/{$row['user_id']}/{$myps}";
} else {
$mypfile=$socialdir."/uploads_user/{$subdir}/{$row['user_id']}/{$row['user_photo']}";
}

$mypic="<img src=\"{$mypfile}\" width=\"{$mywidth}\" height=\"{$myheight}\" style=\"border:".$image_border."px solid ".$image_bordercolor."\" alt=\"".$myn."\" />";
} else {
$mypic="<img src=\"{$socialdir}/{$empty_image_url}\" width=\"{$mywidth}\" height=\"{$myheight}\" style=\"border:".$image_border."px ".$image_bordercolor." solid\" alt=\"".$myn."\" />";
}

}


// Alternate Color

if ($pp%2 !==0) {
$mystyle=$mystyle1;
} else {
$mystyle=$mystyle0;
}


// Create a link to the user profile

if ($data_type=="1") {
$mylink="<a href=\"".$socialdir."/profile.php?user_id={$row['user_id']}\" title=\"{$mynome} {$yo}\">";
} else {
$mylink="<a href=\"".$socialdir."/profile.php?user_id={$row['user_id']}\" title=\"{$go_profile_text} {$mynome}\">";
}


// Show Pic and Text

if ($data_type=="3") {

if($how_many_groups>1) {
$loo=floor(100/$how_many_groups)."%";
} else {
$loo="100%";
}
$myw="width=\"{$loo}\" ";
$textdata="
<table width=\"100%\" cellspacing=\"{$inner_cellspacing}\" cellpadding=\"{$inner_cellpadding}\" ".$mystyle.">
<tr>
<td width=\"{$mywidth}\" align=\"left\" valign=\"top\">{$mylink}{$mypic}</a></td>
<td align=\"left\" valign=\"middle\"><div style=\"{$smalltxt}\">{$mylink}{$mynome}</a> {$yo}</div>
</td>
</tr>
</table>
</td>
";
} 

// Show Only Text

else if ($data_type=="2") {

if($how_many_groups>1) {
$loo=floor(100/$how_many_groups)."%";
} else {
$loo="100%";
}
$myw="width=\"{$loo}\" ";
$textdata="
<table width=\"100%\" cellspacing=\"{$inner_cellspacing}\" cellpadding=\"{$inner_cellpadding}\" ".$mystyle.">
<tr>
<td width=\"{$mywidth}\" align=\"left\"><div style=\"{$smalltxt}\">{$mylink}{$mynome}</a> {$yo}</div>
</td>
</tr>
</table>
</td>
";
} 

// Show Only Pic

else {
$myw="width=\"{$mywidth}\" ";
$textdata="
{$mylink}{$mypic}</a>
</td>
";
}


if($i<$how_many_groups) {


$rows .= "
<td align=\"left\" valign=\"top\" {$myw}>
{$textdata}";

} else {

$rows .= "
</tr><tr><td align=\"left\" valign=\"top\" {$myw}>
{$textdata}";

$i=0;
}

$i++;
$pp++;

}

if ($data_type=="1") {
$www=$mywidth*$pp;
$content .=" <table width=\"{$www}\" cellspacing=\"{$outer_cellspacing}\" cellpadding=\"{$outer_cellpadding}\" bgcolor=\"{$mainbox_bg_color}\" {$mymainstyle}><tr>";
} else {
$content .=" <table width=\"{$mainbox_width}\" cellspacing=\"{$outer_cellspacing}\" cellpadding=\"{$outer_cellpadding}\" bgcolor=\"{$mainbox_bg_color}\" {$mymainstyle}><tr>";
}
$content .="{$rows}";

$content .="</tr></table>";

echo $content;

}


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					END OF JOOMOOD FUNNY TOY
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

?>