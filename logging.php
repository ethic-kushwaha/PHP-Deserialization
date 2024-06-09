<?php
class LogFile
{
	public $filename;
	public function __destruct()
	{
		echo "Destruct called";
		file_put_contents($this->filename, $this->fname,FILE_APPEND);
	}
}

?>
