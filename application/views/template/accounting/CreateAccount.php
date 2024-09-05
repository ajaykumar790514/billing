<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Add New Supplier</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Accounts</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Add New Supplier</a>
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
                                  
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5></h5><a href="<?=base_url('dashboard');?>" class="btn btn-danger text-light btn-sm">< Back</a>
                                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                                    </div>
                                                    <div class="card-block">
                                                        <!-- <h4 class="sub-title">Supplier Basic Details</h4> -->
                                                        <form class="form ajaxsubmit reload-page validate-form reload-tb" action="<?=base_url('create-account/save')?>" method="POST" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Account Name <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control" name="account_name" required>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Root Account</label>
                                                                        <div class="col-sm-8">
                                                                        <select name="root_account" id="" class="form-control">
                                                                            <option value="">Select a Root Account</option>
                                                                            <?php foreach($accounts as $account)
                                                                            { ?>
                                                                            <option value="<?=$account->id;?>"><?=$account->name;?></option>
                                                                            <?php }?>
                                                                        </select>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group text-center mt-3">
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </div>  
                                                                    </form>
                                                                   
                                                                </div>
                                                            </div>
                                                            <!-- Basic Form Inputs card end -->
                                                            
                                                        </div>
                                                    </div>
                                                    <!-- Main-body end -->
                                                    <div id="styleSelector">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
