<?php session_start(); /* Starts the session */
	/* Check and assign submitted Username and Password to new variable */
	$username = isset($_POST['user_name']) ? $_POST['user_name'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$role = isset($_POST['role']) ? $_POST['role'] : '';
	function shippers_check(){
	/* Check Login form submitted */	
	if(isset($_POST['submit'])){

		// replace with the file pointer
		$file_name = 'users.csv';
		$fp = fopen($file_name, 'r');
		// first row => field names
		$first = fgetcsv($fp);
		// start - second line because the pointer is in the second
		while ($row = fgetcsv($fp)) {
		  $i = 0;
		  $user = [];
		foreach ($first as $col_name) {
		$user[$col_name] =  $row[$i];
		if(!strcmp($user['distribution'],'') == 0){
			fclose($fp);
			return true;
		}else{
			fclose($fp);
			return false;
		}
			$i++;
			}
		}
		}
	}
	
	function vendors_check(){
		/* Check Login form submitted */	
		if(isset($_POST['submit'])){
			// replace with the file pointer
			$file_name = 'users.csv';
			$fp = fopen($file_name, 'r');
			// first row => field names
			$first = fgetcsv($fp);
			// start - second line because the pointer is in the second
			while ($row = fgetcsv($fp)) {
			  $i = 0;
			  $user = [];
			foreach ($first as $col_name) {
			$user[$col_name] =  $row[$i];
			if(!strcmp($user['bname'],'') == 0){
				fclose($fp);
				return true;
			}else{
				fclose($fp);
				return false;
			}
				$i++;
				}
			}
			}
		}
	function pass_check($username,$password){
		/* Check Login form submitted */	
		if(isset($_POST['submit'])){
				// replace with the file pointer
				$file_name = 'users.csv';
				$fp = fopen($file_name, 'r');
				// first row => field names
				$first = fgetcsv($fp);
				// start - second line because the pointer is in the second
				while ($row = fgetcsv($fp)) {
				  $i = 0;
				  $user = [];
				foreach ($first as $col_name) {
				$user[$col_name] =  $row[$i];
				if(strcmp($user['username'],$username) == 0){
					$username_tmp = $username;
					if(password_verify($user['password'],$password)){
						fclose($fp);
						return true;
					}else{
						fclose($fp);
						return false;
					}
				}else{
					fclose($fp);
					return false;
				}
					$i++;
					}
				}
				}
			}		

		/* Check Username and Password existence in defined array */		
		if (pass_check($username,$password)){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['userdata']['username']= $username;
			if(strcmp($role,"vendors") == 0 && vendors_check()){
				header("location: productlist-page.php");
			}
			if ((strcmp($role,"vendors") == 0) && shippers_check()){
				header("location: orderlist-page.php");
			}
			header("location: index.php");
			exit;
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid Login Details</span>";
		}

?>