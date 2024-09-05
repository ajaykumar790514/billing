<script>
   
$('#showModal-xl').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var recipient = button.data('whatever') 
    var data_url  = button.data('url') 
    var modal = $(this)
    $('#showModal-xl .modal-title').text(recipient)
    $('#showModal-xl .modal-body').load(data_url);
})

$('#showModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var recipient = button.data('whatever') 
    var data_url  = button.data('url') 
    var modal = $(this)
    $('#showModal .modal-title').text(recipient)
    $('#showModal .modal-body').load(data_url);
})

$(document).on('click','[data-dismiss="modal"]', function(event) {
    $('#showModal .modal-body').html('');
    $('#showModal .modal-body').text('');
})

</script>
    <!-- Required Jquery -->
    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery/jquery.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="<?php echo base_url();?>assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/SmoothScroll.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="<?php echo base_url();?>assets/pages/widget/amchart/gauge.js"></script>
    <script src="<?php echo base_url();?>assets/pages/widget/amchart/serial.js"></script>
    <script src="<?php echo base_url();?>assets/pages/widget/amchart/light.js"></script>
    <script src="<?php echo base_url();?>assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="<?php echo base_url();?>assets/js/pcoded.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js "></script>

    <!-- For Validate-->
        <script src="<?php echo base_url();?>assets/validate/jquery.validate.js"></script>
      <script src="<?php echo base_url();?>assets/validate/sweetalert.min.js"></script>
      <script src="<?php echo base_url();?>assets/validate/sweetalert2.all.js"></script>
      <script src="<?php echo base_url();?>assets/validate/sweet-alerts.js"></script>
      <script src="<?php echo base_url();?>assets/validate/toastr.js"></script>
      <script src="<?php echo base_url();?>assets/validate/switchery.js"></script>
      <script src="<?php echo base_url();?>assets/validate/select2.min.js"></script>
      <script src="<?php echo base_url();?>assets/validate/select2.js"></script>
      <script src="<?php echo base_url();?>assets/validate/select2.full.min.js"></script>
      <script src="<?php echo base_url();?>assets/validate/select2.full.js"></script>
      <script src="<?php echo base_url();?>assets/validate/form-select2.js"></script>
      <script src="<?php echo base_url();?>assets/validate/switchery.min.js"></script>
      <script src="<?php echo base_url();?>assets/validate/toastr.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <!-- Add this to the head section of your HTML -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- <script src="https://parsleyjs.org/dist/parsley.min.js"></script> -->
<script src="https://parsleyjs.org/dist/parsley.min.js"></script>

      <script>
        
        $(document).ready(function () {
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	// document.title = "Card View DataTable";
	// DataTable initialisation
	$("#example").DataTable({
		dom: '<"dt-buttons"Bf><"clear">lirtp',
		paging: true,
		autoWidth: true,
		buttons: [
			"colvis",
			"copyHtml5",
			"csvHtml5",
			"excelHtml5",
			"pdfHtml5",
			"print"
		],
		initComplete: function (settings, json) {
			$(".dt-buttons .btn-group").append(
				'<a id="cv" class="btn btn-primary" href="#">CARD VIEW</a>'
			);
			$("#cv").on("click", function () {
				if ($("#example").hasClass("card")) {
					$(".colHeader").remove();
				} else {
					var labels = [];
					$("#example thead th").each(function () {
						labels.push($(this).text());
					});
					$("#example tbody tr").each(function () {
						$(this)
							.find("td")
							.each(function (column) {
								$("<span class='colHeader'>" + labels[column] + ":</span>").prependTo(
									$(this)
								);
							});
					});
				}
				$("#example").toggleClass("card");
			});
		}
	});
});

$(document).on('change','.onchange-submit', function(event) {
    $(this).parents('form').submit();
})

$(document).on('click','[data-toggle="change-status"]', function(event) {
            var t = $(this).parent();
            var data =  $(this).attr('data');
            var value =  $(this).attr('value');
            Swal.fire({
                  toast:true,
                  type: 'warning',
                  title: 'You want to change status ?',
                  timer:3000,
                  showConfirmButton: true,
                  showCancelButton: true,
                  confirmButtonText: Yes,
                  cancelButtonText: No,
                }).then((result) => {
                    if(result.value==true){

                         $.post('<?=base_url()?>change_status/',{data:data,value:value})
                         .done(function(data){
                                console.log(data);   
                                t.html(data);
                            })
                        .fail(function() {
                            alert_toastr("error","error");
                          })
                    }
                }).catch(swal.noop);
            return false;
            
        })
</script>
<script>
$(document).on("submit", '.ajaxsubmit', function(event) {
    event.preventDefault(); 
    $this = $(this);
    if ($this.hasClass("append")) {
        var append_data = $($this.attr('append-data')).val();
        $(this).append('<input type="hidden" name="append" value="'+append_data+'" /> ');

    }
    var form_data = new FormData(this);
    form_valid = true;

    if ($this.hasClass("validate-form")) {
        if ($this.valid()) {
            form_valid = true;
        }
        else{
            form_valid = true;
        }
    }

    setTimeout(function() {
        if (form_valid == true) {
            $.ajax({
                url: $this.attr("action"),
                type: $this.attr("method"),
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    data = JSON.parse(data);
                    if (data.res=='success') {
                        $('.empdoc').hide();
                        if ($this.hasClass("reload-page")) {
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);
                        }
                        if ($this.hasClass('close-win')) {
                            setTimeout(function() {
                                window.close();
                            }, 500);
                        }
                    }
                    if (data.errors) {
                        $.each(data.errors,function(key,value){
                            $this.find(`[name="${key}"]`).parents(`.form-group`).find(`.error`).text(value);
                        })
                    }
                    $('.empdoc').hide();
                    // Replace alert_toastr with Swal.fire
                    Swal.fire({
                        icon: data.res == 'success' ? 'success' : 'error',
                        title: data.msg,
                        showConfirmButton: false,
                        timer: 1500 // Adjust the timer as needed
                    });
                }
            });
        }
    }, 100);

    return false;
});

</script>
</body>

</html>
