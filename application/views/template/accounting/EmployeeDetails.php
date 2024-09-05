<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Employee Details (<?=$employees->emp_name;?>)</h5>
                                            <!-- <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Accounting</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Employee Details</a>
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
                                                        <h5></h5><a href="<?=base_url('employees-payout');?>" class="btn btn-danger text-light btn-sm">< Back</a>
                                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                                    </div>
                                                    <div class="card-block">
                                                        <!-- <h4 class="sub-title">Customer Basic Details</h4> -->
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Employee Name</label>
                                                                        <input type="text" name="pro_code" id="pro_code" class="form-control pro_code" value="<?=$employees->emp_name;?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Mobile</label>
                                                                        <input type="text" name="pro_code" id="pro_code" class="form-control pro_code" value="<?=$employees->mobile;?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Email</label>
                                                                        <input type="text" name="pro_code" id="pro_code" class="form-control pro_code" value="<?=$employees->email;?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Department</label>
                                                                        <input type="text" name="pro_code" id="pro_code" class="form-control pro_code" value="<?=@$departments->name;?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Address</label>
                                                                        <input type="text" name="pro_code" id="pro_code" class="form-control pro_code" value="<?=@$employees->address;?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Bank Name</label>
                                                                        <input type="text" name="pro_code" id="pro_code" class="form-control pro_code" value="<?=@$emp_docs->bank_name;?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Account Number</label>
                                                                        <input type="text" name="pro_code" id="pro_code" class="form-control pro_code" value="<?=@$emp_docs->account_number;?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">IFSC Code</label>
                                                                        <input type="text" name="pro_code" id="pro_code" class="form-control pro_code" value="<?=@$emp_docs->ifsc_code;?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Aadhaar Number</label>
                                                                        <input type="text" name="pro_code" id="pro_code" class="form-control pro_code" value="<?=@$emp_docs->aadhaar_no;?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Aadhaar Photo</label>
                                                                        <?php  if(!empty($emp_docs->aadhaar_pic)){?> <img src="<?=IMGS_URL.$emp_docs->aadhaar_pic;?>" height="70px" weight="70px"  alt=""> <?php } ;?>                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group form-default ">
                                                                        <label class="float-label">Bank Passbook</label>
                                                                        <?php  if(!empty($emp_docs->passbook)){?> <img src="<?=IMGS_URL.$emp_docs->passbook;?>" height="70px" weight="70px"  alt=""> <?php } ;?>                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 text-center">
                                                                    <div class="form-group form-default ">
                                                                        <!-- <label class="float-label">Pay Salary</label> -->
                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Pay Now</button>
                                                                    </div>
                                                            </div>
                                                            <!-- Basic Form Inputs card end -->
                                                    </div>
                                                    <!-- Main-body end -->
                                                    <div id="styleSelector">

                                                    </div>
                                                </div>

                                                <div class="card">
                                            <div class="card-header">
                                                <h5></h5><a href="<?=base_url('employees-payout');?>" class="btn btn-danger btn-sm"> < Back</a>
                                                <div class="row">
                                                    <div class="col-4">
                                                    <label for="">Select Start Date</label>
                                                   <input type="date" id="start_date" class="form-control">
                                                    </div>
                                                    <div class="col-4">
                                                    <label for="">Select End Date</label>
                                                    <input type="date" id="end_date" class="form-control">
                                                    </div>
                                                </div>
                                             
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
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table id="example"  class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Salary No.</th>
                                                                <th>Month</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Print</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="result">
                                                        <?php $i=1;
                                                        foreach($salarydetails as $salarydetail)
                                                        { ?>
                                                            <tr>
                                                                <td><?=$i;?></td>
                                                                <td><?=$salarydetail->salary_no;?></td>
                                                                <td><?=get_month_name($salarydetail->month);?></td>
                                                                <td><?=$salarydetail->date;?></td>
                                                                <td><?=$salarydetail->amount;?></td>
                                                                <td><a target="_blank" href="<?=base_url('employees-salary/'.$salarydetail->salary_no);?>" class="btn btn-danger btn-sm"><i class="fa fa-print"></i></a></td>

                                                            </tr>
                                                        <?php  $i++; } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form class="form ajaxsubmit reload-page validate-form reload-tb" action="<?=base_url('employees-details-save/save')?>" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pay Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="hidden" name="emp_id" value="<?=$employees->id;?>">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Bank Name</label>
                        <input type="text" class="form-control" name="bank" id="recipient-name" readonly value="<?=@$emp_docs->bank_name;?>"> 
                    </div>
                </div>   
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">IFSC Code</label>
                        <input class="form-control" name="ifsc" id="message-text" readonly value="<?=@$emp_docs->ifsc_code;?>">
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Account Number</label>
                        <input type="text" class="form-control" name="account" id="recipient-name" readonly value="<?=@$emp_docs->account_number;?>">
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Month</label>
                        <select name="month" id="month"  class="form-control" required>
                            <option value="">Select a Month</option>
                            <option value="01">January</option>
                            <option value="02" <?php if(date('m')==2){ echo "selected";} ;?> >February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">Octomber</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>   
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Date</label>
                        <input type="date" class="form-control" id="message-text" required name="date" id="date">
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Rupees</label>
                        <input type="number" name="amount" id="amount" class="form-control" required >
                    </div>
                </div>  
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" >Pay</button>
        </div>
    </form>
    </div>
  </div>
</div>


<script>
        $(document).ready(function() {
            $('#start_date, #end_date').change(function() {
                fetchData();
            });

            function fetchData() {
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();

                $.ajax({
                    type: 'POST',
                    url: '<?=base_url();?>Accounting/fetch_data_ajax', // Adjust the URL based on your controller's route
                    data: { start_date: start_date, end_date: end_date },
                    dataType: 'json',
                    success: function(data) {
                        displayData(data);
                    }
                });
            }

            function displayData(data) {
                var resultTable = $('#result');
                resultTable.empty(); // Clear previous results

                if (data.length > 0) {
                $.each(data, function(index, item) {
                    resultTable.append('<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + item.salary_no + '</td>' +
                        '<td>' + getMonthName(item.month) + '</td>' +
                        '<td>' + item.date + '</td>' +
                        '<td>' + item.amount + '</td>' +
                        '<td><a target="_blank" href="<?=base_url('employees-salary/');?>' + item.salary_no + '" class="btn btn-danger btn-sm"><i class="fa fa-print"></i></a> </td>' +
                        '</tr>');
                });
            } else {
                resultTable.append('<tr><td colspan="5">No data available.</td></tr>');
            }
            }
        });
        
        function getMonthName(monthNumber) {
    const monthNames = {
        '01': 'January', '02': 'February', '03': 'March', '04': 'April',
        '05': 'May', '06': 'June', '07': 'July', '08': 'August',
        '09': 'September', '10': 'October', '11': 'November', '12': 'December'
    };

    return monthNames[monthNumber] || 'Invalid month number';
}

    </script>
