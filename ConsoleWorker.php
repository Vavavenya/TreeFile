<?php

namespace liw;
 
class ConsoleWorker
{


	public function printDir(String $folder,String $space='')
	{
		try {
			$files = scandir($folder);
		} catch (Exception $e) {
			echo "Error ".$e;
		}
		foreach ($files as $file) {
			if ($file == '.' || $file == '..')
			{
				continue;
			}
			$this->printFile($file,$space);
			$this->checkPath($file,$space,$folder);
		}
	}


    public function printFile(String $file,String $space)
   {

   		if (isset($_SERVER['argv'][1]) and strpos($file, $_SERVER['argv'][1]) !== FALSE)
   		{
   			echo  "\e[1m" . $space . $file . "\e[0m\r\n" ;
   		} 
   		else
   		{
   			echo $space.$file."\r\n";
   		}

   }

	public function checkPath(String $file,String $space,String $folder)
    {
    	$Path = $folder . '/' . $file;
    	if (is_dir($Path))
    	{
    	 $this->printDir($Path, $space.'├   ');
    	}
	}
}