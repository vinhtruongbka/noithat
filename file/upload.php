<?php
if (!isset($config)){
  $config = include 'config/config.php';
  //TODO switch to array
  extract($config, EXTR_OVERWRITE);
}
include 'include/utils.php';

if ($_SESSION['RF']["verify"] != "RESPONSIVEfilemanager")
{
	response(trans('forbiden').AddErrorLocation(), 403)->send();
	exit;
}

include 'include/mime_type_lib.php';

if (isset($_POST['path']))
{
   $storeFolder = $_POST['path'];
   $storeFolderThumb = $_POST['path_thumb'];
}
else
{
   $storeFolder = $current_path.$_POST["fldr"]; // correct for when IE is in Compatibility mode
   $storeFolderThumb = $thumbs_base_path.$_POST["fldr"];
}

$path_pos  = strpos($storeFolder,$current_path);
$thumb_pos = strpos($storeFolderThumb,$thumbs_base_path);

if ($path_pos!==0
	|| $thumb_pos !==0
	|| strpos($storeFolderThumb,'../',strlen($thumbs_base_path)) !== FALSE
	|| strpos($storeFolderThumb,'./',strlen($thumbs_base_path)) !== FALSE
	|| strpos($storeFolder,'../',strlen($current_path)) !== FALSE
	|| strpos($storeFolder,'./',strlen($current_path)) !== FALSE )
{
	response(trans('wrong path'.AddErrorLocation()))->send();
	exit;
}

$path = $storeFolder;
$cycle = TRUE;
$max_cycles = 50;
$i = 0;
while ($cycle && $i < $max_cycles)
{
	$i++;
	if ($path == $current_path) $cycle = FALSE;
	if (file_exists($path."config.php"))
	{
		require_once $path."config.php";
		$cycle = FALSE;
	}
	$path = fix_dirname($path).'/';
}


if ( ! empty($_FILES))
{
	$info = pathinfo($_FILES['file']['name']);
	$mime_type = get_file_mime_type($_FILES['file']['tmp_name']);
	$extension = get_extension_from_mime($mime_type);
	if($extension==='' || $extension=='so'){
		$extension = $info['extension'];
	}

	if (in_array(fix_strtolower($extension), $ext))
	{
		$tempFile = $_FILES['file']['tmp_name'];
		$targetPath = $storeFolder;
		$targetPathThumb = $storeFolderThumb;
		
	 	$file_name = set_file_name($info['filename']).'.'.$extension;
		if (file_exists($targetPath.$file_name))
		{
			$i = 1;

			// append number
			while(file_exists($targetPath.set_file_name($info['filename'])."-".$i.".".$extension)) {
				$i++;
			}
			$file_name = set_file_name($info['filename'])."-".$i.".".$extension;
		}

		$targetFile =  $targetPath. $file_name;
		$targetFileThumb =  $targetPathThumb.$file_name;

		// check if image (and supported)
		if (in_array(fix_strtolower($extension),$ext_img)) $is_img=TRUE;
		else $is_img=FALSE;
		var_dump($targetFile);
		if (!checkresultingsize($_FILES['file']['size'])) {
			response(sprintf(trans('max_size_reached'),$MaxSizeTotal).AddErrorLocation(), 406)->send();
			exit;
		}

		// upload
		move_uploaded_file($tempFile,$targetFile);
		chmod($targetFile, 0755);

		if ($is_img)
		{
			$memory_error = FALSE;
			if ( ! create_img($targetFile, $targetFileThumb, 122, 91))
			{
				$memory_error = FALSE;
			}
			else
			{
				// TODO something with this long function baaaah...
				if( ! new_thumbnails_creation($targetPath,$targetFile,$file_name,$current_path,$relative_image_creation,$relative_path_from_current_pos,$relative_image_creation_name_to_prepend,$relative_image_creation_name_to_append,$relative_image_creation_width,$relative_image_creation_height,$relative_image_creation_option,$fixed_image_creation,$fixed_path_from_filemanager,$fixed_image_creation_name_to_prepend,$fixed_image_creation_to_append,$fixed_image_creation_width,$fixed_image_creation_height,$fixed_image_creation_option))
				{
					$memory_error = FALSE;
				}
				else
				{
					$imginfo = getimagesize($targetFile);
					$srcWidth = $imginfo[0];
					$srcHeight = $imginfo[1];

					// resize images if set
					if ($image_resizing)
					{
						if ($image_resizing_width == 0) // if width not set
						{
							if ($image_resizing_height == 0)
							{
								$image_resizing_width = $srcWidth;
								$image_resizing_height = $srcHeight;
							}
							else
							{
								$image_resizing_width = $image_resizing_height*$srcWidth/$srcHeight;
							}
						}
						elseif ($image_resizing_height == 0) // if height not set
						{
							$image_resizing_height = $image_resizing_width*$srcHeight/$srcWidth;
						}

						// new dims and create
						$srcWidth = $image_resizing_width;
						$srcHeight = $image_resizing_height;
						create_img($targetFile, $targetFile, $image_resizing_width, $image_resizing_height, $image_resizing_mode);
					}

					//max resizing limit control
					$resize = FALSE;
					if ($image_max_width != 0 && $srcWidth > $image_max_width && $image_resizing_override === FALSE)
					{
						$resize = TRUE;
						$srcWidth = $image_max_width;

						if ($image_max_height == 0) $srcHeight = $image_max_width*$srcHeight/$srcWidth;
					}

					if ($image_max_height != 0 && $srcHeight > $image_max_height && $image_resizing_override === FALSE){
						$resize = TRUE;
						$srcHeight = $image_max_height;

						if ($image_max_width == 0) $srcWidth = $image_max_height*$srcWidth/$srcHeight;
					}

					if ($resize) create_img($targetFile, $targetFile, $srcWidth, $srcHeight, $image_max_mode);
				}
			}

			// not enough memory
			if ($memory_error)
			{
				unlink($targetFile);
				response(trans("Not enought Memory").AddErrorLocation(), 406)->send();
				exit();
			}
		}
		echo $file_name;
	}
	else // file ext. is not in the allowed list
	{
		response(trans("Error_extension").AddErrorLocation(), 406)->send();
		exit();
	}
}
else // no files to upload
{
	response(trans("no file").AddErrorLocation(), 405)->send();
	exit();
}

// redirect
if (isset($_POST['submit']))
{
	$query = http_build_query(array(
		'type'	  	=> $_POST['type'],
		'lang'	  	=> $_POST['lang'],
		'popup'			=> $_POST['popup'],
		'field_id'  => $_POST['field_id'],
		'fldr'	  	=> $_POST['fldr'],
	));

	header("location: dialog.php?" . $query);
}


function set_file_name($str) {
  $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
  $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
  $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
  $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
  $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
  $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
  $str = preg_replace("/(đ)/",'d', $str);
  $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $str);
  $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
  $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
  $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $str);
  $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'u', $str);
  $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $str);
  $str = preg_replace("/(Đ)/", 'd', $str);
  $str = preg_replace('~[^\pL\d]+~u', '-', $str);
  $str = preg_replace('~[^-\w]+~', '', $str);
  $str = trim($str, '-');
  $str = preg_replace('~-+~', '-', $str);
  return strtolower($str);
}