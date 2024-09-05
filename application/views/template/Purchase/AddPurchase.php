
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Add Purchase</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Add Purchase</a>
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
                                                        <h5>Add Purchase</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <form id="orderForm" data-parsley-validate>
                                                            <div class="row">
                                                            <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Select a Supplier <span class="text-danger">*</span></label>
                                                                        <select name="sup_id" id="sup_id" class="form-control" required data-parsley-trigger="change">
                                                                            <option value="">Select a Supplier</option>
                                                                            <?php foreach($suppliers as $supplier)
                                                                            { ?>
                                                                            <option value="<?=$supplier->id;?>"><?=$supplier->name;?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                            <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Purchase Date <span class="text-danger">*</span></label>
                                                                        <input type="date" name="pur_date" id="pur_date" class="form-control pro_code"  placeholder="Enter Purchse Date" required data-parsley-trigger="change">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Purchase No. <span class="text-danger">*</span></label>
                                                                        <input type="text" name="pur_no" id="pur_no" class="form-control pro_code"  placeholder="Enter Purchase No." required data-parsley-trigger="change">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="float-label">Purchase Details</label>
                                                                        <input type="text" name="pur_details" id="pur_details" class="form-control pro_code"  placeholder="Enter Purchase Details" required data-parsley-trigger="change">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row product-details mt-4">

                                                             </div>   
                                                             <table class="table table-hover" style="border:2px solid black;">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.No.</th>
                                                                <th>Product Name</th>
                                                                <th>Rate</th>
                                                                <th>Quantity</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                    
                                                    <div class="text-left">
                                                        <button type="button" class="btn btn-success">Add New item</button>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-8"></div>
                                                        <div class="col-12">
                                                        <h3 class="col-3 float-right" >Total <input type="text" class="form-control finalTotal" readonly name="FinalTotal"></h3>
                                                        </div>
                                                    </div>
                                                            <div class="text-right  float-right">
                                                               
                                                                <input type="submit" id="orderForm" value="Add Purchase" class="btn btn-primary">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

<script>
    $(document).ready(function () {
        // Add default row
        addRow();

        // Add new item row
        $(".btn-success").click(function () {
            addRow();
        });

        // Calculate total when quantity or rate changes
        $(".table").on("input", "input[name^='qty[]'], input[name^='rate[]']", function () {
            calculateTotal($(this).closest("tr"));
        });

        // Remove row
        $(".table").on("click", ".remove-row", function () {
            $(this).closest("tr").remove();
            updateFinalTotal();
        });

        // Calculate the total for the current row
        function calculateTotal(row) {
            var rate = parseFloat(row.find("input[name^='rate[]']").val()) || 0;
            var qty = parseFloat(row.find("input[name^='qty[]']").val()) || 0;
            var total = rate * qty;
            row.find("input[name^='total[]']").val(total.toFixed(2));
            updateFinalTotal();
        }

        // Calculate and update the final total
        function updateFinalTotal() {
            var finalTotal = 0;
            $(".item-total").each(function () {
                finalTotal += parseFloat($(this).val()) || 0;
            });
            $(".finalTotal").val(finalTotal.toFixed(2));
        }

$('#orderForm').parsley();
$("#orderForm").submit(function (e) {
    e.preventDefault();

    // Validate the form using Parsley
    var isValid = $('#orderForm').parsley().isValid();

    if (isValid) {
        // Form is valid, proceed with the AJAX request
        var formData = $(this).serializeArray();

        $.ajax({
            url: '<?=base_url()?>Purchase/OrderSubmit',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
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
                                window.open('<?php echo base_url('purchase-invoice/') ;?>'+response.invoice_no, '_blank');
                                break;
                            case 'printer':
                                window.open('<?php echo base_url('purchase-invoice/') ;?>'+response.invoice_no, '_blank');
                                break;
                            default:
                                document.getElementById("orderForm").reset();
                        }
                    });
                    $("#orderForm")[0].reset();
                    $(".table tbody")[0].reset();
                    updateFinalTotal();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while processing your request. Please try again.',
                });
            },
        });
    } else {
        // Form is not valid, you can handle this case (e.g., show an error message)
        console.log('Form validation failed');
    }
});


        // Function to add a new row
        function addRow() {
    var rowNumber = $(".table tbody tr").length + 1;
    var newRow = '<tr>' +
        '<td>' + rowNumber + '<input type="hidden" name="srno[]" value="' + rowNumber + '" readonly></td>' +
        '<td><input type="text" class="form-control" name="pro_name[]" required data-parsley-trigger="change"></td>' +
        '<td><input type="number" class="form-control" name="rate[]" required data-parsley-trigger="change"></td>' +
        '<td><input type="number" class="form-control" name="qty[]" required data-parsley-trigger="change"></td>' +
        '<td><input type="number" class="form-control item-total" name="total[]" required data-parsley-trigger="change"  readonly></td>' +
        '<td><button type="button" class="btn btn-danger btn-sm remove-row">Delete</button></td>' +
        '</tr>';

    $(".table tbody").append(newRow);
    calculateTotal($(".table tbody tr:last"));
}
    });

</script>

