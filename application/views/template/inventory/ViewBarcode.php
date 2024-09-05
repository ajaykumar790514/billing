
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Category Master</h5>
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
                                            <li class="breadcrumb-item"><a href="#!">Category Master</a>
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
    <h1>Barcode Scanner</h1>
    <div id="interactive" class="viewport"></div>
                                </div>
                            </div>
                        </div>
</div>
<!-- Include QuaggaJS library from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>

    <script>
        // Configure QuaggaJS
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#interactive'),
            },
            decoder: {
                readers: ['code_128_reader'],
            },
        });

        // Start QuaggaJS
        Quagga.start();

        // Attach an event listener to handle the scanned barcode
        Quagga.onDetected(function (result) {
            // Send the scanned barcode to the server
            fetch('<?= base_url('barcode/scanBarcode') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ barcode: result.codeResult.code }),
            })
            .then(response => response.json())
            .then(data => {
                // Handle the server's response (data)
                console.log(data);
            });
        });
    </script>
