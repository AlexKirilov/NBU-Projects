<?php

$siteurl = site_url();

/************ Translatable Strings ************/
//plugin default values
DEFINE("WFU_UPLOADTITLE", __('Upload files', 'wp-file-upload'));
DEFINE("WFU_SELECTBUTTON", __('Select File', 'wp-file-upload'));
DEFINE("WFU_UPLOADBUTTON", __('Upload File', 'wp-file-upload'));
DEFINE("WFU_NOTIFYSUBJECT", __('File Upload Notification', 'wp-file-upload'));
DEFINE("WFU_NOTIFYMESSAGE", __("Dear Recipient,%n%%n%   This is an automatic delivery message to notify you that a new file has been uploaded.%n%%n%Best Regards", 'wp-file-upload'));
DEFINE("WFU_SUCCESSMESSAGE", __('File %filename% uploaded successfully', 'wp-file-upload'));
DEFINE("WFU_WARNINGMESSAGE", __('File %filename% uploaded successfully but with warnings', 'wp-file-upload'));  
DEFINE("WFU_ERRORMESSAGE", __('File %filename% not uploaded', 'wp-file-upload'));
DEFINE("WFU_WAITMESSAGE", __('File %filename% is being uploaded', 'wp-file-upload'));  
DEFINE("WFU_USERDATALABEL", __('Your message', 'wp-file-upload')."|t:text|s:left|r:0|a:0|p:inline|d:");
DEFINE("WFU_CAPTCHAPROMPT", __('Please fill in the above words: ', 'wp-file-upload'));
//browser default values
DEFINE("WFU_FILETITLE", __('File', 'wp-file-upload'));
DEFINE("WFU_DATETITLE", __('Date', 'wp-file-upload'));
DEFINE("WFU_SIZETITLE", __('Size', 'wp-file-upload'));
DEFINE("WFU_USERTITLE", __('User', 'wp-file-upload'));
DEFINE("WFU_POSTTITLE", __('Page', 'wp-file-upload'));
DEFINE("WFU_FIELDSTITLE", __('User Fields', 'wp-file-upload'));
DEFINE("WFU_DOWNLOADLABEL", __('Download', 'wp-file-upload'));
DEFINE("WFU_DOWNLOADTITLE", __('Download this file', 'wp-file-upload'));
DEFINE("WFU_DELETELABEL", __('Delete', 'wp-file-upload'));
DEFINE("WFU_DELETETITLE", __('Delete this file', 'wp-file-upload'));
DEFINE("WFU_SORTTITLE", __('Sort list based on this column', 'wp-file-upload'));
DEFINE("WFU_GUESTTITLE", __('guest', 'wp-file-upload'));
DEFINE("WFU_UNKNOWNTITLE", __('unknown', 'wp-file-upload'));
//error messages
DEFINE("WFU_ERROR_ADMIN_FTPDIR_RESOLVE", __("Error. Could not resolve ftp target filedir. Check the domain in 'ftpinfo' attribute.", "wp-file-upload"));
DEFINE("WFU_ERROR_ADMIN_FTPINFO_INVALID", __("Error. Invalid ftp information. Check 'ftpinfo' attribute.", "wp-file-upload"));
DEFINE("WFU_ERROR_ADMIN_FTPINFO_EXTRACT", __("Error. Could not extract ftp information from 'ftpinfo' attribute. Check its syntax.", "wp-file-upload"));
DEFINE("WFU_ERROR_ADMIN_FTPFILE_RESOLVE", __("Error. Could not resolve ftp target filename. Check the domain in 'ftpinfo' attribute.", "wp-file-upload"));
DEFINE("WFU_ERROR_ADMIN_FILE_PHP_SIZE", __("Error. The upload size limit of PHP directive upload_max_filesize is preventing the upload of big files.\nPHP directive upload_max_filesize limit is: ".ini_get("upload_max_filesize").".\nTo increase the limit change the value of the directive from php.ini.\nIf you don't have access to php.ini, then try adding the following line to your .htaccess file:\n\nphp_value upload_max_filesize 10M\n\n(adjust the size according to your needs)\n\nThe file .htaccess is found in your website root directory (where index.php is found).\nIf your don't have this file, then create it.\nIf this does not work either, then contact your domain provider.", "wp-file-upload"));
DEFINE("WFU_ERROR_ADMIN_FILE_PHP_TIME", __("The upload time limit of PHP directive max_input_time is preventing the upload of big files.\nPHP directive max_input_time limit is: ".ini_get("max_input_time")." seconds.\nTo increase the limit change the value of the directive from php.ini.\nIf you don't have access to php.ini, then add the following line to your .htaccess file:\n\nphp_value max_input_time 500\n\n(adjust the time according to your needs)\n\nThe file .htaccess is found in your website root directory (where index.php is found).\nIf your don't have this file, then create it.\nIf this does not work either, then contact your domain provider.", "wp-file-upload"));
DEFINE("WFU_ERROR_ADMIN_DIR_PERMISSION", __("Error. Permission denied to write to target folder.\nCheck and correct read/write permissions of target folder.", "wp-file-upload"));
DEFINE("WFU_ERROR_ADMIN_FILE_WRONGEXT", __("Error. This file was rejected because its extension is not correct. Its proper filename is: ", "wp-file-upload"));
DEFINE("WFU_ERROR_DIR_EXIST", __("Targer folder doesn't exist.", "wp-file-upload"));
DEFINE("WFU_ERROR_DIR_NOTEMP", __("Upload failed! Missing a temporary folder.", "wp-file-upload"));
DEFINE("WFU_ERROR_DIR_PERMISSION", __("Upload failed! Permission denied to write to target folder.", "wp-file-upload"));
DEFINE("WFU_ERROR_FILE_ALLOW", __("File not allowed.", "wp-file-upload"));
DEFINE("WFU_ERROR_FILE_REJECT", __("File is suspicious and was rejected.", "wp-file-upload"));
DEFINE("WFU_ERROR_FILE_PLUGIN_SIZE", __("The uploaded file exceeds the file size limit.", "wp-file-upload"));
DEFINE("WFU_ERROR_FILE_PLUGIN_2GBSIZE", __("The uploaded file exceeds 2GB and is not supported by this server.", "wp-file-upload"));
DEFINE("WFU_ERROR_FILE_PHP_SIZE", __("Upload failed! The uploaded file exceeds the file size limit of the server. Please contact the administrator.", "wp-file-upload"));
DEFINE("WFU_ERROR_FILE_PHP_TIME", __("Upload failed! The duration of the upload exceeded the time limit of the server. Please contact the administrator.", "wp-file-upload"));
DEFINE("WFU_ERROR_FILE_HTML_SIZE", __("Upload failed! The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.", "wp-file-upload"));
DEFINE("WFU_ERROR_FILE_PARTIAL", __("Upload failed! The uploaded file was only partially uploaded.", "wp-file-upload"));
DEFINE("WFU_ERROR_FILE_NOTHING", __("Upload failed! No file was uploaded.", "wp-file-upload"));
DEFINE("WFU_ERROR_FILE_WRITE", __("Upload failed! Failed to write file to disk.", "wp-file-upload"));
DEFINE("WFU_ERROR_FILE_MOVE", __("Upload failed! Error occured while moving temporary file. Please contact administrator.", "wp-file-upload"));
DEFINE("WFU_ERROR_UPLOAD_STOPPED", __("Upload failed! A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help.", "wp-file-upload"));
DEFINE("WFU_ERROR_UPLOAD_FAILED_WHILE", __("Upload failed! Error occured while attemting to upload the file.", "wp-file-upload"));
DEFINE("WFU_ERROR_UPLOAD_FAILED", __("Upload failed!", "wp-file-upload"));
DEFINE("WFU_ERROR_UPLOAD_NOFILESELECTED", __("No file!", "wp-file-upload"));
DEFINE("WFU_ERROR_UPLOAD_CANCELLED", __("Upload failed! The upload has been canceled by the user or the browser dropped the connection.", "wp-file-upload"));
DEFINE("WFU_ERROR_UNKNOWN", __("Upload failed! Unknown error.", "wp-file-upload"));
DEFINE("WFU_ERROR_CONTACT_ADMIN", __("Please contact the administrator.", "wp-file-upload"));
DEFINE("WFU_ERROR_REMOTESERVER_NORESULT", __("No result from remote server!", "wp-file-upload"));
DEFINE("WFU_ERROR_JSONPARSE_FILEMESSAGE", __(" but with warnings", "wp-file-upload"));
DEFINE("WFU_ERROR_JSONPARSE_MESSAGE", __("Warning: JSON parse error.", "wp-file-upload"));
DEFINE("WFU_ERROR_JSONPARSE_ADMINMESSAGE", __("Upload parameters of this file, passed as JSON string to the handler, could not be parsed.", "wp-file-upload"));
DEFINE("WFU_ERROR_JSONPARSE_HEADERMESSAGE", __("Warning: JSON parse error.", "wp-file-upload"));
DEFINE("WFU_ERROR_JSONPARSE_HEADERADMINMESSAGE", __("UploadStates, passed as JSON string to the handler, could not be parsed.", "wp-file-upload"));
DEFINE("WFU_ERROR_REDIRECTION_ERRORCODE0", __("Redirection to classic form functionality occurred due to unknown error.", "wp-file-upload"));
DEFINE("WFU_ERROR_REDIRECTION_ERRORCODE1", __("Redirection to classic form functionality occurred because AJAX is not supported.", "wp-file-upload"));
DEFINE("WFU_ERROR_REDIRECTION_ERRORCODE2", __("Redirection to classic form functionality occurred because HTML5 is not supported.", "wp-file-upload"));
DEFINE("WFU_ERROR_REDIRECTION_ERRORCODE3", __("Redirection to classic form functionality occurred due to JSON parse error.", "wp-file-upload"));
DEFINE("WFU_ERROR_ENABLE_POPUPS", __("Please enable popup windows from the browser's settings!", "wp-file-upload"));
DEFINE("WFU_ERROR_USERDATA_EMPTY", __("cannot be empty!", "wp-file-upload"));
DEFINE("WFU_ERROR_USERDATANUMBER_INVALID", __("number not valid!", "wp-file-upload"));
DEFINE("WFU_ERROR_USERDATAEMAIL_INVALID", __("email not valid!", "wp-file-upload"));
DEFINE("WFU_ERROR_USERDATACONFIRMEMAIL_NOMATCH", __("emails do not match!", "wp-file-upload"));
DEFINE("WFU_ERROR_USERDATACONFIRMEMAIL_NOBASE", __("no base email field in group!", "wp-file-upload"));
DEFINE("WFU_ERROR_USERDATACONFIRMPASSWORD_NOMATCH", __("passwords do not match!", "wp-file-upload"));
DEFINE("WFU_ERROR_USERDATACONFIRMPASSWORD_NOBASE", __("no base password field in group!", "wp-file-upload"));
DEFINE("WFU_ERROR_USERDATACHECKBOX_NOTCHECKED", __("checkbox unchecked!", "wp-file-upload"));
DEFINE("WFU_ERROR_USERDATARADIO_NOTSELECTED", __("no option selected!", "wp-file-upload"));
DEFINE("WFU_ERROR_USERDATALIST_NOITEMSELECTED", __("no item selected!", "wp-file-upload"));
DEFINE("WFU_ERROR_SAME_PLUGINID", __("There are more than one instances of the plugin in this page with the same id. Please change it.", "wp-file-upload"));
DEFINE("WFU_ERROR_PAGE_OBSOLETE", __("Cannot edit the shortcode because the page has been modified. Please reload the page.", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_OLDPHP", __("ERROR: Captcha not supported! You have an old PHP version. Upgrade your PHP or use RecaptchaV2 (no account).", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_NOSITEKEY", __("ERROR: No site key. Please contact administrator!", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_NOSITEKEY_ADMIN", __("ERROR: No site key defined! Please go to the plugin settings in Dashboard to define Google Recaptcha keys.", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_NOCHALLENGE", __("Bad captcha image!", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_NOINPUT", __("No input!", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_EMPTY", __("Captcha not completed!", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_WRONGCAPTCHA", __("Wrong captcha!", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_REFRESHING", __("Error refreshing captcha!", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_UNKNOWNERROR", __("Unknown captcha error!", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_NOTSUPPORTED", __("Captcha not supported by your browser!", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_MISSINGINPUTSECRET", __("the secret parameter is missing", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_INVALIDINPUTSECRET", __("the secret parameter is invalid or malformed", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_MISSINGINPUTRESPONSE", __("the response parameter is missing", "wp-file-upload"));
DEFINE("WFU_ERROR_CAPTCHA_INVALIDINPUTRESPONSE", __("the response parameter is invalid or malformed", "wp-file-upload"));
DEFINE("WFU_ERROR_REDIRECTION_NODRAGDROP", __("Please do not use drag drop due to an internal problem.", "wp-file-upload"));
DEFINE("WFU_ERROR_CHUNKEDUPLOAD_UNIQUEIDEMPTY", __("Error during chunked upload. Unique ID empty in chunk %d", "wp-file-upload"));
DEFINE("WFU_ERROR_CHUNKEDUPLOAD_NOTALLOWED", __("Chunked upload is not allowed!", "wp-file-upload"));
DEFINE("WFU_ERROR_CHUNKEDUPLOAD_ABORTED", __("Chunked upload aborted due to error in previous chunk!", "wp-file-upload"));
DEFINE("WFU_ERROR_CHUNKEDUPLOAD_CONCATFAILED", __("Chunked upload failed, final file could not be created!", "wp-file-upload"));
DEFINE("WFU_ERROR_ADMIN_CHUNKWRITEFAILED", __("Could not write file chuck to destination on chunk %d", "wp-file-upload"));
DEFINE("WFU_ERROR_ADMIN_CHUNKENLARGEFAILED", __("Could not enlarge destination file on chunk %d", "wp-file-upload"));
DEFINE("WFU_ERROR_ADMIN_CHUNKHANDLEFAILED", __("Could not open file handles on chunk %d", "wp-file-upload"));
DEFINE("WFU_BROWSER_DELETEFILE_NOTALLOWED", __("You are not allowed to delete this file!", "wp-file-upload"));
//warning messages
DEFINE("WFU_WARNING_FILE_EXISTS", __("Upload skipped! File already exists.", "wp-file-upload"));
DEFINE("WFU_WARNING_FILE_SUSPICIOUS", __("The extension of the file does not match its contents.", "wp-file-upload"));
DEFINE("WFU_WARNING_ADMIN_FILE_SUSPICIOUS", __("Upload succeeded but the file is suspicious because its contents do not match its extension. Its proper filename is: ", "wp-file-upload"));
DEFINE("WFU_WARNING_NOFILES_SELECTED", __("No files have been selected!", "wp-file-upload"));
DEFINE("WFU_WARNING_WPFILEBASE_NOTUPDATED_NOFILES", __("WPFilebase Plugin not updated because there were no files uploaded.", "wp-file-upload"));
DEFINE("WFU_WARNING_NOTIFY_NOTSENT_NOFILES", __("Notification email was not sent because there were no files uploaded.", "wp-file-upload"));
DEFINE("WFU_WARNING_NOTIFY_NOTSENT_NORECIPIENTS", __("Notification email was not sent because no recipients were defined. Please check notifyrecipients attribute in the shortcode.", "wp-file-upload"));
DEFINE("WFU_WARNING_NOTIFY_NOTSENT_UNKNOWNERROR", __("Notification email was not sent due to an error. Please check notifyrecipients, notifysubject and notifymessage attributes for errors.", "wp-file-upload"));
DEFINE("WFU_WARNING_REDIRECT_NOTEXECUTED_EMPTY", __("Redirection not executed because redirection link is empty. Please check redirectlink attribute.", "wp-file-upload"));
DEFINE("WFU_WARNING_REDIRECT_NOTEXECUTED_FILESFAILED", __("Redirection not executed because not all files were successfully uploaded.", "wp-file-upload"));
//admin area messages
DEFINE("WFU_DASHBOARD_ADD_SHORTCODE_REJECTED", __("Failed to add the shortcode to the page/post. Please try again. If the message persists, contact administrator.", "wp-file-upload"));
DEFINE("WFU_DASHBOARD_EDIT_SHORTCODE_REJECTED", __("Failed to edit the shortcode because the contents of the page changed. Try again to edit the shortcode.", "wp-file-upload"));
DEFINE("WFU_DASHBOARD_DELETE_SHORTCODE_REJECTED", __("Failed to delete the shortcode because the contents of the page changed. Try again to delete it.", "wp-file-upload"));
DEFINE("WFU_DASHBOARD_PAGE_OBSOLETE", __("The page containing the shortcode has been modified and it is no longer valid. Please go back to reload the shortcode.", "wp-file-upload"));
DEFINE("WFU_DASHBOARD_UPDATE_SHORTCODE_REJECTED", __("Failed to update the shortcode because the contents of the page changed. Go back to reload the shortcode.", "wp-file-upload"));
DEFINE("WFU_DASHBOARD_UPDATE_SHORTCODE_FAILED", __("Failed to update the shortcode. Please try again. If the problem persists, go back and reload the shortcode.", "wp-file-upload"));
//test messages
DEFINE("WFU_TESTMESSAGE_MESSAGE", __('This is a test message', 'wp-file-upload'));
DEFINE("WFU_TESTMESSAGE_ADMINMESSAGE", __('This is a test administrator message', 'wp-file-upload'));
DEFINE("WFU_TESTMESSAGE_FILE1_HEADER", __('File testfile 1 under test', 'wp-file-upload'));
DEFINE("WFU_TESTMESSAGE_FILE1_MESSAGE", __('File testfile 1 message', 'wp-file-upload'));
DEFINE("WFU_TESTMESSAGE_FILE1_ADMINMESSAGE", __('File testfile 1 administrator message', 'wp-file-upload'));
DEFINE("WFU_TESTMESSAGE_FILE2_HEADER", __('File testfile 2 under test', 'wp-file-upload'));
DEFINE("WFU_TESTMESSAGE_FILE2_MESSAGE", __('File testfile 2 message', 'wp-file-upload'));
DEFINE("WFU_TESTMESSAGE_FILE2_ADMINMESSAGE", __('File testfile 2 administrator message', 'wp-file-upload'));
//variables tool-tips
DEFINE("WFU_VARIABLE_TITLE_USERID", __("Insert variable %userid% inside text. It will be replaced by the id of the current user.", "wp-file-upload"));
DEFINE("WFU_VARIABLE_TITLE_USERNAME", __("Insert variable %username% inside text. It will be replaced by the username of the current user.", "wp-file-upload"));
DEFINE("WFU_VARIABLE_TITLE_USEREMAIL", __("Insert variable %useremail% inside text. It will be replaced by the email of the current user.", "wp-file-upload"));
DEFINE("WFU_VARIABLE_TITLE_FILENAME", __("Insert variable %filename% inside text. It will be replaced by the filename of the uploaded file.", "wp-file-upload"));
DEFINE("WFU_VARIABLE_TITLE_FILEPATH", __("Insert variable %filepath% inside text. It will be replaced by the full filepath of the uploaded file.", "wp-file-upload"));
DEFINE("WFU_VARIABLE_TITLE_BLOGID", __("Insert variable %blogid% inside text. It will be replaced by the blog id of the website.", "wp-file-upload"));
DEFINE("WFU_VARIABLE_TITLE_PAGEID", __("Insert variable %pageid% inside text. It will be replaced by the id of the current page.", "wp-file-upload"));
DEFINE("WFU_VARIABLE_TITLE_PAGETITLE", __("Insert variable %pagetitle% inside text. It will be replaced by the title of the current page.", "wp-file-upload"));
DEFINE("WFU_VARIABLE_TITLE_USERDATAXXX", __("Insert variable %userdataXXX% inside text. Select the user field from the drop-down list. It will be replaced by the value that the user entered in this field.", "wp-file-upload"));
DEFINE("WFU_VARIABLE_TITLE_N", __("Insert variable %n% inside text to denote a line change.", "wp-file-upload"));
//other plugin values
DEFINE("WFU_NOTIFY_TESTMODE", __("Test Mode", "wp-file-upload"));
DEFINE("WFU_SUBDIR_SELECTDIR", __("select dir...", "wp-file-upload"));
DEFINE("WFU_SUBDIR_TYPEDIR", __("type dir", "wp-file-upload"));
DEFINE("WFU_SUCCESSMESSAGE_DETAILS", __('Upload path: %filepath%', 'wp-file-upload'));
DEFINE("WFU_FAILMESSAGE_DETAILS", __('Failed upload path: %filepath%', 'wp-file-upload'));
DEFINE("WFU_USERDATA_REQUIREDLABEL", __(' (required)', 'wp-file-upload'));
DEFINE("WFU_PAGEEXIT_PROMPT", __('Files are being uploaded. Are you sure you want to exit the page?', 'wp-file-upload'));
DEFINE("WFU_MESSAGE_CAPTCHA_CHECKING", __("checking captcha...", "wp-file-upload"));
DEFINE("WFU_MESSAGE_CAPTCHA_REFRESHING", __("refreshing...", "wp-file-upload"));
DEFINE("WFU_MESSAGE_CAPTCHA_OK", __("correct captcha", "wp-file-upload"));
DEFINE("WFU_CONFIRMBOX_CAPTION", __("click to continue the upload", "wp-file-upload"));
DEFINE("WFU_BROWSER_DELETEFILE_PROMPT", __("Are you sure you want to delete this file?", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE0", __("Upload in progress", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE1", __("Upload in progress with warnings!", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE2", __("Upload in progress but some files already failed!", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE3", __("Upload in progress but no files uploaded so far!", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE4", __("All files uploaded successfully", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE5", __("All files uploaded successfully but there are warnings!", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE5_SINGLEFILE", __("File uploaded successfully but there are warnings!", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE6", __("Some files failed to upload!", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE7", __("All files failed to upload", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE7_SINGLEFILE", __("File failed to upload", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE8", __("There are no files to upload!", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE9", __("Test upload message", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE10", __("JSON parse warning!", "wp-file-upload"));
DEFINE("WFU_UPLOAD_STATE11", __("please wait while redirecting...", "wp-file-upload"));
DEFINE("WFU_PAGE_PLUGINEDITOR_BUTTONTITLE", __("Open visual shortcode editor in new window", "wp-file-upload"));
DEFINE("WFU_PAGE_PLUGINEDITOR_LOADING", __("loading visual editor", "wp-file-upload"));
DEFINE("WFU_CONFIRM_CLEARFILES", __("Clear file list?", "wp-file-upload"));
DEFINE("WFU_DROP_HERE_MESSAGE", __('DROP HERE', 'wp-file-upload'));
//widget values
DEFINE("WFU_WIDGET_PLUGINFORM_TITLE", __('Wordpress File Upload Form', 'wp-file-upload'));
DEFINE("WFU_WIDGET_PLUGINFORM_DESCRIPTION", __('Wordpress File Upload plugin uploader for sidebars', 'wp-file-upload'));
DEFINE("WFU_WIDGET_SIDEBAR_DEFAULTTITLE", __('Upload Files', 'wp-file-upload'));

/*********** Environment Variables ************/
//plugin default values
DEFINE("WFU_UPLOADID", "1");
DEFINE("WFU_SINGLEBUTTON", "false");
DEFINE("WFU_UPLOADROLE", "all,guests");
DEFINE("WFU_UPLOADPATH", 'uploads');
DEFINE("WFU_FITMODE", 'fixed');
DEFINE("WFU_CREATEPATH", "false");
DEFINE("WFU_FORCEFILENAME", "false");
DEFINE("WFU_UPLOADPATTERNS", "*.*");
DEFINE("WFU_MAXSIZE", "50");
DEFINE("WFU_ACCESSMETHOD", "normal");
DEFINE("WFU_FTPINFO", "");
DEFINE("WFU_USEFTPDOMAIN", "false");
DEFINE("WFU_FTPPASSIVEMODE", "false");
DEFINE("WFU_FTPFILEPERMISSIONS", "");
DEFINE("WFU_DUBLICATESPOLICY", "overwrite");
DEFINE("WFU_UNIQUEPATTERN", "index");
DEFINE("WFU_FILEBASELINK", "false");
DEFINE("WFU_NOTIFY", "false");
DEFINE("WFU_NOTIFYRECIPIENTS", "");
DEFINE("WFU_NOTIFYHEADERS", "");    
DEFINE("WFU_ATTACHFILE", "false");
DEFINE("WFU_REDIRECT", "false");
DEFINE("WFU_REDIRECTLINK", "");
DEFINE("WFU_ADMINMESSAGES", "false");
DEFINE("WFU_SUCCESSMESSAGECOLOR", "green");
DEFINE("WFU_SUCCESSMESSAGECOLORS", "#006600,#EEFFEE,#006666");
DEFINE("WFU_WARNINGMESSAGECOLORS", "#F88017,#FEF2E7,#633309");
DEFINE("WFU_FAILMESSAGECOLORS", "#660000,#FFEEEE,#666600");
DEFINE("WFU_WAITMESSAGECOLORS", "#666666,#EEEEEE,#333333");  
DEFINE("WFU_SHOWTARGETFOLDER", "false");
DEFINE("WFU_TARGETFOLDERLABEL", "Upload Directory");
DEFINE("WFU_ASKFORSUBFOLDERS", "false");
DEFINE("WFU_SUBFOLDERLABEL", "Select Subfolder");
DEFINE("WFU_SUBFOLDERTREE", "");
DEFINE("WFU_FORCECLASSIC", "false");
DEFINE("WFU_TESTMODE", "false");
DEFINE("WFU_DEBUGMODE", "false");
DEFINE("WFU_WIDTHS", "");
DEFINE("WFU_HEIGHTS", "");
DEFINE("WFU_PLACEMENTS", "title/filename+selectbutton+uploadbutton/subfolders"."/userdata"."/message");    
DEFINE("WFU_USERDATA", "false");               
DEFINE("WFU_MEDIALINK", "false");
DEFINE("WFU_POSTLINK", "false");
//other plugin values
DEFINE("WFU_MAX_TIME_LIMIT", ini_get("max_input_time"));
DEFINE("WFU_PHP_ARRAY_MAXLEN", '10000');
DEFINE("WFU_HISTORYLOG_TABLE_MAXROWS", 25);
//color definitions
DEFINE("WFU_TESTMESSAGECOLORS", "#666666,#EEEEEE,#333333");  
DEFINE("WFU_DEFAULTMESSAGECOLORS", "#666666,#EEEEEE,#333333");  
DEFINE("WFU_HEADERMESSAGECOLORS_STATE0", "#666666,#EEEEEE,#333333");  
DEFINE("WFU_HEADERMESSAGECOLORS_STATE1", "#F88017,#FEF2E7,#633309");  
DEFINE("WFU_HEADERMESSAGECOLORS_STATE2", "#660000,#FFEEEE,#666600");  
DEFINE("WFU_HEADERMESSAGECOLORS_STATE3", "#660000,#FFEEEE,#666600");  
DEFINE("WFU_HEADERMESSAGECOLORS_STATE4", "#006600,#EEFFEE,#006666");  
DEFINE("WFU_HEADERMESSAGECOLORS_STATE5", "#F88017,#FEF2E7,#633309");  
DEFINE("WFU_HEADERMESSAGECOLORS_STATE6", "#660000,#FFEEEE,#666600");  
DEFINE("WFU_HEADERMESSAGECOLORS_STATE7", "#660000,#FFEEEE,#666600");  
DEFINE("WFU_HEADERMESSAGECOLORS_STATE8", "#660000,#FFEEEE,#666600");  
DEFINE("WFU_HEADERMESSAGECOLORS_STATE9", "#666666,#EEEEEE,#333333");  
DEFINE("WFU_HEADERMESSAGECOLORS_STATE10", "#F88017,#FEF2E7,#633309"); 
DEFINE("WFU_HEADERMESSAGECOLORS_STATE11", "#666666,#EEEEEE,#333333"); 

/************** Constant Values ***************/
//other plugin values
DEFINE("WFU_RESPONSE_URL", $siteurl.WPFILEUPLOAD_DIR."wfu_response.php");
DEFINE("WFU_AJAX_URL", $siteurl."/wp-admin/admin-ajax.php");
DEFINE("WFU_SERVICES_SERVER_URL", 'https://services2.iptanus.com');
DEFINE("WFU_VERSION_SERVER_URL", WFU_SERVICES_SERVER_URL.'/wp-admin/admin-ajax.php');
DEFINE("WFU_VERSION_HASH", '9npWpXMhAQ5e6AGJ5zqbaPxLk9ePD3eSu3WKeN9p89E9wmgL2PHtrqXPzBVpStzh');
DEFINE("WFU_DOWNLOADER_URL", $siteurl.WPFILEUPLOAD_DIR."wfu_file_downloader.php");
DEFINE("WFU_PRO_VERSION_URL", 'http://www.iptanus.com/product/wordpress-file-upload-pro/');
//define images
DEFINE("WFU_IMAGE_ADMIN_HELP", $siteurl.WPFILEUPLOAD_DIR.'images/help_16.png');
DEFINE("WFU_IMAGE_ADMIN_RESTOREDEFAULT", $siteurl.WPFILEUPLOAD_DIR.'images/restore_16.png');
DEFINE("WFU_IMAGE_ADMIN_USERDATA_ADD", $siteurl.WPFILEUPLOAD_DIR.'images/add_12.png');
DEFINE("WFU_IMAGE_ADMIN_USERDATA_REMOVE", $siteurl.WPFILEUPLOAD_DIR.'images/remove_12.png');
DEFINE("WFU_IMAGE_ADMIN_SUBFOLDER_BROWSE", $siteurl.WPFILEUPLOAD_DIR.'images/tree_16.gif');
DEFINE("WFU_IMAGE_ADMIN_SUBFOLDER_OK", $siteurl.WPFILEUPLOAD_DIR.'images/ok_12.gif');
DEFINE("WFU_IMAGE_ADMIN_SUBFOLDER_CANCEL", $siteurl.WPFILEUPLOAD_DIR.'images/cancel_12.gif');
DEFINE("WFU_IMAGE_ADMIN_SUBFOLDER_LOADING", $siteurl.WPFILEUPLOAD_DIR.'images/refresh_16.gif');
DEFINE("WFU_IMAGE_SIMPLE_PROGBAR", $siteurl.WPFILEUPLOAD_DIR.'images/progbar.gif');
DEFINE("WFU_IMAGE_OVERLAY_EDITOR", $siteurl.WPFILEUPLOAD_DIR.'images/pencil.svg');
DEFINE("WFU_IMAGE_OVERLAY_LOADING", $siteurl.WPFILEUPLOAD_DIR.'images/loading_icon.gif');
DEFINE("WFU_IMAGE_VERSION_COMPARISON", $siteurl.WPFILEUPLOAD_DIR.'images/Version Comparison.png');

function wfu_set_javascript_constants() {
	$consts = array(
		"nofilemessage" => WFU_ERROR_UPLOAD_NOFILESELECTED,
		"enable_popups" => WFU_ERROR_ENABLE_POPUPS,
		"remoteserver_noresult" => WFU_ERROR_REMOTESERVER_NORESULT,
		"message_header" => WFU_ERRORMESSAGE,
		"message_failed" => WFU_ERROR_UPLOAD_FAILED_WHILE,
		"message_cancelled" => WFU_ERROR_UPLOAD_CANCELLED,
		"message_unknown" => WFU_ERROR_UNKNOWN,
		"adminmessage_unknown" => WFU_FAILMESSAGE_DETAILS,
		"message_timelimit" => WFU_ERROR_FILE_PHP_TIME,
		"message_admin_timelimit" => WFU_ERROR_ADMIN_FILE_PHP_TIME,
		"jsonparse_filemessage" => WFU_ERROR_JSONPARSE_FILEMESSAGE,
		"jsonparse_message" => WFU_ERROR_JSONPARSE_MESSAGE,
		"jsonparse_adminmessage" => WFU_ERROR_JSONPARSE_ADMINMESSAGE,
		"jsonparse_headermessage" => WFU_ERROR_JSONPARSE_HEADERMESSAGE,
		"jsonparse_headeradminmessage" => WFU_ERROR_JSONPARSE_HEADERADMINMESSAGE,
		"same_pluginid" => WFU_ERROR_SAME_PLUGINID,
		"default_colors" => WFU_DEFAULTMESSAGECOLORS,
		"fail_colors" => WFU_FAILMESSAGECOLORS,
		"max_time_limit" => WFU_MAX_TIME_LIMIT,
		"response_url" => WFU_RESPONSE_URL,
		"ajax_url" => WFU_AJAX_URL,
		"wfu_pageexit_prompt" => WFU_PAGEEXIT_PROMPT,
		"wfu_subdir_typedir" => WFU_SUBDIR_TYPEDIR
	);
	$consts_txt = "";
	foreach ( $consts as $key => $val )
		$consts_txt .= ( $consts_txt == "" ? "" : ";" ).wfu_plugin_encode_string($key).":".wfu_plugin_encode_string($val);

	return $consts_txt;
}

?>
