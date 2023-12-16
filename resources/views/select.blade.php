@include('layouts.sidebar')
<div class="row">
    <!--    <div class="card">-->
    <div class="card-body">
        <div class="module-head">
            <center><h3>
                    Select Network</h3></center>
        </div>
        <center>
            <div class="btn-controls">
                <form id="dataForm">
                    @csrf
                    <label for="network" class=" requiredField">
                        Network<span class="asteriskField">*</span>
                    </label>
                    <select  name="id" id="firstSelect" class="text-success form-control" required="">
                        <option>Select Network Provider</option>
                        @if ($serve->name == 'mcd')
                            <option value="mtn-sme">MTN-SME</option>
                            <option value="mtn-data">MTN-DG</option>
                            <option value="glo-data">GLO</option>
                            <option value="etisalat-data">9MOBILE</option>
                        @else
                            <option value="MTN">MTN</option>
                            <option value="GLO">GLO</option>
                            <option value="9MOBILE">9MOBILE</option>
                        @endif
                        @if ($serve->name == 'mcd')
                            <option value="airtel-data">AIRTEL</option>
                        @else
                            <option value="AIRTEL_DG">AIRTEL_DG</option>
                            <option value="AIRTEL_CG">AIRTEL_CG</option>
                        @endif
                    </select>

                    <div id="div_id_network" class="form-group">
                        <label for="network" class=" requiredField">
                            Select Your Plan<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <select name="productid" id="secondSelect" class="text-success form-control" required>

                                <option>Select Your Plan</option>
                            </select>
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

                    <br>
                    <button type="submit" class=" btn" style="color: white;background-color: #28a745">Click Next</button>
                </form>
        </center>
        <br>

        <script>
            $(document).ready(function() {
                $('#firstSelect').change(function() {
                    var selectedValue = $(this).val();
                    // Show the loading spinner
                    $('#loadingSpinner').show();
                    // Send the selected value to the '/getOptions' route
                    $.ajax({
                        url: '{{ url('redata') }}/' + selectedValue,
                        type: 'GET',
                        success: function(response) {
                            // Handle the successful response
                            var secondSelect = $('#secondSelect');
                            $('#loadingSpinner').hide();
                            // Clear the existing options
                            secondSelect.empty();

                            // Append the received options to the second select box
                            $.each(response, function(index, option) {
                                secondSelect.append('<option  value="' + option.id + '">' + option.plan +  ' --₦' + option.tamount + '</option>');
                            });

                            // Select the desired value dynamically
                            var desiredValue = 'value2'; // Set the desired value here
                            secondSelect.val(desiredValue);
                        },
                        error: function(xhr) {
                            // Handle any errors
                            console.log(xhr.responseText);
                        }
                    });
                });
            });

        </script>
        <script>
            $(document).ready(function() {
                $('#dataForm').submit(function(e) {
                    e.preventDefault(); // Prevent the form from submitting traditionally
                    // Get the form data
                    var formData = $(this).serialize();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you want to buy ' + document.getElementById("secondSelect").options[document.getElementById("secondSelect").selectedIndex].text + ' on ' + document.getElementById("number").value + '?',
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
                                url: "{{ route('bill') }}",
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


                    // Send the AJAX request
                });
            });

        </script>
        <br>
    </div>
</div>

@include('layouts.footer')
<style>
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
        background-color:#25d366;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        font-size:30px;
        box-shadow: 2px 2px 3px #999;
        z-index:100;
    }

    .my-float{
        margin-top:16px;
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="http:wa.me/2348034547657/?text=Goodday, My Username is....." class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>

