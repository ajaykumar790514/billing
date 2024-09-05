
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Billing</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Billing</a>
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
                                                        <h5>Billing</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <form id="orderForm">
                                                            <div class="row">
                                                            <div class="col-md-4">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Select a Category</label>
                                                                        <select name="cat_id" id="category" class="form-control">
                                                                            <option value="">Select a Category</option>
                                                                            <?php foreach($categories as $cateogry)
                                                                            { ?>
                                                                            <option value="<?=$cateogry->id;?>"><?=$cateogry->name;?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Select a Sub Category</label>
                                                                        <select name="subcategory" id="subcat_id" class="form-control">
                                                                            <option value="">Select a Sub Category</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            <div class="col-md-4">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Product Code</label>
                                                                        <input type="text" name="pro_code" id="pro_code" class="form-control pro_code"  placeholder="Enter Product Code">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Select a Customer</label>
                                                                        <select name="customer_id" id="customer_id" class="form-control">
                                                                            <option value="">Select a Customer</option>
                                                                         <?php foreach($customers as $customer)
                                                                         { ?>
                                                                            <option value="<?=$customer->id;?>"><?=$customer->name;?></option>
                                                                         <?php }?>
                                                                        </select>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="float-label">Select a Supplier</label>
                                                                        <select name="supplier_id" id="supplier_id" class="form-control">
                                                                            <option value="">Select a Suppliers</option>
                                                                            <?php foreach($suppliers as $supplier)
                                                                            { ?>
                                                                                <option value="<?=$supplier->id;?>"><?=$supplier->name;?></option>
                                                                            <?php }?>
                                                                        </select>
                                                                    </div>
                                                                </div> 
                                                              
                                                                <div class="col-md-4">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Date</label>
                                                                        <input type="date" value="<?=date('Y-m-d');?>" name="date" id="date" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row product-details mt-4">

                                                             </div>   
                                                            <div class="text-center">
                                                                <input type="submit" value="Submit" class="btn btn-primary">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

<script>
        $(document).ready(function() {
            $('#category').change(function() {
                var category_id = $(this).val();
                $.ajax({
                    url: '<?= base_url('Billing/loadSubcategories'); ?>',
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
                        $.post('<?=base_url()?>Billing/getCategoryProduct/', { category_id: category_id })
                        .done(function(data) {
                            $('.product-details').html(data);
                        })
                        .fail(function() {
                            toastr.error('Error!');
                        });
                    }
                });
            });
            $('#subcat_id').change(function() {
                var subcat_id = $(this).val();
                  $.post('<?=base_url()?>Billing/loadSubcategoriesProduct/', { subcat_id: subcat_id })
                        .done(function(data) {
                            $('.product-details').html(data);
                        })
                        .fail(function() {
                            toastr.error('Error!');
                        });
            });
        });
$('body').on('change | keyup', `[name="pro_code"]`, function(e) {
        var pro_code = $(this).val();
        $.post('<?=base_url()?>Billing/getClientProduct/', { pro_code: pro_code })
            .done(function(data) {
                $('.product-details').html(data);
            })
            .fail(function() {
                toastr.error('Error!');
            });
    
});
</script> 
<script>
 
$(document).ready(function() {
    $('body').on('input', '[name="quantity"]', function(e) {
        var quantity = parseFloat($(this).val()) || 0;
        var total_tax = parseFloat($('#tax').val()) || 0;
        var total_amount = parseFloat($('#amount').val()) || 0;

        var FinalTax = total_tax * quantity;
        var FinalAmount = total_amount * quantity;

        $('.payable_tax').text(FinalTax.toFixed(2));
        $("#total_tax").val(FinalTax.toFixed(2));

        $('.payable_amount').text(FinalAmount.toFixed(2));
        $("#total_amount").val(FinalAmount.toFixed(2));
        $('.total_qty').val(quantity);
    });
});
$(document).ready(function() {
    $('#orderForm').submit(function(e) {
        e.preventDefault();
        swal({
            title: 'Processing...',
            text: 'Please wait.',
            icon: 'info',
            buttons: false, // Disable all buttons
            timer: 2000 // 2 seconds
        });
        var formData = $(this).serialize();
        setTimeout(function() {
        $.ajax({
            type: 'POST',
            url: '<?=base_url('Billing/OrderSubmit');?>',
            data: formData,
            dataType: 'json', 
            success: function(response) {
                if (response.success) {
                    swal({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        buttons: {
                            pdf: {
                                text: 'Print PDF',
                                value: 'pdf',
                                className: 'swal-pdf-button',
                            },
                            printer: {
                                text: 'Print Printer',
                                value: 'printer',
                                className: 'swal-printer-button',
                            },
                            close: 'Close'
                        },
                        customClass: {
                            confirmButton: 'swal-confirm-button',
                        },
                    })
                    .then((value) => {
                        switch (value) {
                            case 'pdf':
                                window.open('<?php echo base_url('client-invoice/') ;?>'+response.invoice_no, '_blank');
                                break;
                            case 'printer':
                                window.open('<?php echo base_url('client-invoice/') ;?>'+response.invoice_no, '_blank');
                                break;
                            default:
                                document.getElementById("orderForm").reset();
                        }
                    });
                    document.getElementById("orderForm").reset();
                } else {
                    swal({
                        title: 'Error',
                        text: 'Error: ' + response.message,
                        icon: 'error'
                    });

                }
            },
            error: function() {
                swal({
                    title: 'Error',
                    text: 'Error submitting order.',
                    icon: 'error'
                });
            }
        });
    }, 2000);
    });
});

</script>


<style>
   
.swal-pdf-button {
    background-color: #007bff; 
    color: #fff;
}


.swal-printer-button {
    background-color: #007bff; 
    color: #fff;
}

.swal-confirm-button {
    background-color: #007bff; 
    color: #fff;
}

</style>