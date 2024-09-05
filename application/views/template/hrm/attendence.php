<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Attendence Punch</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Attendence Punch</a>
                                            </li>
                                            <!-- <li class="breadcrumb-item"><a href="#!">Basic Form Inputs</a>
                                            </li> -->
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
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5></h5><a href="<?php echo base_url().'dashboard';?>" class="btn btn-danger  btn-sm text-white"><i class="ti-angle-left"></i> Back</a
                                                        <?php
                                                        if(!empty($this->session->flashdata('msg')))
                                                        {
                                                        echo "<div class='alert alert-success mt-2'>".$this->session->flashdata('msg')."</div>";
                                                        } 
                                                        ?>
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form reload-page ajaxsubmit validate-form reload-tb" action="<?=base_url('insert-attendence')?>" method="POST" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Employee Name</label>
                                                                        <select name="emp_id" id="emp_id" class="form-control">
                                                                            <option value="">Select a Employee</option>
                                                                            <?php 
                                                                            foreach($employees as $employee)
                                                                            {?>
                                                                            <option value="<?=$employee->id?>"><?=$employee->emp_name?></option>
                                                                            <?php }?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="float-label">Punch In Time</label>
                                                                        <input type="time" name="punch_intime" id="field1" class="form-control">
                                                                    </div>
                                                                </div> 
                                                                <div class="col-md-4">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label"> Date</label>
                                                                        <input type="date" name="punch_date" id="field2" class="form-control" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-8"></div>
                                                                <div class="col-4">
                                                                <div class="row">
                                                                <div class="col-4">
                                                                <div class="form-check">
                                                                <input class="form-check-input" type="radio" value="0" id="defaultCheck1"  name="status">
                                                                <label class="form-check-label" for="defaultCheck1">
                                                                   If Absent
                                                                </label>
                                                                </div>
                                                                </div>
                                                                <div class="col-4">
                                                                <div class="form-check">
                                                                <input class="form-check-input" type="radio" value="3" id="defaultCheck2"   name="status">
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                   If Holiday
                                                                </label>
                                                                </div>
                                                                </div>
                                                                <div class="col-4">
                                                                <div class="form-check">
                                                                <input class="form-check-input" type="radio" value="2" id="defaultCheck2"  name="status">
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                   If Sunday
                                                                </label>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <input type="submit" value="Submit" class="btn btn-primary">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="card-block table-border-style">
                                                     <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Emp Name</th>
                                                                <th>Emp Mobile</th>
                                                                <th>Department</th>
                                                                <th>Punch InTime</th>
                                                                <th>Punch OutTime</th>
                                                                <th>Punch Date</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1;
                                                        foreach($att as $dep)
                                                        {
                                                       ?>
                                                            <tr>
                                                                <th scope="row"><?=$i;?></th>
                                                                <td><?=$dep->emp_name;?></td>
                                                                <td><?=$dep->mobile;?></td>
                                                                <td><?=$dep->dept_name;?></td>
                                                                <td><?php if($dep->punch_intime !='00:00:00'){ echo _time($dep->punch_intime) ;};?></td>
                                                                <td><?php if($dep->punchout_time !='00:00:00'){ echo _time($dep->punchout_time) ;};?></td>
                                                                <td><?=_date($dep->punch_date);?></td>
                                                                <td>
                                                                    <?php 
                                                                     if($dep->att_status==0)
                                                                     {
                                                                        echo "<h5 class='text-danger'>Absent</h5>";
                                                                     }elseif($dep->att_status==1)
                                                                     {
                                                                        echo "<h5 class='text-success'>Present</h5>";
                                                                     }elseif($dep->att_status==2 )
                                                                     {
                                                                        echo "<h5 class='text-warning'>Sunday</h5>";
                                                                     }elseif($dep->att_status==3)
                                                                     {
                                                                        echo "<h5 class='text-danger'>Holiday</h5>";
                                                                     }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                             <?php if(!empty($dep->punch_intime) && $dep->punch_intime !='00:00:00'){
                                                                  $count1= $this->lib_model->Counter('emp_att', array('id'=> $dep->id,'punchout_time'=>$dep->punchout_time,'punch_intime'=>$dep->punch_intime));
                                                                    if($count1==1 && $dep->punchout_time=='00:00:00'){?>

                                                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal<?=$i;?>">Punch Out</a>
                                                                    <?php }else{?>
                                                              <?php if(@$dep->punch_intime !='' && @$dep->punchout_time !=''){ echo time_diff($dep->punch_intime,$dep->punchout_time).'H' ;}else{ echo "00:00:00 H";};?>
                                                                    <?php } }?>  
                                                                </td>
                                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade empdoc" id="exampleModal<?=$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form class="form reload-page ajaxsubmit validate-form reload-tb" action="<?=base_url('att-punch-out/'.$dep->id)?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Punch OutTime ( <?=$dep->emp_name;?> )</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="row">
                                                    <input type="hidden" name="id" value="<?=$dep->id;?>">
                                                    <div class="col-12 form-group">
                                                        <label for="">Select Time:</label>
                                                        <input type="time" name="time" class="form-control" required>
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
                                            </div>
                                          