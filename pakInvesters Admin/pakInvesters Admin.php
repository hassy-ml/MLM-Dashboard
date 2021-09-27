<?php
    /**
     * Plugin Name: Pak Investers Admin
     * Description: Admin Panel for pakinvesters.com
     * 
     */
    function boost_admin_menu() {
        add_menu_page("Admin Panel","Admin","manage_options","boostAdmin","boostAdmin_main","dashicons-admin-settings",4);
        add_submenu_page('boostAdmin','Ads Management','Manage Ads',"manage_options","boostAdmin_ads","boostAdmin_main_adsManage");    
        add_submenu_page('boostAdmin','Withdrawal Management','Manage Withdrawals',"manage_options","boostAdmin_wid","boostAdmin_main_widManagement");
        add_submenu_page('boostAdmin','Subscription Management','Manage Subscription',"manage_options","boostAdmin_sub","boostAdmin_main_subManagement");
        add_submenu_page('boostAdmin','Start Session','Start Session',"manage_options","boostAdmin_session","boostAdmin_main_session");
    }
    add_action('admin_menu','boost_admin_menu');
    function boostAdmin_main() {
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <div class="row">
            <div class="col mb-4">                         
                <div class="card shadow mx-auto">
                    <div class="card-header rounded bg-dark  text-center">
                        <h2 class="m-0 font-weight-bold text-light">Welcome Admin</h2>
                    </div>
                    <div class="card-body">     
                        <div class="text-center">
                            <img class="img-fluid" style="" src="../wp-content/uploads/wadminf.png" alt="">
                        </div>                             
                    </div>
                    <div class="text-center">
                        <a class="m-0 text-dark">Edit and Manage your website here.</a>
                    </div>
                </div>    
            </div> 
            <div class="col mb-4">                         
                <div class="card shadow mx-auto">
                    <div class="card-header rounded bg-dark  text-center">
                        <h2 class="m-0 font-weight-bold text-light">Start Session</h2>
                    </div>
                    <div class="card-body">     
                        <div class="text-center">
                            <img class="img-fluid" style="width:100%" src="../wp-content/uploads/users.png" alt="">
                        </div>                             
                    </div>
                    <div class="text-center">
                        <a href="http://boostearning.online/wp-admin/admin.php?page=boostAdmin_session" class="m-0 text-dark">To edit and manage your users click here.</a>
                    </div>
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col mb-4">                         
                <div class="card shadow mx-auto">
                    <div class="card-header rounded bg-dark  text-center">
                        <h2 class="m-0 font-weight-bold text-light">Manage Ads</h2>
                    </div>
                    <div class="card-body">     
                        <div class="text-center">
                            <img class="img-fluid" style="width:100%" src="../wp-content/uploads/ads.png" alt="">
                        </div>                             
                    </div>
                    <div class="text-center">
                        <a href="http://boostearning.online/wp-admin/admin.php?page=boostAdmin_ads" class="m-0 text-dark">To edit and manage your ads click here.</a>
                    </div>
                </div>    
            </div>  
            <div class="col mb-4">                         
                <div class="card shadow mx-auto">
                    <div class="card-header rounded bg-dark  text-center">
                        <h2 class="m-0 font-weight-bold text-light">Manage Withdrawals</h2>
                    </div>
                    <div class="card-body">     
                        <div class="text-center">
                            <img class="img-fluid" style="width:100%" src="../wp-content/uploads/wid.jpg" alt="">
                        </div>                             
                    </div>
                    <div class="text-center">
                        <a href="http://boostearning.online/wp-admin/admin.php?page=boostAdmin_wid" class="m-0 text-dark">To edit and manage your withdrawals click here.</a>
                    </div>
                </div>    
            </div>          
        </div>
    
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <?php
    }
    function boostAdmin_main_widManagement() {
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <div class="row">
            <div class="col">                
                <div class="card shadow mb-4">
                    <div class="card-header py-3 text-center bg-dark rounded">
                        <h2 class="m-0 font-weight-bold text-light">Manage Withdrawals</h2>
                    </div>
                    <div class="card-body">                    
                        <div class="card-body col-md-12">
                        <?php
                        if(isset($_POST["wid-submit"])) {
                            $t_id=$_POST["tid"];
                            $w_id=$_POST["wid"];
                            if($t_id=="" || $w_id=="") {
                                echo "<h4 class='mt-2 text-danger text-center'>Error! Please Enter Tid and Wid.</h4>";                            
                                echo "<div class='text-center mb-4'><a class='btn btn-primary text-center' href='withdrawals.php'>Try again</a></div>";                       
                            }
                            else {                                
                                $db = new db();  
                                $wCheck=$db->getWid($w_id);
                                if($wCheck==$w_id) {
                                    $db->AddWithdrawal($t_id,$w_id);
                                    echo "<h4 class='mt-2 text-success text-center'>Withdrawal Approved Successfully!</h4>";                                                            
                                }
                                else {
                                    echo "<h4 class='mt-2 text-danger text-center'>Wid not found.</h4>";                            
                                    echo "<div class='text-center mb-4'><a class='btn btn-primary text-center' href='withdrawals.php'>Try again</a></div>";  
                                }                                
                            }                                                     
                        }
                        else { ?>
                            <form class="form" method="post">                             
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Wid</label>
                                    <div class="col-sm-10">
                                    <input required name="wid" type="text" class="form-control" id="colFormLabel" placeholder="Enter Withdrawal ID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel2" class="col-sm-2 col-form-label">Tid</label>
                                    <div class="col-sm-10">
                                    <input required name="tid" type="text" class="form-control" id="colFormLabel2" placeholder="Enter Transaction ID">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button name="wid-submit" type="submit" class="btn btn-primary my-1 mb-4">Approve</button>
                                </div>
                            </form>
                            <?php
                        } 
                        ?> 
                        </div>                                         
                    </div>
                </div>    
                <div class="card shadow mb-4">
                    <div class="card-header py-3 text-center bg-dark rounded">
                            <h2 class="m-0 font-weight-bold text-light">Reject Withdraw</h2>
                        </div>
                        <div class="card-body">
                         <?php
                            if(isset($_POST["rej-submit"])) {
                                $wid=$_POST["wid_rej"];
                                $reason=$_POST["reason"];
                                if($wid=="" || $reason=="") {
                                    echo "<h4 class='mt-2 text-danger text-center'>Error! Please Enter Wid and Reason.</h4>";                            
                                    echo "<div class='text-center mb-4'><a class='btn btn-primary text-center' href='withdrawals.php'>Try again</a></div>";                       
                                }
                                else {                                    
                                    $db = new db();  
                                    $wCheck=$db->getWid($wid);
                                    if($wCheck==$wid) {
                                        $db->rejectWithdraw($wid,$reason);
                                        echo "<h4 class='mt-2 text-success text-center'>Withdrawal Rejected Successfully!</h4>";                                                            
                                    }
                                    else {
                                        echo "<h4 class='mt-2 text-danger text-center'>Wid not found.</h4>";                            
                                        echo "<div class='text-center mb-4'><a class='btn btn-primary text-center' href='withdrawals.php'>Try again</a></div>";  
                                    }                
                                }                                                     
                            }
                            else { ?>
                                <form class="form" method="post">                             
                                    <div class="form-group row">
                                        <label for="colFormLabelw" class="col-sm-2 col-form-label">Wid</label>
                                        <div class="col-sm-10">
                                            <input required name="wid_rej" type="text" class="form-control" id="colFormLabelw" placeholder="Enter Withdrawal ID">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="colFormLabelt" class="col-sm-2 col-form-label">Reason</label>
                                        <div class="col-sm-10">
                                            <input required name="reason" type="text" class="form-control" id="colFormLabelt" placeholder="Enter Reason">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button name="rej-submit" type="submit" class="btn btn-danger my-1 mb-4">Reject</button>
                                    </div>
                                </form>
                                <?php
                            } 
                         ?>
                        </div>  
                </div>
            </div>
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 text-center  bg-dark rounded">
                        <h2 class="m-0 font-weight-bold text-light">Pending Withdrawals</h2>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">WID</th>
                                    <th scope="col">UID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Method</th>
                                    <th scope="col">Account No.</th> 
                                    <th scope="col">Amount</th>                                                                              
                                                                                                                                                                        
                                </tr>
                            </thead>
                            <tbody>
                                <?php                                    
                                    $db = new db();
                                    $wid=$db->pendingWithdrawals();                                                                                
                                    foreach($wid as $row) {                                      
                                            $unm = $db->getUsername($row[7]);
                                            ?>                                        
                                                <tr>
                                                    <th scope="row"><?php  echo $row[0]; ?></th>
                                                    <th><?php  echo $row[7]; ?></th>
                                                    <th><?php  echo $unm; ?></th>
                                                    <td><?php  echo $row[2] ?></td>
                                                    <td><?php  echo $row[1]; ?></td>   
                                                    <td><?php  echo $row[3] ?></td>                                                                                                                                                                                                                                                    
                                                </tr>                                                                        
                                            <?php                               
                                    }                                                        
                                ?>                
                            </tbody>
                        </table> 
                    </div>
                <div>
            </div>
        </div>
    <?php
    }
    function boostAdmin_main_subManagement() {
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <div class="row">
            <div class="col">        
                <?php
                if(isset($_POST["accept-usub"])) {
                    $sid=$_POST["usid"];
                    $uid=$_POST["uuid"];
                    $package=$_POST["upackage"];
                    $tid=$_POST["utid"];
                    $account=$_POST["account"];
                    if($sid!="" || $uid!="" || $package!="" || $tid!="") {
                        $db = new db();  
                        if($db->checkTicket($tid)!=TRUE) {
                            $db->addSubscription($account,$package,$uid);
                            $db->UpdateSubscriptionPending($sid);
                            echo "<h4 class='mt-2 text-success text-center'>Subcription Added Successfully!</h4>";                                                            
                        }
                        else {
                            echo "<h4 class='mt-2 text-danger text-center'>Trx. Already Exists!</h4>";
                        }                                
                    }
                    else {
                        echo "<h4 class='mt-2 text-danger text-center'>Invalid Subscription Details!</h4>";
                    }
                }
                if(isset($_POST["reject-usub"])) {
                    $sid=$_POST["ursid"];
                    if($sid!="") {
                        $db = new db();  
                        $db->DeletePendingSubscription($sid);
                        echo "<h4 class='mt-2 text-success text-center'>Subscription Rejected Successfully!</h4>";
                    }
                    else {
                        echo "Invalid Subscription ID!";
                    }
                }
                ?>
                <div class="mt-3 shadow mb-4 mr-3">
                    <div class="card-header py-3 bg-dark text-center rounded">
                        <h2 class="m-0 font-weight-bold text-light">Add User Package</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Package</th>
                                        <th scope="col">Account</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Proof</th>
                                        <th scope="col">Accept</th>
                                        <th scope="col">Reject</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $db = new db();
                                        $ads=$db->allPendingPackages();                                                                                                                
                                        foreach($ads as $row) {
                                            $package=$row[1];
                                            $package_name="Unknown";
                                            if($package==1) {
                                                $package_name="STUDENT PLAN";
                                            }
                                            if($package==2) {
                                                $package_name="COMMON PLAN";
                                            }             
                                            if($package==3) {
                                                $package_name="SILVER PLAN";
                                            }   
                                            if($package==4) {
                                                $package_name="SILVER PLAN";
                                            }   
                                            if($package==5) {
                                                $package_name="SILVER PLAN";
                                            }   
                                            if($package==6) {
                                                $package_name="SILVER PLAN";
                                            }   
                                            if($package==7) {
                                                $package_name="SILVER PLAN";
                                            }   
                                            if($package==8) {
                                                $package_name="SILVER PLAN";
                                            }   
                                            ?>                                        
                                                    <tr>
                                                        <th scope="row"><?php  echo $row[0]; ?></th>
                                                        <td><?php  echo $package_name; ?></td>
                                                        <td><?php  echo $row[7]; ?></td>
                                                        <td><?php  echo $row[2]; ?></td> 
                                                        <td><?php  echo $row[5]; ?></td>
                                                        <td><a href="https://pakinvesters.com/user/<?php echo $row[6]; ?>" target="_blank">View</a> </td> 
                                                        <td>
                                                            <form method="post">
                                                                <input type="hidden" name="uuid" value="<?php echo $row[0]; ?>">
                                                                <input type="hidden" name="usid" value="<?php echo $row[4]; ?>">
                                                                <input type="hidden" name="upackage" value="<?php echo $row[1]; ?>">
                                                                <input type="hidden" name="utid" value="<?php echo $row[2]; ?>">
                                                                 <input type="hidden" name="account" value="<?php echo $row[7]; ?>">
                                                                <button name="accept-usub" class="btn-success" type="submit">Add</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form method="post">
                                                                <input type="hidden" name="ursid" value="<?php echo $row[4]; ?>">
                                                                <button name="reject-usub" class="btn-danger" type="submit">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>                                                                        
                                                <?php                               
                                        }                                                        
                                       
                                    ?>                
                                </tbody>
                            </table>  
                    </div>
                </div>    
            </div>   
        </div> 
    <?php
    }
    function boostAdmin_main_adsManage() {
        ?>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <div class="row">
                <div class="col">                
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 text-center bg-dark rounded">
                            <h2 class="m-0 font-weight-bold text-light">Ads Management</h2>
                        </div>
                        <div class="card-body">                    
                            <div class="card-body col-md-12">
                                <?php
                                if(isset($_POST["ad-submit"])) {
                                    $method=$_POST["method"];
                                    $link=$_POST["link"];
                                    if($link=="" || $method=="Choose...") {
                                        echo "<h4 class='mt-2 text-danger text-center'>Error! Please Enter Link and Type</h4>";                            
                                        echo "<div class='text-center mb-4'><a class='btn btn-primary text-center' href='../wp-admin/admin.php?page=boostAdmin_ads'>Try again</a></div>";                       
                                    }
                                    else {                                    
                                        $db = new db();  
                                        $linkCheck=$db->getLink($link);
                                        if($linkCheck!=$link) {
                                            $db->AddLink($method,$link);
                                            echo "<h4 class='mt-2 text-success text-center'>Ad Added Successfully!</h4>";                                                            
                                        }
                                        else {
                                            echo "<h4 class='mt-2 text-danger text-center'>Ad Already Exists.</h4>";                            
                                            echo "<div class='text-center mb-4'><a class='btn btn-primary text-center' href='../wp-admin/admin.php?page=boostAdmin_ads'>Try again</a></div>";  
                                        }                                
                                    }                                                     
                                }
                                else { ?>
                                    <form class="form" method="post">                             
                                        <div class="form-group row">
                                            <label for="inlineFormCustomSelectPref" class="col-sm-4 col-form-label">Type</label>
                                            <div class="col-sm-8">
                                                <select name="method" class="custom-select" id="inlineFormCustomSelectPref">
                                                    <option selected>Choose...</option>
                                                    <option value="0">Youtube</option>
                                                    <option value="1">External Link</option>                                                                                                                                       
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabel2" class="col-sm-4 col-form-label">Link</label>
                                            <div class="col-sm-8">
                                                <input required name="link" type="text" class="form-control" id="colFormLabel2" placeholder="Enter Link">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button name="ad-submit" type="submit" class="btn btn-primary my-1 mb-4">Add</button>
                                        </div>
                                    </form>
                                    <?php
                                } 
                                ?> 
                            </div>                                         
                        </div>
                    </div>    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 text-center bg-dark rounded">
                                <h2 class="m-0 font-weight-bold text-light">Delete Ad</h2>
                            </div>
                            <div class="card-body">
                                <?php
                                if(isset($_POST["ad-delete"])) {
                                    $aid=$_POST["aid"];                      
                                    if($aid=="") {
                                        echo "<h4 class='mt-2 text-danger text-center'>Error! Please Enter Ad ID</h4>";                            
                                        echo "<div class='text-center mb-4'><a class='btn btn-primary text-center' href='../wp-admin/admin.php?page=boostAdmin_ads'>Try again</a></div>";                       
                                    }
                                    else {                              
                                        $db = new db();  
                                        $aidCheck=$db->getAid($aid);
                                        if($aidCheck==$aid) {
                                            $db->deleteAd($aid);
                                            echo "<h4 class='mt-2 text-success text-center'>Ad Deleted Successfully!</h4>";                                                            
                                        }
                                        else {
                                            echo "<h4 class='mt-2 text-danger text-center'>Ad ID Doesn't Exists.</h4>";                            
                                            echo "<div class='text-center mb-4'><a class='btn btn-primary text-center' href='../wp-admin/admin.php?page=boostAdmin_ads'>Try again</a></div>";  
                                        }                                
                                    }                                                     
                                }
                                else { ?>
                                    <form class="form" method="post">                                                          
                                        <div class="form-group row">
                                            <label for="colFormLabel4" class="col-sm-4 col-form-label">Ad ID</label>
                                            <div class="col-sm-8">
                                                <input required name="aid" type="text" class="form-control" id="colFormLabel4" placeholder="Enter Ad ID">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button name="ad-delete" type="submit" class="btn btn-danger my-1 mb-4">Delete</button>
                                        </div>
                                    </form>
                                    <?php
                                } 
                                ?> 
                            </div>  
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 text-center  bg-dark rounded">
                            <h2 class="m-0 font-weight-bold text-light">Current Ads</h2>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Ad.ID</th>
                                        <th scope="col">Ad Type</th>
                                        <th scope="col">Link</th>                                                                                                     
                                                                                                                                                                            
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                               
                                        $db = new db();
                                        $ads=$db->allAds();                                                                                                                
                                        foreach($ads as $row) {
                                            $type="";
                                            if($row[1]==0) {
                                                $type="Youtube";                                       
                                            }
                                            else {
                                                $type="External Link";
                                            }
                                                ?>                                        
                                                    <tr>
                                                        <th scope="row"><?php  echo $row[0]; ?></th>
                                                        <th><?php  echo $type; ?></th>
                                                        <th><?php  echo $row[2]; ?></th> 
                                                    </tr>                                                                        
                                                <?php                               
                                        }                                                        
                                    ?>                
                                </tbody>
                            </table>  
                        </div>
                    <div>
                </div>
            </div>
        <?php
    }
    function boostAdmin_main_session() {
        ?>
        <script>
            function openInNewTab(url) {
                var win = window.open(url, '_blank');
                win.focus();
            }
        </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <div class="row">
            <div class="col mb-4">                         
                <div class="card shadow mx-auto">
                    <div class="card-header rounded bg-dark text-center">
                        <h2 class="m-0 font-weight-bold text-light">Start Session</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_POST["uid-submit"])) {
                            $uid=$_POST["uid"];
                            if($uid=="") {
                                echo "<h4 class='mt-2 text-danger text-center'>Error! Please Enter User ID.</h4>";                            
                                echo "<div class='text-center mb-4'><a class='btn btn-primary text-center' href='../wp-admin/admin.php?page=boostAdmin_session'>Try again</a></div>";                       
                            }
                            else {                           
                                $db = new db();  
                                $user=$db->Session($uid);
                                if($user[0]==$uid) {                                    
                                    $_SESSION["user"]=$user;                                   
                                    echo "<h4 class='mt-2 text-success text-center'>Session Started Successfully!</h4>";
                                    echo "<script> openInNewTab('../user'); </script>";                                                          
                                }
                                else {
                                    echo "<h4 class='mt-2 text-danger text-center'>User not found</h4>";                            
                                    echo "<div class='text-center mb-4'><a class='btn btn-primary text-center' href='../wp-admin/admin.php?page=boostAdmin_session'>Try again</a></div>"; 
                                }                            
                            }                                                     
                        }
                        else { ?>
                            <form class="form" method="post">                             
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">UID:</label>
                                    <div class="col-sm-10">
                                    <input required name="uid" type="text" class="form-control" id="colFormLabel" placeholder="Enter User ID">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button name="uid-submit" type="submit" class="btn btn-primary my-1 mb-4">Submit</button>
                                </div>
                            </form>
                            <?php
                        } ?> 
                    </div>                
                </div>    
            </div>          
        </div>
        <?php
    }
    class db {         
        private $servername = "shareddb-o.hosting.stackcp.net";
        private $username = "maininvest";
        private $password = "jj9]K4TW~A0h";
        private $dbname="maindi-313039a422";
        
        public function connection() {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       
            return $conn;
        }
        
        public function AddLink($method,$link)  {            
            try { 
                $conn = $this->connection();
                $ad_query="INSERT INTO watch_ads (type,link) VALUES ('{$method}','{$link}')";
                $conn->exec($ad_query);                                
            }
            catch(PDOException $e) {
                echo $e->getMessage();            
            }          
            finally {
                $conn=null;
            }                                                
        }
        public function deleteAd($aid)  {            
            try { 
                $conn = $this->connection();
                $ad_query="DELETE FROM watch_ads WHERE aid='{$aid}'";
                $conn->exec($ad_query);                                
            }
            catch(PDOException $e) {
                echo $e->getMessage();            
            }          
            finally {
                $conn=null;
            }                                                
        }
        public function Session($uid) {           
            $user = "";         
            try {                
                $conn = $this->connection();
                $login_query="SELECT * FROM users WHERE uid='{$uid}'";
                $user=$conn->query($login_query)->fetch();                                                    
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
            finally {
                $conn=null;
                return $user;                
            }
        }
        public function pendingWithdrawals() {           
            $pending = "";
            try {                
                $conn = $this->connection();
                $payment_query="SELECT * FROM withdrawals WHERE approval='0'";
                $pending=$conn->query($payment_query)->fetchAll();                    
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
            finally {
                $conn=null;
                return $pending;
            }
        }
        public function allAds() {           
            $ads = "";
            try {                
                $conn = $this->connection();
                $ad_query="SELECT * FROM watch_ads";
                $ads=$conn->query($ad_query)->fetchAll();                    
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
            finally {
                $conn=null;
                return $ads;
            }
        }
        public function getUsername($uid) {           
            $unm = "";
            try {                
                $conn = $this->connection();
                $unm_query="SELECT username FROM users WHERE uid='{$uid}'";
                $unm=$conn->query($unm_query)->fetch();                    
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
            finally {
                $conn=null;
                return $unm[0];
            }
        }
        public function getWid($wid) {           
            $withdrawal = "";
            try {                
                $conn = $this->connection();
                $wid_query="SELECT wid FROM withdrawals WHERE wid='{$wid}' AND approval=0";
                $withdrawal=$conn->query($wid_query)->fetch();                    
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
            finally {
                $conn=null;
                return $withdrawal[0];
            }
        }
        public function getLink($link) {           
            $ad = "";
            try {                
                $conn = $this->connection();
                $ad_query="SELECT link FROM watch_ads WHERE link='{$link}'";
                $ad=$conn->query($ad_query)->fetch();                    
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
            finally {
                $conn=null;
                return $ad[0];
            }
        }
        public function getAid($aid) {           
            $ad = "";
            try {                
                $conn = $this->connection();
                $ad_query="SELECT aid FROM watch_ads WHERE aid='{$aid}'";
                $ad=$conn->query($ad_query)->fetch();                    
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
            finally {
                $conn=null;
                return $ad[0];
            }
        }
        public function AddWithdrawal($tid,$wid)  {            
            try { 
                $conn = $this->connection();
                $withdrawal="UPDATE withdrawals SET approval='1',tid='{$tid}',date=NOW() WHERE wid='{$wid}'";
                $conn->exec($withdrawal);                                
            }
            catch(PDOException $e) {
                echo $e->getMessage();            
            }          
            finally {
                $conn=null;
            }                                                
        }
        public function rejectWithdraw($wid,$reason) {
            try { 
                $conn = $this->connection();
                $approval="UPDATE withdrawals SET approval='3' WHERE wid='{$wid}'";
                $conn->exec($approval); 
                $wd_query="SELECT * FROM withdrawals WHERE wid='{$wid}'";                
                $wd=$conn->query($wd_query)->fetch();                 
                $rej="INSERT INTO rejected_wid (wid,reason,uid) VALUES ('{$wid}','{$reason}','{$wd[7]}')";
                $conn->exec($rej);
                $bal_query="SELECT amount FROM balance WHERE uid='{$wd[7]}'";
                $bal=$conn->query($bal_query)->fetch();  
                $balance = (float)$bal[0];
                $refund = (float)$wd[5];                
                $balance = $balance+$refund;
                $updateBalance="UPDATE balance SET amount='{$balance}' WHERE uid='{$wd[7]}'";
                $conn->exec($updateBalance);                
            }
            catch(PDOException $e) {
                echo $e->getMessage();            
            }          
            finally {
                $conn=null;
            }  
        } 
        public function UpdateSubscriptionPending($sid) {
            try { 
                $conn = $this->connection();
                $subs="UPDATE subscriptionpending SET status='1' WHERE sid='{$sid}'";
                $conn->exec($subs);                 

            }
            catch(PDOException $e) {
                echo $e->getMessage();            
            }          
            finally {
                $conn=null;
            }                                                
        }
        public function DeletePendingSubscription($sid) {
            try { 
                $conn = $this->connection();
                $subs="UPDATE subscriptionpending SET status='2' WHERE sid='{$sid}'";
                $conn->exec($subs);                 

            }
            catch(PDOException $e) {
                echo $e->getMessage();            
            }          
            finally {
                $conn=null;
            }                                                
        }
        public function checkTicket($ticket) {            
            $contain = FALSE;
            try {                
                $conn = $this->connection();
                $check_query="SELECT * FROM subscription WHERE tid='{$ticket}'";
                if ($check = $conn->query($check_query)) {
                    # check the row count
                    if ($check->fetchColumn() > 0) {
                        $contain=TRUE;                  
                    }                    
                }   
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
            finally {
                $conn=null;
                return $contain;
            }
        }
        public function allPendingPackages() {           
            $ads = "";
            try {                
                $conn = $this->connection();
                $ad_query="SELECT * FROM subscriptionpending WHERE status='0'";
                $ads=$conn->query($ad_query)->fetchAll();                    
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
            finally {
                $conn=null;
                return $ads;
            }
        }
        public function AddSubscription($account,$package,$uid) {
            try { 
                $conn = $this->connection();
                $subs="INSERT INTO subscription (uid,account,package,expiry) VALUES ('{$uid}','{$account}','{$package}',DATE_ADD(NOW(), INTERVAL 6 Month))";
                $conn->exec($subs);                
                $active="UPDATE users SET package='{$package}' WHERE uid='{$uid}'";
                $conn->exec($active); 
                $check_query="SELECT * FROM referral WHERE uid='{$uid}' and status='0'";
                $check = $conn->query($check_query)->fetch(); 
                if(isset($check) && count($check)>0) {
                    if ($check[0]==$uid) {
                        $comission;
                        if($package=="1") {
                            $comission=50;
                        }
                        else if($package=="2") {
                            $comission=100;
                        }
                        else if($package=="3") {
                            $comission=200;
                        }
                        else if($package=="4") {
                            $comission=750;
                        }
                        else if($package=="5") {
                            $comission=1500;
                        }
                        else if($package=="6") {
                            $comission=2000;
                        }
                        else {
                            $comission=0;
                        }
                        $balance = $this->Balance($check[1]);
                        $balance = (float)$balance[1];
                        $balance = $balance+$comission;
                        $balance_query="UPDATE balance SET amount='{$balance}' WHERE uid='{$check[1]}'";
                        $conn->exec($balance_query);  
                        $ref_query="UPDATE referral SET status='1' WHERE uid='{$uid}'";
                        $conn->exec($ref_query);  
                    }    
                }
                $daily_ads=0;
                if($package==1) {
                    $daily_ads=5;
                }
                if($package==2) {
                    $daily_ads=5;
                }
                if($package==3) {
                    $daily_ads=5;
                }
                if($package==4) {
                    $daily_ads=5;
                }
                if($package==5) {
                    $daily_ads=5;
                }
                if($package==6) {
                    $daily_ads=5;
                }
                $ads="UPDATE ads SET ads='{$daily_ads}', date=NOW() WHERE uid='{$uid}'";
                $conn->exec($ads);                 

            }
            catch(PDOException $e) {
                echo $e->getMessage();            
            }          
            finally {
                $conn=null;
            }                                                
        }
    } 
?>
