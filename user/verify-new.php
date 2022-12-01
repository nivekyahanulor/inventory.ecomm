<?php 
        
        //CHeck whether the Submit Button is Clicked or Not
        if(isset($_POST['submit']))
        {
            error_reporting(0);
            if(isset($_FILES['up1']['name']))
            {
                //Upload the Image
                //To upload image we need image name, source path and destination path
                $img_up1 = $_FILES['up1']['name'];
                $img_up2 = $_FILES['up2']['name'];
                $img_up3 = $_FILES['up3']['name'];
                
                // Upload the Image only if image is selected
                if($img_up1 != "")
                {

                    //Auto Rename our Image
                    //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialcosmetics1.jpg"
                    $ext = end(explode('.', $img_up1));
                
                    //Rename the Image
                    $img_up1 = "User_Verification_".rand(0000, 9999).'.'.$ext; // e.g. cosmetics_Category_834.jpg
                    $source_path = $_FILES['up1']['tmp_name'];
                    $destination_path = "images/verification/".$img_up1;
                    //Finally Upload the Image
                    $upload = move_uploaded_file($source_path, $destination_path);


                    $ext = end(explode('.', $img_up2));
                
                    //Rename the Image
                    $img_up2 = "User_Verification_".rand(0000, 9999).'.'.$ext; // e.g. cosmetics_Category_834.jpg
                    $source_path2 = $_FILES['up2']['tmp_name'];
                    $destination_path2 = "images/verification/".$img_up2;
                    //Finally Upload the Image
                    $upload = move_uploaded_file($source_path2, $destination_path2);


                    $ext = end(explode('.', $img_up3));
                
                    //Rename the Image
                    $img_up3 = "User_Verification_".rand(0000, 9999).'.'.$ext; // e.g. cosmetics_Category_834.jpg
                    $source_path3 = $_FILES['up3']['tmp_name'];
                    $destination_path3 = "images/verification/".$img_up3;
                    //Finally Upload the Image
                    $upload = move_uploaded_file($source_path3, $destination_path3);



                    //Check whether the image is uploaded or not
                    //And if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload==false)
                    {
                        //SEt message
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                        //Redirect to Add CAtegory Page
                        header('location:'.SITEURL.'verify.php');
                        //STop the Process
                        die();
                    }

                }
            }
            else
            {
                //Don't Upload Image and set the img_up1 value as blank
                $img_up1="";
            }
            $sql="INSERT INTO `verification` (`veify_id`, `verify_user`, `verify_img1`, `verify_img2`, `verify_img3`, `verify_pending1`, `verify_pending2`, `verify_pending3`) VALUES 
            (NULL, '{$_SESSION['user_user']}', '$img_up1', '$img_up2', '$img_up3', '', '', '')";
            //3. Execute the Query and Save in Database
            $res = mysqli_query($conn, $sql);

            //4. Check whether the query executed or not and data added or not
            if($res==true)
            {
                //Query Executed and Category Added
                $_SESSION['add'] = "<div class='success'>Image Added Successfully.</div>";
                //Redirect to Manage Category Page
                header('location:'.SITEURL.'verify.php');
            }
        }
    
    ?>