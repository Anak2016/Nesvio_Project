<?php
namespace App\Classes;

class UploadFile 
{
	protected $filename;
	protected $max_filesize = 2097152;
	protected $extension;
	protected $path;

	//return file name
	public function getName()
	{
		return $this->filename;
	}

	//set name to file name
	public function setName( $filename , $name="" )
	{
		if($name === "")
		{
			$name = pathinfo($filename, PATHINFO_FILENAME);
		}
		$name = strtolower(str_replace(['-', ' '], '-', $name));
		$hash = md5(microtime());
		$ext = $this->fileExtension($filename);
		$this->filename = "{$name}-{$hash}.{$ext}";
	}

	//set file extension
	protected function fileExtension($file)
	{
		return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
	} 

	//validate filesize
	public static function fileSize($file)
	{
		$fileobj = new static;
		return $file > $fileobj->max_filesize ? true:false;
	}

	//Validate file upload and Verify file.extension
	public static function isImage($file)
	{
		// $fileobj = new static;
		// $ext = $fileobj->fileExtension;
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		$validExt = array('jpg', 'jpeg','png','bmp','gif');

		if(!in_array(strtolower($ext), $validExt))
		{
			return false;
		}
	
		return true;
	}

	//get path where file was uploaded to
	public function path()
	{
		return $this->path;
	}

	//Move the file to intended location    
	public static function move($temp_path, $folder, $file, $new_filename = '')
	{
		$fileObj = new static;
		$ds = DIRECTORY_SEPARATOR;

		$fileObj->setName($file, $new_filename);
		$file_name = $fileObj->getName();

		if(!is_dir($folder))
		{
			mkdir($folder,0777, true);
		}

		$fileObj->path = "{$folder}{$ds}{$file_name}";
		//BASE_PATH is defined in config/_env.php
		$absolute_path = BASE_PATH."{$ds}public{$ds}$fileObj->path";

		if(move_uploaded_file($temp_path,$absolute_path))
		{
			return $fileObj;
		}

		return null;
	}

}

?>