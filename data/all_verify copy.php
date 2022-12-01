<?php 
    require_once('../class/Verify.php');
    $verify = $Verify->all_items();
    $nonverify = $Verify->all_nonVerify();

 ?>
<br />
<style>
    #fullpage {
  display: none;
  position: absolute;
  z-index: 9999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background-size: contain;
  background-repeat: no-repeat no-repeat;
  /* background-position: center center; */
  /* background-color: black; */
}
</style>
<div class="table-responsive">
<table class="table text-center">
<tr>
    <td class="text-primary"> <strong>Verified User</strong> </td>
    <td class="text-danger"> <strong>Non Verified User</strong></td>
</tr>
            <tbody>
                <?php
                if(sizeof($verify)>=sizeof($nonverify)){
                    $len=sizeof($verify);
                }else{
                    $len=sizeof($nonverify);
                }
                for($i=0; $i<=$len; $i++){
                    echo'
                    <tr>';
                    error_reporting(0);
                    if($verify[$i]["user_account"]){
                        echo '<td>'.$verify[$i]["user_account"].'</td>';
                    }
                    else{
                        echo '<td></td>';
                    }
                    if($nonverify[$i]["verify_img1"]!=''&&$nonverify[$i]["verify_img2"]!=''&&$nonverify[$i]["verify_img3"]!=''){
                        echo'
                    <td>'.$nonverify[$i]["user_account"]." <a data-toggle='modal' data-target='#check-verify' class='btn btn-success'> For Approval</a>".'</td>
                     </tr>
                    ';
                    ?>
    <div class="modal fade" id="check-verify">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <body onload="getPics()">
                <div class="container">
                    <h1>Verification ID</h1>
                    <div class="gallery">
                    <img src="user/images/verification/<?php echo $nonverify[$i]["verify_img1"]?>" id="" width="10%" alt="ss" />
                    <img src="user/images/verification/<?php echo $nonverify[$i]["verify_img2"]?>" id="" width="10%" alt="ss" />
                    <img src="user/images/verification/<?php echo $nonverify[$i]["verify_img3"]?>" id="" width="10%" alt="ss" />
                    </div>
                </div>
			</div>

  <div id="fullpage" onclick="this.style.display='none';"></div>
<h4 class="modal-title text-danger text-center">Are you sure?</h4>
			<div class="modal-body">
				<div align="center">
						<strong class="text-danger">
							<div id="remove-stud-msg">
								<h1></h1>
							</div>
						</strong>
						<input type="hidden" id="confirm-type" value="null">
						<button id="confirm-yes" type="button" class="btn btn-default btn-lg del-expired" >Confirm
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						</button>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="button" class="btn btn-default btn-lg" data-dismiss="modal" >Declined
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</button>	
				</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

                   <?php }else{
                        echo'
                    <td>'.$nonverify[$i]["user_account"].'</td>
                     </tr>
                    ';
                    }
                    
                } ?>
            </tbody>
        </table>
</div>
</table>
<script>
            function getPics() {} //just for this demo
            const imgs = document.querySelectorAll('.gallery img');
            const fullPage = document.querySelector('#fullpage');

            imgs.forEach(img => {
            img.addEventListener('click', function() {
                fullPage.style.backgroundImage = 'url(' + img.src + ')';
                fullPage.style.display = 'block';
            });
            });
        </script>
<?php 
$Verify->Disconnect();
 ?>