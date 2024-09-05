<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Product Master</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo base_url().'dashboard';?>"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Inventory</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Product Master</a>
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
                                                <h5></h5><a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm">Add Product</a>
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
                                                                <th>Image</th>
                                                                <th>Product Code</th>
                                                                <th>Product</th>
                                                                <th>MRP</th>
                                                                <th>Selling Price</th>
                                                                <th>Product TAX (%)</th>
                                                                <th>Description</th>
                                                                <th>Category Name</th>
                                                                 <th>Sub Category Name</th>
                                                                <th>Stock</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1;
                                                        foreach($products as $pro)
                                                        {
                                                            $existqty  = $this->admin_model->getRow('pro_stock_qty',['pro_id'=>$pro->id]);
                                                    ?>
                                                            <tr>
                                                                <th scope="row"><?=$i;?></th>
                                                                <td><?php  if(!empty($pro->img)){?> <img src="<?=IMGS_URL.$pro->img;?>" height="70px" weight="70px"  alt=""> <?php } ;?></td>
                                                                <td><?=$pro->pro_code;?></td>
                                                                <td><?=$pro->pro_name;?></td>
                                                                <td><?=$pro->mrp;?></td>
                                                                <td><?=$pro->selling_rate;?></td>
                                                                <td><?=$pro->pro_tax;?> %</td>
                                                                <td><?=$pro->description;?></td>
                                                                <td><?=$pro->cat_name;?></td>
                                                                <td><?=$pro->sub_cat_name;?></td>
                                                                <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#stock<?=$i;?>">Stock</a></td>
                                                                <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?=$i;?>"><i class="ti-pencil-alt"></i></a>
                                                                    <a href="<?=base_url('subcategory-master/delete/'.$pro->id);?>" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a></td>
                                                            </tr>



                                            <!-- Modal -->
                                            <div class="modal fade empdoc" id="exampleModal<?=$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <form class="form reload-page ajaxsubmit validate-form reload-tb" action="<?=base_url('product-master/save/'.$pro->id)?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Product ( <?=$pro->pro_name;?> )</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                 <div class="row">
                                                    <div class="col-6 form-group">
                                                            <label for="">Select a Category</label>
                                                            <select name="cat_id" id="" class="form-control">
                                                           <option>--Select--</option>
                                                            <?php 
                                                             foreach($cats as $cat)
                                                            {
                                                            ?>
                                                                <option value="<?=$cat->id;?>" <?php if($pro->cat_id==$cat->id){ echo "selected";} ;?> ><?=$cat->name;?></option>
                                                                <?php } ?>
                                                            </select>
                                                    </div>
                                                    <div class="col-6 form-group">
                                                            <label for="">Select a Subcategory</label>
                                                            <select name="subcat_id" id="" class="form-control">
                                                                 <option>--Select--</option>
                                                            <?php 
                                                             foreach($categories as $category)
                                                            {
                                                            ?> 
                                                                <option value="<?=$category->id;?>"   <?php if($pro->sub_cat_id==$category->id){ echo "selected";} ;?> ><?=$category->name;?></option>
                                                                <?php } ?>
                                                            </select>
                                                    </div>
                                                     <div class="col-6 form-group">
                                                            <label for="">Product Name</label>
                                                            <input type="text" name="pro_name" class="form-control" required value="<?=$pro->pro_name;?>">
                                                    </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Description</label>
                                                            <input type="text" name="description" class="form-control" required value="<?=$pro->description;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">MRP</label>
                                                            <input type="number" name="mrp" class="form-control" required value="<?=$pro->mrp;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Selling Price</label>
                                                            <input type="number" name="sell_price" class="form-control" required value="<?=$pro->selling_rate;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Product TAX (%)</label>
                                                            <input type="number" name="pro_tax" class="form-control" required value="<?=$pro->pro_tax;?>">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label for="">Thumbnail</label>
                                                            <input type="file" name="application"  class="form-control">
                                                            <?php if(!empty($pro->img)){?>
                                                             <img src="<?=IMGS_URL.$pro->img;?>" height="100px" width="100px" alt="">
                                                            <?php }?>  
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

                                            <!-- Add Stock Quantity -->
                                            <div class="modal fade empdoc" id="stock<?=$i;?>" tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                <form class="form ajaxsubmit reload-page validate-form reload-tb" action="<?=base_url('product-master/qty')?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ProductImage">Product Quantity ( <?=$pro->pro_name;?> )</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <input type="hidden" name="exist_qty" value="<?php echo @$existqty->qty !== null ?  @$existqty->qty : 0; ?>">
                                                        <input type="hidden" name="pro_id" value="<?=$pro->id?>">
                                                         <div class="col-4 form-group">
                                                            <button href="#add<?=$i;?>" class="btn btn-default" data-toggle="collapse" >Add Quantity</button> 
                                                            <div id="add<?=$i;?>" class="collapse in mt-3">
                                                                <label for="">Product Quantity</label>
                                                                <input type="number" name="add_qty" value="0" class="form-control" required placeholder="Enter Product Quantity">
                                                            </div>
                                                        </div>
                                                        <div class="col-4 form-group">
                                                            <button href="#substract<?=$i;?>" class="btn btn-default" data-toggle="collapse" >Substract Quantity</button> 
                                                            <div id="substract<?=$i;?>" class="collapse mt-3">
                                                                <label for="">Product Quantity</label>
                                                                <input type="number" name="sub_qty" value="0" class="form-control" required placeholder="Enter Product Quantity">
                                                            </div>
                                                        </div>
                                                        <div class="col-4 form-group">
                                                            <button type="button" class="btn btn-default">Existing Quantity : <?php echo @$existqty->qty !== null ?  @$existqty->qty : 0; ?>
</button>

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

<!-- Add Product modal -->


<!-- Modal -->
<div class="modal fade empdoc" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content ">
    <form class="form ajaxsubmit reload-page validate-form reload-tb" action="<?=base_url('product-master/save')?>" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-6 form-group">
                    <label for="">Select a Category</label>
                    <select name="cat_id" id="category" class="form-control">
                   <option>--Select--</option>
                    <?php 
                     foreach($cats as $cat)
                    {
                    ?>
                        <option value="<?=$cat->id;?>"><?=$cat->name;?></option>
                        <?php } ?>
                    </select>
            </div>
            <div class="col-6 form-group">
                    <label for="">Select a Subcategory</label>
                    <select name="subcat_id" id="subcat_id" class="form-control">
                         <option>--Select--</option>
                    </select>
            </div>
            <div class="col-6 form-group">
                    <label for="">Product Name</label>
                    <input type="text" name="pro_name" class="form-control" required placeholder="Enter Product Name">
            </div>
            <div class="col-6 form-group">
                <label for="">Description</label>
                <input type="text" name="description" class="form-control" required placeholder="Enter Description">
            </div>
            <div class="col-6 form-group">
                <label for="">MRP</label>
                <input type="number" name="mrp" class="form-control" required placeholder="Enter MRP">
            </div>
            <div class="col-6 form-group">
                <label for="">Selling Price</label>
                <input type="number" name="sell_price" class="form-control" required placeholder="Enter Selling Price">
            </div>
            <div class="col-6 form-group">
                <label for="">Product TAX (%)</label>
                <input type="number" name="pro_tax" class="form-control" required placeholder="Enter Product TAX (%)">
            </div>
            <div class="col-6 form-group">
                <label for="">Product Image</label>
                <input type="file" name="img[]" class="form-control"
                    size="55550" accept=".png, .jpg, .jpeg, .gif" multiple="" required >
            </div>
            <div class="col-6 form-group">
                <label for="">Thumbnail</label>
                <input type="file" name="application" class="form-control" required>
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


<script>
    $(document).ready(function() {
            $('#category').change(function() {
                var category_id = $(this).val();
                $.ajax
                ({
                    url: '<?= base_url('Inventory/loadSubcategories'); ?>',
                    type: 'POST',
                    data: { category_id: category_id },
                    dataType: 'json',
                    success: function(data) 
                    {
                        var options = '<option value="">Select Subcategory</option>';
                        for (var i = 0; i < data.length; i++) {
                            options += '<option value="' + data[i]['id'] + '">' + data[i]['name'] + '</option>';
                        }
                        $('#subcat_id').html(options);
                    }
                });
            });
        });
</script>