<?php

namespace liw;


class Type
{
	public function printTree() 
	{
		$Object = php_sapi_name() == 'cli' ? new ConsoleWorker : new BrowserWorker;

		$Object->printDir('.');
	}
}