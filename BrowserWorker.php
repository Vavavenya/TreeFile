<?php

namespace liw;
 
class BrowserWorker
{
 	public function printDir(String $folder,String $space='')
    {
    	try {
    	$files = scandir($folder);
    	} catch (Exception $e) {
    		echo "Error ".$e;
    	}
    	
    	echo '<ol>';
      foreach ($files as $file) {
       if ($file == '.' || $file == '..')
       {
       	 continue;
       }
       $this->printFile($file,$space);
       $this->checkPath($file,$space,$folder);
    }
        echo '</ol>';
	}

	public function printFile(String $file,String $space='')
	{
		if (isset($_GET['fileSearch']) && strpos($file, $_GET['fileSearch']) !== FALSE)
		{
			echo "<li style='list-style-type:none;'><strong> $file</strong></li>";
		} 
		else
		{
			echo "<li style='list-style-type:none;'> $file </li>";
		}
	}

	public function checkPath(String $file,String $space='',String $folder)
	{
		$Path = $folder . '/' . $file;
		if (is_dir($Path))
		{
			$this->printDir($Path,$space);
		}
	}
}