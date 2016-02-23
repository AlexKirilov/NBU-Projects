<?php

/* Prepare information about directory or selection of target subdirectory */
function wfu_prepare_subfolders_block($params, $additional_params, $occurrence_index) {
	$plugin_options = wfu_decode_plugin_options(get_option( "wordpress_file_upload_options" ));
	$relaxcss = false;
	if ( isset($plugin_options['relaxcss']) ) $relaxcss = ( $plugin_options['relaxcss'] == "1" );
	
	$sid = $params["uploadid"];
	$widths = $additional_params['widths'];
	$heights = $additional_params['heights'];
	$selectsubdir = 'selectsubdir_'.$sid;
	$editbox = 'selectsubdiredit_'.$sid;
	$defaultvalue = 'selectsubdirdefault_'.$sid;
	$hiddeninput = 'hiddeninput_'.$sid;
	$subfolders_item = null;
	$styles1 = "";
	$styles2 = "";
	if ( $widths["uploadfolder_label"] != "" ) $styles1 .= 'width: '.$widths["uploadfolder_label"].'; display:inline-block;';
	if ( $heights["uploadfolder_label"] != "" ) $styles1 .= 'height: '.$heights["uploadfolder_label"].'; ';
	if ( $styles1 != "" ) $styles1 = ' style="'.$styles1.'"';
	if ( $widths["subfolders_label"] != "" ) $styles2 .= 'width: '.$widths["subfolders_label"].'; display:inline-block;';
	if ( $heights["subfolders_label"] != "" ) $styles2 .= 'height: '.$heights["subfolders_label"].'; ';
	if ( $styles2 != "" ) $styles2 = ' style="'.$styles2.'"';
	$styles3 = "border: 1px solid; border-color: #BBBBBB;";
	$styles4 = "";
	if ( $widths["subfolders_select"] != "" ) $styles4 .= 'width: '.$widths["subfolders_select"].'; ';
	if ( $heights["subfolders_select"] != "" ) $styles4 .= 'height: '.$heights["subfolders_select"].'; ';
	$styles3 = ' style="'.( $relaxcss ? '' : $styles3 ).$styles4.'"';
	if ( $styles4 != "" ) $styles4 = ' style="'.$styles4.'"';
	$linebr = "";
	if ( $params["showtargetfolder"] == "true" || $params["askforsubfolders"] == "true" ) {
		$linebr = '<br />';
		$subfolders_item["title"] = 'wordpress_file_upload_subfolders_'.$sid;
		$subfolders_item["hidden"] = false;
		$subfolders_item["width"] = "";
		if ( $params["fitmode"] == "responsive" ) $subfolders_item["width"] = $widths["subfolders"];
	}
	$i = 1;
	if ( $params["showtargetfolder"] == "true" ) {
		$upload_directory = wfu_upload_plugin_directory($params["uploadpath"]);
		$subfolders_item["line".$i++] = '<span class="subfolder_dir"'.$styles1.'>'.$params["targetfolderlabel"].': <strong>'.$upload_directory.'</strong></span>'.$linebr;
	}
	if ( $params["askforsubfolders"] == "true" ) {
		$subfolders_item["line".$i++] = '<span class="file_item_clean subfolder_label"'.$styles2.'>'.$params["subfolderlabel"].' </span>';
		$subfolders_item["line".$i++] = '<div class="file_item_clean subfolder_container"'.$styles4.'>';
		$autoplus = ( substr($params["subfoldertree"], 0, 5) == "auto+" );
		$subfolders_item["line".$i++] = '<div class="file_item_clean_inner subfolder_autoplus_container"'.( $autoplus ? '' : ' style="display:none;"' ).'>';
		$subfolders_item["line".$i++] = '<input type="text" id="'.$editbox.'" class="file_item_clean_empty subfolder_autoplus_empty" value="'.WFU_SUBDIR_TYPEDIR.'"'.( $autoplus ? '' : ' style="display:none;"' ).' onchange="wfu_selectsubdiredit_change('.$sid.');" onfocus="wfu_selectsubdiredit_enter('.$sid.');" onblur="wfu_selectsubdiredit_exit('.$sid.');" />';
		$subfolders_item["line".$i++] = '</div>';
		if ( $autoplus ) $subfolders_item["line".$i++] = '<div class="subfolder_autoplus_select_container">';
		$subfolders_item["line".$i++] = '<select class="'.( $autoplus ? 'subfolder_autoplus_dropdown' : 'file_item_clean subfolder_dropdown' ).'"'.$styles3.' id="'.$selectsubdir.'" onchange="wfu_selectsubdir_check('.$sid.');">';
		if ( $params["testmode"] == "true" ) {
			$subfolders_item["line".$i++] = "\t".'<option>'.WFU_NOTIFY_TESTMODE.'</option>';
		}
		else {
			$zeroind = $i;
			$subfolders_item["line".$i++] = "\t".'<option'.( substr($params["subfoldertree"], 0, 5) == "auto+" ? ' style="display:none;"' : '' ).'>'.WFU_SUBDIR_SELECTDIR.'</option>';
			if ( substr($params["subfoldertree"], 0, 4) == "auto" ) {
				$upload_directory = wfu_upload_plugin_full_path($params);
				$dirtree = wfu_getTree($upload_directory);
				foreach ( $dirtree as &$dir ) $dir = '*'.$dir;
				$params["subfoldertree"] = implode(',', $dirtree);
			}
			$subfolders = wfu_parse_folderlist($params["subfoldertree"]);
			if ( count($subfolders['path']) == 0 ) {
				array_push($subfolders['path'], "");
				array_push($subfolders['label'], wfu_upload_plugin_directory($params["uploadpath"]));
				array_push($subfolders['level'], 0);
				array_push($subfolders['default'], false);
			}
			$default = -1;
			foreach ($subfolders['path'] as $ind => $subfolder) {
				if ( $subfolders['default'][$ind] ) $default = intval($ind) + 1;
				$subfolders_item["line".$i++] = "\t".'<option'.( $subfolders['default'][$ind] ? ' selected="selected"' : '' ).'>'.str_repeat("&nbsp;&nbsp;&nbsp;", intval($subfolders['level'][$ind])).$subfolders['label'][$ind].'</option>';
			}
			if ( $default != -1 ) $subfolders_item["line".$zeroind] = "\t".'<option style="display:none;">'.WFU_SUBDIR_SELECTDIR.'</option>';
		}
		$subfolders_item["line".$i++] = '</select>';
		if ( $autoplus ) $subfolders_item["line".$i++] = '</div>';
		$subfolders_item["line".$i++] = '</div>';
		$subfolders_item["line".$i++] = '<input id="'.$defaultvalue.'" type="hidden" value="'.$default.'" />';
	}

	return $subfolders_item;
}

/* Prepare the title */
function wfu_prepare_title_block($params, $additional_params, $occurrence_index) {
	$sid = $params["uploadid"];
	$widths = $additional_params['widths'];
	$heights = $additional_params['heights'];
	$title_item = null;
	if ( $params["uploadtitle"] ) {
		$title_item["title"] = 'wordpress_file_upload_title_'.$sid;
		$title_item["hidden"] = false;
		$title_item["width"] = "";
		$styles = "";
		//for responsive plugin adjust container and container's parent widths if a % width has been defined
		if ( $params["fitmode"] == "responsive" && strlen($widths["title"]) > 1 && substr($widths["title"], -1, 1) == "%" ) {
			$title_item["width"] = $widths["title"];
			$styles .= 'width: 100%; ';
		}
		elseif ( $widths["title"] != "" ) $styles .= 'width: '.$widths["title"].'; ';
		if ( $heights["title"] != "" ) $styles .= 'height: '.$heights["title"].'; ';
		if ( $styles != "" ) $styles = ' style="'.$styles.'"';
		$title_item["line1"] = '<span class="file_title_clean"'.$styles.'>'.$params["uploadtitle"].'</span>';
	}

	return $title_item;
}

/* Prepare the text box showing filename */
function wfu_prepare_textbox_block($params, $additional_params, $occurrence_index) {
	$sid = $params["uploadid"];
	$widths = $additional_params['widths'];
	$heights = $additional_params['heights'];
	$textfile = 'fileName_'.$sid;
	$textbox_item["title"] = 'wordpress_file_upload_textbox_'.$sid;
	$textbox_item["hidden"] = false;
	$textbox_item["width"] = "";
	$styles = "";
	//for responsive plugin adjust container and container's parent widths if a % width has been defined
	if ( $params["fitmode"] == "responsive" && strlen($widths["filename"]) > 1 && substr($widths["filename"], -1, 1) == "%" ) {
		$textbox_item["width"] = $widths["filename"];
		$styles .= 'width: 100%; ';
	}
	elseif ( $widths["filename"] != "" ) $styles .= 'width: '.$widths["filename"].'; ';
	if ( $heights["filename"] != "" ) $styles .= 'height: '.$heights["filename"].'; ';
	if ( $styles != "" ) $styles = ' style="'.$styles.'"';
	$textbox_item["line1"] = '<input type="text" id="'.$textfile.'" class="file_input_textbox"'.$styles.' readonly="readonly"/>';

	return $textbox_item;
}

/* Prepare the upload form (required) */
function wfu_prepare_uploadform_block($params, $additional_params, $occurrence_index) {
	$sid = $params["uploadid"];
	$widths = $additional_params['widths'];
	$heights = $additional_params['heights'];
	$clickaction = $additional_params['clickaction'];
	$uploadform = 'uploadform_'.$sid;
	$uploadedfile = 'uploadedfile_'.$sid;
	$upfile = 'upfile_'.$sid;
	$input = 'input_'.$sid;
	$label = $params["selectbutton"];
	$usefilearray = 0;

	$uploadform_item["title"] = 'wordpress_file_upload_form_'.$sid;
	// selectbutton block is mandatory because it contains the upload form element, so in case it is not included in the placements
	// attribute then we set its visibility to hidden
	$uploadform_item["hidden"] = ( strpos($params["placements"], "selectbutton") === false );
	$uploadform_item["width"] = "";
	$styles_form = "";
	$styles = "";
	//for responsive plugin adjust container and container's parent widths if a % width has been defined
	if ( $params["fitmode"] == "responsive" && strlen($widths["selectbutton"]) > 1 && substr($widths["selectbutton"], -1, 1) == "%" ) {
		$uploadform_item["width"] = $widths["selectbutton"];
		$styles .= 'width: 100%; ';
	}
	elseif ( $widths["selectbutton"] != "" ) $styles .= 'width: '.$widths["selectbutton"].'; ';
	if ( $heights["selectbutton"] != "" ) $styles .= 'height: '.$heights["selectbutton"].'; ';
	if ( $styles != "" ) $styles_form = ' style="'.$styles.'"';
	$i = 1;
	$uploadform_item["line".$i++] = '<form class="file_input_uploadform" id="'.$uploadform.'" name="'.$uploadform.'" method="post" enctype="multipart/form-data"'.$styles_form.'>';
	if ( $params["testmode"] == "true" ) $styles .= 'z-index: 500;';
	if ( $styles != "" ) $styles = ' style="'.$styles.'"';
	if ( $params["testmode"] == "true" ) $uploadform_item["line".$i++] = "\t".'<input align="center" type="button" id="'.$input.'" value="'.$label.'" class="file_input_button"'.$styles.' onmouseout="javascript: document.getElementById(\''.$input.'\').className = \'file_input_button\'" onmouseover="javascript: document.getElementById(\''.$input.'\').className = \'file_input_button_hover\'" onclick="alert(\''.WFU_NOTIFY_TESTMODE.'\');" />';
	else $uploadform_item["line".$i++] = "\t".'<input align="center" type="button" id="'.$input.'" value="'.$label.'" class="file_input_button"'.$styles.'/>';
	if ( $params["singlebutton"] == "true" )
		$uploadform_item["line".$i++] = "\t".'<input type="file" class="file_input_hidden" name="'.$uploadedfile.'" id="'.$upfile.'" tabindex="1" onchange="wfu_selectbutton_changed('.$sid.', '.$usefilearray.'); wfu_update_uploadbutton_status('.$sid.'); if (this.value != \'\') {'.$clickaction.'}" onmouseout="javascript: document.getElementById(\''.$input.'\').className = \'file_input_button\'" onmouseover="javascript: document.getElementById(\''.$input.'\').className = \'file_input_button_hover\'" onclick="wfu_selectbutton_clicked('.$sid.');"'.' />';
	else
		$uploadform_item["line".$i++] = "\t".'<input type="file" class="file_input_hidden" name="'.$uploadedfile.'" id="'.$upfile.'" tabindex="1" onchange="wfu_selectbutton_changed('.$sid.', '.$usefilearray.'); wfu_update_uploadbutton_status('.$sid.');" onmouseout="javascript: document.getElementById(\''.$input.'\').className = \'file_input_button\'" onmouseover="javascript: document.getElementById(\''.$input.'\').className = \'file_input_button_hover\'" onclick="wfu_selectbutton_clicked('.$sid.');"'.' />';
	$uploadform_item["line".$i++] = "\t".'<input type="hidden" id="wfu_uploader_nonce_'.$sid.'" name="wfu_uploader_nonce" value="'.wp_create_nonce("wfu-uploader-nonce").'" />';
	$uploadform_item["line".$i++] = "\t".'<input type="hidden" id="hiddeninput_'.$sid.'" name="hiddeninput_'.$sid.'" value="" />';
	$uploadform_item["line".$i++] = "\t".'<input type="hidden" id="uniqueuploadid_'.$sid.'" name="uniqueuploadid_'.$sid.'" value="" />';
	$uploadform_item["line".$i++] = "\t".'<input type="hidden" id="adminerrorcodes_'.$sid.'" name="adminerrorcodes_'.$sid.'" value="" />';
	foreach ($params["userdata_fields"] as $userdata_key => $userdata_field)
		$uploadform_item["line".$i++] = "\t".'<input type="hidden" id="hiddeninput_'.$sid.'_userdata_'.$userdata_key.'" name="hiddeninput_'.$sid.'_userdata_'.$userdata_key.'" value="" />';
	$uploadform_item["line".$i++] = '</form>';

	return $uploadform_item;
}

/* Prepare the submit button */
function wfu_prepare_submit_block($params, $additional_params, $occurrence_index) {
	$sid = $params["uploadid"];
	$widths = $additional_params['widths'];
	$heights = $additional_params['heights'];
	$clickaction = $additional_params['clickaction'];
	$upload = 'upload_'.$sid;
	$default = $params["uploadbutton"];

	$submit_item["title"] = 'wordpress_file_upload_submit_'.$sid;
	$submit_item["hidden"] = false;
	$submit_item["width"] = "";
	$styles = "";
	//for responsive plugin adjust container and container's parent widths if a % width has been defined
	if ( $params["fitmode"] == "responsive" && strlen($widths["uploadbutton"]) > 1 && substr($widths["uploadbutton"], -1, 1) == "%" ) {
		$submit_item["width"] = $widths["uploadbutton"];
		$styles .= 'width: 100%; ';
	}
	elseif ( $widths["uploadbutton"] != "" ) $styles .= 'width: '.$widths["uploadbutton"].'; ';
	if ( $heights["uploadbutton"] != "" ) $styles .= 'height: '.$heights["uploadbutton"].'; ';
	if ( $styles != "" ) $styles = ' style="'.$styles.'"';
	if ( $params["testmode"] == "true" ) $submit_item["line1"] = '<input align="center" type="button" id="'.$upload.'" name="'.$upload.'" value="'.$default.'" class="file_input_submit" onclick="alert(\''.WFU_NOTIFY_TESTMODE.'\');"'.$styles.' />';
	else $submit_item["line1"] = '<input align="center" type="button" id="'.$upload.'" name="'.$upload.'" value="'.$default.'" class="file_input_submit" onclick="'.$clickaction.'"'.$styles.' disabled="disabled" />';
	$submit_item["line2"] = '<input type="hidden" id="'.$upload.'_default" value="'.$default.'" />';

	return $submit_item;
}


/* Prepare the progress bar */
function wfu_prepare_progressbar_block($params, $additional_params, $occurrence_index) {
	$sid = $params["uploadid"];
	$widths = $additional_params['widths'];
	$heights = $additional_params['heights'];
	$progress_bar = 'progressbar_'.$sid;

	$progressbar_item["title"] = 'wordpress_file_upload_progressbar_'.$sid;
	$progressbar_item["hidden"] = ( $params["testmode"] != "true" );
	$progressbar_item["width"] = "";
	$styles = "";
	$styles2 = "";
	//for responsive plugin adjust container and container's parent widths if a % width has been defined
	if ( $params["fitmode"] == "responsive" && strlen($widths["progressbar"]) > 1 && substr($widths["progressbar"], -1, 1) == "%" ) {
		$progressbar_item["width"] = $widths["progressbar"];
		$styles .= 'width: 100%; ';
	}
	elseif ( $widths["progressbar"] != "" ) $styles .= 'width: '.$widths["progressbar"].'; ';
	if ( $widths["progressbar"] != "" ) $styles2 .= 'width: auto; ';
	if ( $heights["progressbar"] != "" ) $styles2 .= 'height: '.$heights["progressbar"].'; ';
	if ( $styles != "" ) $styles = ' style="'.$styles.'"';
	if ( $styles2 != "" ) $styles2 = ' style="'.$styles2.'"';
	$i = 1;
	$progressbar_item["line".$i++] = '<div id="'.$progress_bar.'" class="file_div_clean'.( $params["fitmode"] == "responsive" ? '_responsive' : '' ).'"'.$styles.'>';
	$progressbar_item["line".$i++] = "\t".'<div id="'.$progress_bar.'" class="file_progress_bar"'.$styles2.'>';
	$progressbar_item["line".$i++] = "\t\t".'<div id="'.$progress_bar.'_inner" class="file_progress_inner">';
	$progressbar_item["line".$i++] = "\t\t\t".'<span id="'.$progress_bar.'_animation" class="file_progress_noanimation">&nbsp;</span>';
	$progressbar_item["line".$i++] = "\t\t\t".'<img id="'.$progress_bar.'_imagesafe" class="file_progress_imagesafe" src="'.WFU_IMAGE_SIMPLE_PROGBAR.'" style="display:none;" />';
	$progressbar_item["line".$i++] = "\t\t".'</div>';
	$progressbar_item["line".$i++] = "\t".'</div>';
	$progressbar_item["line".$i++] = '</div>';

	return $progressbar_item;
}

/* Prepare the message block */
function wfu_prepare_message_block($params, $additional_params, $occurrence_index) {
	$sid = $params["uploadid"];
	$widths = $additional_params['widths'];
	$heights = $additional_params['heights'];
	$container_width = "";
	$styles = "";
	//for responsive plugin adjust container and container's parent widths if a % width has been defined
	if ( $params["fitmode"] == "responsive" && strlen($widths["message"]) > 1 && substr($widths["message"], -1, 1) == "%" ) {
		$container_width = $widths["message"];
		$styles .= 'width: 100%; ';
	}
	elseif ( $widths["message"] != "" ) $styles .= 'width: '.$widths["message"].'; ';
	if ( $heights["message"] != "" ) $styles .= 'height: '.$heights["message"].'; ';
	if ( $styles != "" ) $styles = ' style="'.$styles.'"';
	$message_block = wfu_prepare_message_block_skeleton($sid, $styles, ( $params["testmode"] == "true" ));
	$message_item = $message_block["msgblock"];
	$message_item["title"] = 'wordpress_file_upload_message_'.$sid;
	$message_item["hidden"] = ( $params["testmode"] != "true" );
	$message_item["width"] = $container_width;

	return $message_item;
}

/* Prepare the user data block */
function wfu_prepare_userdata_block($params, $additional_params, $occurrence_index) {
	$sid = $params["uploadid"];
	$widths = $additional_params['widths'];
	$heights = $additional_params['heights'];
	$definitions_unindexed = wfu_formfield_definitions();
	$definitions = array();
	foreach ( $definitions_unindexed as $def ) $definitions[$def["type"]] = $def;
	
	$userdata = 'userdata_'.$sid;
	$hiddeninput = 'hiddeninput_'.$sid;

	$userdata_item["title"] = 'wordpress_file_upload_userdata_'.$sid;
	$userdata_item["hidden"] = false;
	$userdata_item["width"] = "";
	$styles1 = "";
	//for responsive plugin adjust container and container's parent widths if a % width has been defined
	if ( $params["fitmode"] == "responsive" && strlen($widths["userdata"]) > 1 && substr($widths["userdata"], -1, 1) == "%" ) {
		$userdata_item["width"] = $widths["userdata"];
		$styles1 .= 'width: 100%; ';
	}
	elseif ( $widths["userdata"] != "" ) $styles1 .= 'width: '.$widths["userdata"].'; ';
	if ( $heights["userdata"] != "" ) $styles1 .= 'height: '.$heights["userdata"].'; ';
	if ( $styles1 != "" ) $styles1 = ' style="'.$styles1.'"';
	$styles2 = "";
	if ( $widths["userdata_label"] != "" ) $styles2 .= 'width: '.$widths["userdata_label"].'; ';
	if ( $heights["userdata_label"] != "" ) $styles2 .= 'height: '.$heights["userdata_label"].'; ';
	if ( $styles2 != "" ) $styles2 = ' style="'.$styles2.'"';
	$styles3 = "";
	if ( $widths["userdata_value"] != "" ) $styles3 .= 'width: '.$widths["userdata_value"].'; ';
	if ( $heights["userdata_value"] != "" ) $styles3 .= 'height: '.$heights["userdata_value"].'; ';
	if ( $styles3 != "" ) $styles3 = ' style="'.$styles3.'"';
	$i = 1;
	$label_template = '<label id="userdata_[sid]_label_[key]" for="userdata_[sid]_field_[key]" class="file_userdata_label"'.$styles2.'>[label]</label>';
	$hint_template = '<div id="userdata_[sid]_hint_[key]" class="file_userdata_hint" style="display:none;" onclick="document.getElementById(\'userdata_[sid]_field_[key]\').focus();">empty</div>';
	foreach ($params["userdata_fields"] as $userdata_key => $userdata_field) {
		//show only fields belonging to $occurrence_index
		if ( $occurrence_index == 0 || $userdata_field["occurrence"] == $occurrence_index ) {
			$userdata_field["sid"] = $sid;
			$userdata_field["key"] = $userdata_key;
			//get field template
			if ( $params["testmode"] == "true" ) $template = $definitions[$userdata_field["type"]]["template_testmode"];
			else $template = $definitions[$userdata_field["type"]]["template"];
			//add field wrapper
			$template = '<div id="userdata_[sid]_fieldwrapper_[key]" class="file_userdata_fieldwrapper[required]"'.$styles3.'><div class="wfu_fieldwrapper_overlay" onclick="document.getElementById(\'userdata_[sid]_field_[key]\').focus();"></div>'.$template.'</div>';
			//add field label, depending on label position
			if ( $userdata_field["labelposition"] == "top" ) $template = $label_template.'<br />'.$template;
			elseif ( $userdata_field["labelposition"] == "right" ) $template = $template.$label_template;
			elseif ( $userdata_field["labelposition"] == "bottom" ) $template = $template.'<br />'.$label_template;
			elseif ( $userdata_field["labelposition"] != "none" ) $template = $label_template.$template;
			//apply template data to templates
			$template = wfu_userdata_apply_template($template, $userdata_field);
			$hint_html = wfu_userdata_apply_template($hint_template, $userdata_field);
			$init_code = wfu_userdata_apply_template($definitions[$userdata_field["type"]]["init_code"], $userdata_field);
			$value_code = wfu_userdata_apply_template($definitions[$userdata_field["type"]]["value_code"], $userdata_field);
			$lock_code = wfu_userdata_apply_template($definitions[$userdata_field["type"]]["lock_code"], $userdata_field);
			$unlock_code = wfu_userdata_apply_template($definitions[$userdata_field["type"]]["unlock_code"], $userdata_field);
			$reset_code = wfu_userdata_apply_template($definitions[$userdata_field["type"]]["reset_code"], $userdata_field);
			$empty_code = wfu_userdata_apply_template($definitions[$userdata_field["type"]]["empty_code"], $userdata_field);
			$validate_code = "";
			if ( $userdata_field["validate"] ) $validate_code = wfu_userdata_apply_template($definitions[$userdata_field["type"]]["validate_code"], $userdata_field);
			$typehook_code = "";
			if ( $userdata_field["typehook"] ) $typehook_code = wfu_userdata_apply_template($definitions[$userdata_field["type"]]["typehook_code"], $userdata_field);
			//generate html code
			$userdata_item["line".$i++] = '<div id="'.$userdata.'_'.$userdata_key.'" class="file_userdata_container"'.$styles1.'>';
			$userdata_item["line".$i++] = "\t".$template;
			$userdata_item["line".$i++] = "\t".$hint_html;
			$userdata_item["line".$i++] = "\t".wfu_inject_js_code($init_code);
			$userdata_item["line".$i++] = "\t".wfu_inject_js_code($value_code);
			$userdata_item["line".$i++] = "\t".wfu_inject_js_code($lock_code);
			$userdata_item["line".$i++] = "\t".wfu_inject_js_code($unlock_code);
			$userdata_item["line".$i++] = "\t".wfu_inject_js_code($reset_code);
			$userdata_item["line".$i++] = "\t".wfu_inject_js_code($empty_code);
			if ( $validate_code != "" ) $userdata_item["line".$i++] = "\t".wfu_inject_js_code($validate_code);
			if ( $typehook_code != "" ) $userdata_item["line".$i++] = "\t".wfu_inject_js_code($typehook_code);
			$userdata_item["line".$i++] = '</div>';
		}
	} 

	return $userdata_item;
}

function wfu_userdata_apply_template($template, $params) {
	return str_replace(array('[sid]', '[key]', '[label]', '[required]', '[default]', '[autocomplete]', '[hintposition]', '[format]', '[group]', '[data]'), array($params["sid"], $params['key'], $params["label"].( $params["required"] ? WFU_USERDATA_REQUIREDLABEL : "" ), ( $params["required"] ? '_required' : '' ), $params["default"], ( $params["donotautocomplete"] ? 'off' : 'on' ), $params["hintposition"], $params["format"], $params["group"], $params["data"]), $template);
}

?>
