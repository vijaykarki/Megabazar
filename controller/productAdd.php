<?php
include_once("./../includes/mainlink.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['post']))
    {
        $prdtitle=$_POST["prdtitle"];
        $prdprice=$_POST["prdprice"];
        $category=$_POST["category"];
        $condition=$_POST["condition"];
        $prdtype=$_POST["prdtype"];
        $prddetail=$_POST["prddetail"];
        $uname=$_SESSION['uname'];
        $location=$_POST["location"];
        $crud = new CrudController();
        $sqlquery="INSERT INTO products (product_title, price, category, condition_prd, product_type, details, uname, p_address) VALUES ('$prdtitle','$prdprice','$category', '$condition','$prdtype', '$prddetail','$uname','$location');";
        $latestproductid=$crud->execute($sqlquery);
        echo($latestproductid);

        if(!empty(array_filter($_FILES['prdimage']['name'])))
        {
            // File upload configuration
            $targetDir = "./../image/productimg/";
            $allowTypes = array('jpg','png','jpeg','gif');
            
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
            foreach($_FILES['prdimage']['name'] as $key=>$val)
            {
                // File upload path
                $fileName = basename($_FILES['prdimage']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;
                
                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["prdimage"]["tmp_name"][$key], $targetFilePath)){
                        // Image db insert sql
                        $query = "INSERT INTO prd_image (imgfilename, productid,filelocation) VALUES ('$fileName','$latestproductid','$targetFilePath')";
                        $insert = $crud->execute($query);
                    }else{
                        $errorUpload .= $_FILES['prdimage']['name'][$key].', ';
                    }
                }else{
                    $errorUploadType .= $_FILES['prdimage']['name'][$key].', ';
            }
                
            if(!empty($insertValuesSQL)){
                $insertValuesSQL = trim($insertValuesSQL,',');
                $query = "INSERT INTO prd_image (imgfilename, productid,filelocation) VALUES ('$fileName','$latestproductid','$targetFilePath')";
                $insert = $crud->execute($query);
                if($insert){
                    $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                    $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                    $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                    $statusMsg = "Files are uploaded successfully.".$errorMsg;
                }
                else
                {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }
            echo $statusMsg;
        }
    }
    header('Location: ./../pages/postad.php');
}
?>