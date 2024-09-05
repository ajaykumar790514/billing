<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Expense Item</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Expense</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Expense Item</a>
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
                                                        <form class="form ajaxsubmit reload-page validate-form reload-tb" action="<?=base_url('expense-item/save')?>" method="POST" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Expense Item <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control" name="exp_name" placeholder="Expense Item" required>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <!-- <div class="col-lg-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label">Root Account</label>
                                                                        <div class="col-sm-8">
                                                                        <select name="" id="" class="form-control">
                                                                            <option value="">Select a Root Account</option>
                                                                            <option value="">Supplier</option>
                                                                            <option value="">Customer</option>
                                                                        </select>
                                                                        </div>
                                                                    </div>   
                                                                </div> -->
                                                                <div class="col-lg-12">
                                                                    <div class="form-group text-center mt-3">
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </div>  
                                                            </form>
                                                                   
                                                                </div>
                                                            </div>
                                                            <!-- Basic Form Inputs card end -->
                                                            <div class="table-responsive">
                                                    <table id="example"  class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Expense Item </th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                       <?php $i=1;
                                                       foreach($expenses as $expense) {
                                                        ?>
                                                        <tr>
                                                            <td><?=$i;?></td>
                                                            <td><?=$expense->name;?></td>
                                                            <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?=$i;?>"><i class="ti-pencil-alt"></i></a>
                                                                    <a href="<?=base_url('expense-item/delete/'.$expense->id);?>" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a></td>
                                                         </tr>

                                                         <!-- Modal -->
                                            <div class="modal fade empdoc" id="exampleModal<?=$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <form class="form reload-page ajaxsubmit validate-form reload-tb" action="<?=base_url('expense-item/save/'.$expense->id)?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Expense Item ( <?=$expense->name;?> )</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="row">
                                                    <input type="hidden" name="id" value="<?=$expense->id;?>">
                                                    <div class="col-12 form-group">
                                                        <label for="">Expense Item:</label>
                                                        <input type="text" placeholder="Enter Category name" name="exp_name" class="form-control" value="<?=@$expense->name;?>" required>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update </button>
                                                </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>


                                                        <?php $i++;
                                                       } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
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
