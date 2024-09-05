<div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">User Profile</h5>
                                          <!-- <p class="m-b-0">Welcome to Dashboard</p> -->
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">User Profile</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <style type="text/css">
                        .profile-pic{
                            position: relative;
                            width: 150px;
                            height: 150px;
                            margin-bottom: 15px;
                            border-radius: 50%;
                            margin-left: 20px;
                            /* border: 2px solid blueviolet ; */

                        }

                        .profile-pic input{
                            display: none;
                            
                        }
                        .profile-pic img{
                            position: absolute;
                            width: 100%;
                            max-width: 150px;
                            height: 100%;
                            max-height: 150px;
                            border-radius: 50%;
                            border: 2px solid blueviolet ;

                        }
                        .profile-pic label{
                                position: absolute;
                                bottom: 0;
                                margin: auto;
                                text-align: center;
                                height: 22%;
                                color: white;
                                /* background: #80808075; */
                                width: 100%;
                                cursor: pointer;
                                z-index: 0;
                        }
                    </style>
                                    <div class="page-body">
                                        <div class="row">
                                        <?php foreach($users as $user) { ?>
                                            <div class="col-lg-4">
                                                <div class="row">                                                <div class="col-lg-12">
                                                    <div class="card">
                                                    <div class="card-body text-center">
                                                    <form class="form ajaxsubmit reload-page" action="<?=base_url()?>profile/update" method="POST" enctype="multipart/form-data">
                                                    <div class="profile-pic">
                                                        <div></div>
                                                        <input id="profile-pic" type="file" class="onchange-submit" accept="image/*" name="photo">
                                                        <img  src="<?php echo IMGS_URL.$user->logo?>" onerror="this.src='<?=base_url()?>images/noimg.png';" alt="<?=$user->name?>">
                                                        <label for="profile-pic">Change</label>
                                                    </div>

                                                </form>
                                                        <h5 class="my-3"><?=$user->name;?></h5>
                                                        <p class="text-muted mb-1"><?=$user->username;?></p>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <form class="form ajaxsubmit reload-page" action="<?=base_url()?>profile/change-password" method="POST" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput">Old Password</label>
                                                                    <input type="text" class="form-control"  name="old_password" id="old_password" placeholder="Enter Old Password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="new_pass">New Password</label>
                                                                    <input type="text" class="form-control" name="password" id="password" placeholder="Enter New Password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="confirm_pass">Confirm New Password</label>
                                                                    <input type="text" class="form-control" name="conf_password" id="conf_password" placeholder="Enter Confirm New Password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-success btn-sm">Upadate Password</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <form class="form ajaxsubmit reload-page" action="<?=base_url()?>profile/update" method="POST" enctype="multipart/form-data">
                                                         <div class="row">
                                                            <div class="form-group col-6">
                                                                <label for="name">Full name</label>
                                                                <input type="text" class="form-control" name="name" id="name" value="<?=$user->name;?>">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="new_pass">Email</label>
                                                                <input type="text" class="form-control" name="email" id="email" value="<?=$user->username;?>">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="confirm_pass">Mobile No.</label>
                                                                <input type="text" class="form-control" name="contact" id="mobile" value="<?=$user->contact;?>">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="confirm_pass">Username</label>
                                                                <input type="text" class="form-control" name="username" id="username" value="<?=$user->username;?>">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="confirm_pass">GST NO.</label>
                                                                <input type="text" class="form-control" name="gst" id="gst" value="<?=$user->gst;?>">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="confirm_pass">Country.</label>
                                                                <input type="text" class="form-control" name="country" id="country" value="<?=$user->country;?>">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="confirm_pass">State</label>
                                                                <input type="text" class="form-control" name="state" id="state" value="<?=$user->state;?>">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="confirm_pass">City .</label>
                                                                <input type="text" class="form-control" name="city" id="city" value="<?=$user->city;?>">
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="confirm_pass">Pincode.</label>
                                                                <input type="text" class="form-control" name="pincode" id="pincode" value="<?=$user->pincode;?>">
                                                            </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary btn-sm">Upadate Details</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                            
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).on('change','.onchange-submit', function(event) {
    $(this).parents('form').submit();
})
    </script>