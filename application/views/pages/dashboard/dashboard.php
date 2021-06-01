<div class="container">
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                    $('#warning').attr('style', 'display:block')
                    $('#result').attr('style', 'display:none')
                    // console.log(reader.result)

                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function callAPi() {
            $('#warning').attr('style', 'display:none')
            $('#result').attr('style', 'display:block')
            $('#spinner').attr('style', 'display:block')

        }
    </script>


    <form method="POST" action="uploadData" enctype="multipart/form-data">

        <div class="p-3 mt-3 shadow mb-5 bg-white rounded d-flex">
            <input type='file' id="uploadimage" onchange="readURL(this);" />
            <img id="blah" width="250" height="250" src="http://placehold.it/250" alt="your image" />
        </div>

        <div class="card text-left shadow" id="warning" style="display: none;">
            <div class="card-header">
                Disclaimer
            </div>
            <div class="card-body">
                <h5 class="card-title">Please know that...</h5>
                <ul>
                    <li>
                        <p class="card-text">We'll resize the image as per model's convenience.</p>
                    </li>
                    <li>
                        <p class="card-text">The model could be accurate about 80%</p>
                    </li>
                    <li>
                        <p class="card-text">We'll reuse the image later for making model more perfect</p>
                    </li>
                </ul>
                <input type="button" id="submit" class="btn btn-primary" value="I understand, continue" />
            </div>
            <div class="card-footer text-muted">
                <?php $this->load->helper('smiley');
                ?>
                Made with love in Sanjivani college of Engineering... :-)
            </div>
        </div>
    </form>

    <div class="card text-left shadow" id="result" style="display: none;">
        <div class="card-header bg-success text-white">
            Analysis
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status" id="spinner">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="" role="status" id="responseOfIP">
                    <!-- <span class="sr-only">Loading...</span> -->
                </div>
            </div>
            <div id="causePg">
                <h5>Caused by : </h5></br>
            </div>
            <div id="curePg">
            </div>
        </div>
        <div class="card-footer text-muted">

            Note : You can check results later in history menu
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#submit').click(function() {

            callAPi();
            // CSRF Hash
            var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname').val(); // CSRF hash
            $('#causePg').html('Please wait...');
            $('#curePg').html('Please wait...');
            // Get the selected file
            var files = $('#uploadimage')[0].files;
            console.log($('#uploadimage')[0].files)


            if (files.length > 0) {
                var fd = new FormData();
                fd.append('uploadimage', files[0]);
                $.ajax({
                    url: "<?= site_url('uploadData') ?>",
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response,'full path is here')
                        var filePath = response['full_path']
                        //http://127.0.0.1:5000/?imgSrc=
                        $.ajax({
                            url: "http://127.0.0.1:5000/?imgSrc=" + filePath,
                            method: 'get',
                            contentType: false,
                            processData: false,
                            dataType: 'html',
                            success: function(response2) {
                                console.log(response2)
                                $('#responseOfIP').attr('style', 'display:block')
                                $('#responseOfIP').html(response2.replace('Corn_(maize)___', ''));
                                var sCode = response2.replace('Corn_(maize)___', '');
                                if (sCode != 'healthy') {
                                    $('#responseOfIP').removeClass('alert alert-success')
                                    $('#responseOfIP').addClass('alert alert-warning')
                                } else {
                                    $('#responseOfIP').removeClass('alert alert-warning')
                                    $('#responseOfIP').addClass('alert alert-success')
                                }
                                console.log(sCode)
                                $.ajax({
                                    url: "http://localhost/dd-portal/getAnalysis?code=" + sCode+"&imgSrc="+response['file_name'],
                                    method: 'get',
                                    contentType: false,
                                    processData: false,
                                    success: function(response3) {
                                        console.log(JSON.parse(response3))
                                        var analysisResponse = JSON.parse(response3)
                                        $('#causePg').html(analysisResponse['cause']);
                                        $('#curePg').html(analysisResponse['cure']);
                                        $('#spinner').attr('style', 'display:none')

                                    },
                                    error: function(response) {
                                        console.log("error : " + JSON.stringify(response));
                                    }
                                });
                            },
                            error: function(response) {
                                console.log("error : " + JSON.stringify(response));
                            }
                        });

                    },
                    error: function(response) {
                        console.log("error : " + JSON.stringify(response));
                    }
                });

            }
        });
    });
</script>