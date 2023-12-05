<?php
	
	class database
	{
		
		function connection()
		{
			return mysqli_connect('localhost','root','','pldmis_db');
		}
	}

?>