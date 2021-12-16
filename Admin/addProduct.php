<form method='POST' name="Nproduct" id="Nproduct" action="" enctype="multipart/form-data">
        

<input type="file" name="file" id="imgs" accept="image/jpg,image/jpeg" required>
<input type="text" name="name" id="name" placeholder="Product Name" required>
<input type="text" name="code" id="code" placeholder="Product Code" required>
<input type="text" name="price" id="price" placeholder="Price" required>
<select name="type" id="type" required>
            <option>--Type--</option>
            <option value="whey">whey</option>
            <option value="mass-gainer">mass-gainer</option>
            <option value="pre-workout">pre-workout</option>
          </select>
          <input type="submit" value="Add" name="upload" >
         
   
        </form>

  <?php

if(isset($_POST['upload'])){
	$filename = $_FILES["file"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["file"]["size"];
	$allowed_file_types = array('.jpg','.jpeg');

  if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
	{	
		// Rename file
		$newfilename = md5($file_basename) . $file_ext;
		if (file_exists("../images/Products/" . $newfilename))
		{
			// file already exists error
			echo "You have already uploaded this file.";
		}
		else
		{		
			move_uploaded_file($_FILES["file"]["tmp_name"], "../images/Products/" . $newfilename);
			echo "File uploaded successfully.";		
		}
	}
	elseif (empty($file_basename))
	{	
		// file selection error
		echo "Please select a file to upload.";
	} 
	elseif ($filesize > 200000)
	{	
		// file size error
		echo "The file you are trying to upload is too large.";
	}
	else
	{
		// file type error
		echo "Only these file types are allowed for upload: " . implode(', ',$allowed_file_types);
		unlink($_FILES["file"]["tmp_name"]);
	}
}
