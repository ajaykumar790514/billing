
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Root Account Master</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo base_url().'dashboard';?>"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Accounts</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Root Account Master</a>
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
                                    <div class="page-body">
                                       
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5></h5><a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm">Add Root Account</a>
                                                <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php
                                            if(!empty($this->session->flashdata('msg')))
                                            {
                                            echo "<div class='alert alert-success mb-2'>".$this->session->flashdata('msg')."</div>";
                                            }
                                            if(!empty($this->session->flashdata('deletemsg')))
                                            {
                                            echo "<div class='alert alert-danger mb-2'>".$this->session->flashdata('deletemsg')."</div>";
                                            }
                                            ?>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table id="example"  class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1;
                                                        foreach($accounts as $account)
                                                        {
                                                    ?>
                                                            <tr>
                                                                <th scope="row"><?=$i;?></th>
                                                                <td><?=$account->name;?></td>
                                                                <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?=$i;?>"><i class="ti-pencil-alt"></i></a>
                                                                    <a href="<?=base_url('create-root-account/delete/'.$account->id);?>" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a></td>
                                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade empdoc" id="exampleModal<?=$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <form class="form reload-page ajaxsubmit validate-form reload-tb" action="<?=base_url('create-root-account/save/'.$account->id)?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Root Account ( <?=$account->name;?> )</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="row">
                                                    <input type="hidden" name="id" value="<?=$account->id;?>">
                                                    <div class="col-12 form-group">
                                                        <label for="">Enter Root Account:</label>
                                                        <input type="text" placeholder="Enter Root Account Name" name="root_account" class="form-control" value="<?=@$account->name;?>" required>
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
                                                        } 
                                                    ?>  
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hover table card end -->
                                    </div>
                                    <!-- Page-body end -->
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
<!-- Add Department modal -->


<!-- Modal -->
<div class="modal fade empdoc" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
    <form class="form ajaxsubmit reload-page validate-form reload-tb" action="<?=base_url('create-root-account/save')?>" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Root Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-12 form-group">
            <label for="">Enter Root Account</label>
            <input type="text" name="root_account" class="form-control" required placeholder="Enter Root Account">
        </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>