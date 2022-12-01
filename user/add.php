<?php 
                            if(isset($_SESSION['user_user'])){
                                echo '
                                <a href="add-cart.php?id='. $id.'" class="btn btn-primary">Add to cart</a>';
                            }else{
                                echo '
                                <a href="login.php" class="btn btn-primary">Add to cart</a>';

                            }
                            ?>