@include('layouts.sidebar')

<div style="padding:90px 15px 20px 15px">
    <!--    <h4 class="align-content-center text-center">Data Subscription</h4>-->





    <!--            <div class="box w3-card-4">-->

    <form id="dataForm" >
        @csrf
        <div class="row">
            <div class="col-sm-8">
                <br>
                <br>
                <div id="AirtimeNote" class="alert alert-danger" style="text-transform: uppercase;font-weight: bold;font-size: 23px;display: none;"></div>
                <div id="AirtimePanel">

                    <div id="div_id_network" class="form-group">
                        <label for="network" class=" requiredField">
                            Network<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <select name="name" class="text-success form-control" required="">

                                <option value="m">MTN</option>
                                <option value="g">GLO</option>
                                <option value="a">AIRTEL</option>
                                <option value="9">9MOBILE</option>

                            </select>
                        </div>
                    </div>
                    <div id="div_id_network" class="form-group">
                        <label for="network" class=" requiredField">
                            Enter Amount<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <input type="number" name="amount" id="amount" min="100" max="4000" class="text-success form-control" required>
                        </div>
                    </div>
                    <div id="div_id_network" class="form-group">
                        <label for="network" class=" requiredField">
                            Enter Phone Number<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <input type="number" id="number" name="number" minlength="11" class="text-success form-control" required>
                        </div>
                    </div>
                    <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                    <button type="submit" class=" btn" style="color: white;background-color: #28a745" id="btnsubmit"> Purchase Now</button>
                </div>
            </div>
            <div class="col-sm-4 ">
                <br>

                <p>You can use the codes below to check your Airtime Balance!  </p>

                <h6>
                    <ul>
                        <li> MTN *556#</li>
                        <li>MTN [CG] *131*4# or *460*260#</li>
                        <li>9mobile  *223#</li>
                        <li>Airtel *123#</li>
                        <li>Glo *124*0#</li>
                    </ul>
                </h6>
                <br>


                <br>




            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    </form>


</div>
<script>
    $(document).ready(function() {


        // Send the AJAX request
        $('#dataForm').submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting traditionally

            // Get the form data
            var formData = $(this).serialize();
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to buy airtime of ₦' + document.getElementById("amount").value + ' on ' + document.getElementById("number").value +' ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // The user clicked "Yes", proceed with the action
                    // Add your jQuery code here
                    // For example, perform an AJAX request or update the page content
                    $('#loadingSpinner').show();

                    $.ajax({
                        url: "{{ route('buyairtime') }}",
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            // Handle the success response here
                            $('#loadingSpinner').hide();

                            console.log(response);
                            // Update the page or perform any other actions based on the response

                            if (response.status == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message
                                }).then(() => {
                                    location.reload(); // Reload the page
                                });
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Pending',
                                    text: response.message
                                });
                                // Handle any other response status
                            }

                        },
                        error: function(xhr) {
                            $('#loadingSpinner').hide();
                            Swal.fire({
                                icon: 'error',
                                title: 'fail',
                                text: xhr.responseText
                            });
                            // Handle any errors
                            console.log(xhr.responseText);

                        }
                    });

                }
            });
        });
    });

</script>


@include('layouts.footer')
