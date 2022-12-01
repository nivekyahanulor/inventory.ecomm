<form action="" method="POST" enctype="multipart/form-data">
    <h1 class="text-center h2 mb-5" style="margin-top:-350px;">Upload Verification</h1>
    <div class="container">
        <?php
        if($row['verify_pending1']=='0'){
            echo'
            <div class="col-sm mb-3">
                <div class="row">
                    <div class="col-md-6">
                    <p class="fw-bold text-center">Upload Business Permit</p>
                    </div>
                    <div class="col-md">
                    <input type="file" name="up1">
                    </div>
                </div>
                </div>
            ';
        }
        if($row['verify_pending2']=='0'){
        echo '
        
        <div class="col-sm mb-3">
        <div class="row mb-3">
            <div class="col-md-6">
            <p class="fw-bold text-center">Upload Identification ID (e.g Drivers license, National ID or etc.)</p>
            </div>
            <div class="col-md-3">
            <input type="file" name="up2">
            </div>
        </div>
            ';
        }if($row['verify_pending3']=='0'){
            echo'
                <div class="row mb-5">
                <div class="col-md-6">
                <p class="fw-bold text-center">Upload any picture of you containing latest date</p>
                </div>
                <div class="col-md-3">
                <input type="file" name="up3">
                </div>
                </div>
            ';
        }
        ?>
        
       
        <input type="submit" name="submit" class="form-control btn btn-primary mb-5">
    </form>
        </div>
    </div>