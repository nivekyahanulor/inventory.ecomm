<?php 
        
        //CHeck whether the Submit Button is Clicked or Not
        if(isset($_POST['submit']))
        {
            error_reporting(0);
            if(isset($_FILES['up1']['name'])||isset($_FILES['up2']['name'])||isset($_FILES['up3']['name']))
            {
                //Upload the Image
                //To upload image we need image name, source path and destination path
                $img_up1 = $_FILES['up1']['name'];
                $img_up2 = $_FILES['up2']['name'];
                $img_up3 = $_FILES['up3']['name'];
                
                // Upload the Image only if image is selected
                if($img_up1 != "")
                {
                    $ext = end(explode('.', $img_up1));
                    $img_up1 = "User_Verification_".rand(0000000, 9999999).'.'.$ext;
                    $source_path = $_FILES['up1']['tmp_name'];
                    $destination_path = "images/verification/".$img_up1;
                    $upload = move_uploaded_file($source_path, $destination_path);
                    $sql="UPDATE `verification` SET `verify_img1` = '$img_up1' WHERE verify_user = '{$_SESSION['user_user']}'";
                    mysqli_query($conn, $sql);

                }
                if($img_up2 != "")
                {
                    $ext = end(explode('.', $img_up2));
                    $img_up2 = "User_Verification_".rand(0000000, 9999999).'.'.$ext;
                    $source_path2 = $_FILES['up2']['tmp_name'];
                    $destination_path2 = "images/verification/".$img_up2;
                    $upload = move_uploaded_file($source_path2, $destination_path2);
                    $sql="UPDATE `verification` SET `verify_img2` = '$img_up2' WHERE verify_user = '{$_SESSION['user_user']}'";
                    mysqli_query($conn, $sql);

                }
                if($img_up2 != "")
                {
                    $ext = end(explode('.', $img_up3));
                    $img_up3 = "User_Verification_".rand(0000000, 9999999).'.'.$ext;
                    $source_path3 = $_FILES['up3']['tmp_name'];
                    $destination_path3 = "images/verification/".$img_up3;
                    $upload = move_uploaded_file($source_path3, $destination_path3);
                    $sql="UPDATE `verification` SET `verify_img3` = '$img_up3' WHERE verify_user = '{$_SESSION['user_user']}'";
                    mysqli_query($conn, $sql);

                    if($upload==false)
                    {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                        header('location:'.SITEURL.'verify.php');
                        die();
                    }

                }
            }
                $_SESSION['add'] = "<div class='success'>Image Added Successfully.</div>";
                header('location:'.SITEURL.'verify.php');
            }    
    ?>