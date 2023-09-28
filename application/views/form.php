<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propelrr Exam - LaudePaulineJanine</title>

    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?php echo base_url(); ?>assets/css/stylesheet.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet" media="screen" />
    <script src="<?= base_url();?>assets/js/bootstrap-datepicker.js"></script>
</head>
<body>
    <div id="content">
        <div class="container">
            <br/>
            <a href="<?php echo base_url(); ?>" class="back-btn"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>

            <h1>11. Form</h1>
            <form method="post" action="" id="submit-form">
                <span id="success" class="success"></span>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-sm-4 pt-5">Full Name:</label>
                        <div class="col-lg-5 col-sm-7">
                            <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Input full name" onkeypress="return isNotNumberKey(event)" />
                            <span id="err_name" class="error_class"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-sm-4 pt-5">Email Address:</label>
                        <div class="col-lg-5 col-sm-7">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Input email address" />
                            <span id="err_email" class="error_class"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-sm-4 pt-5">Mobile Number:</label>
                        <div class="col-lg-5 col-sm-7">
                            <input type="text" id="mobile_no" name="mobile_no" class="form-control" placeholder="Input mobile number" maxlength="11" onkeypress="return isNumberKey(event)" />
                            <span id="err_mobile" class="error_class"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-sm-4 pt-5">Date of Birth:</label>
                        <div class="col-lg-5 col-sm-7">
                            <input type="text" id="dob" name="dob" class="form-control" placeholder="Input date of birth" readonly/>
                            <span id="err_dob" class="error_class"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-sm-4 pt-5">Age:</label>
                        <div class="col-lg-5 col-sm-7">
                            <input type="text" id="age" name="age" class="form-control" placeholder="Input name" readonly />
                            <span id="err_age" class="error_class"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-lg-3 col-sm-4 pt-5">Gender:</label>
                        <div class="col-lg-5 col-sm-7">
                            <select class="form-control" id="gender" name="gender">
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="form-group">
                    <label class="control-label col-lg-3 col-sm-4 pt-5"></label>
                        <div class="col-lg-5 col-sm-7 btn-submit">
                            <!-- <input type="submit" id="submit" name="submit" class="btn" value="Submit" /> -->
                            <button id="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        
            <script type="text/javascript">
                
                $(function () {
                    $('#dob').datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true
                    });
                    $('#dob').datepicker().on('changeDate', function (ev) {
                        var $dob = document.getElementById("dob").value;
                        var dob = new Date($dob);
                        var today = new Date();
                        var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                        $('#age').val(age);
                    });
                });

                function calculate() {
                    var start = $('#date_born').datepicker('getDate');
                    var end       = new Date($('#date_Today').datepicker('getDate'));
                    var age_year  = Math.floor((end - start)/31536000000);
                    var age_month = Math.floor(((end - start)% 31536000000)/2628000000);
                    var age_day   = Math.floor((((end - start)% 31536000000) % 2628000000)/86400000);
                    $('#age').val(age_year);
                }

                let loginForm = document.getElementById("submit-form");
                loginForm.addEventListener("submit", (e) => {
                    e.preventDefault();
                    
                    var headers = {
                        'Content-type': 'application/json; charset=UTF-8'
                    }

                    var e = document.getElementById("gender");
                    var value = e.options[e.selectedIndex].value;
                    var text = e.options[e.selectedIndex].text;

                    let postObj = { 
                        full_name: document.getElementById("full_name").value, 
                        email: document.getElementById("email").value,
                        mobile_no: document.getElementById("mobile_no").value,
                        dob: document.getElementById("dob").value,
                        age: document.getElementById("age").value,
                        gender: text,
                    }

                    let post = JSON.stringify(postObj);
                
                    fetch("<?php echo base_url(); ?>form/validate", {
                        method: "POST",
                        headers: {
                            'Content-type': 'application/json; charset=UTF-8',
                        },
                        body:  JSON.stringify({
                            full_name: document.getElementById("full_name").value, 
                            email: document.getElementById("email").value,
                            mobile_no: document.getElementById("mobile_no").value,
                            dob: document.getElementById("dob").value,
                            age: document.getElementById("age").value,
                            gender: text,
                        }),
                    })
                    .then(function(response){ 
                        return response.json(); 
                    })
                    .then(function(data){ 
                        var value = JSON.parse(JSON.stringify(data));
                        
                        document.getElementById("err_name").innerHTML = "";
                        document.getElementById("err_email").innerHTML = "";
                        document.getElementById("err_mobile").innerHTML = "";
                        document.getElementById("err_dob").innerHTML = "";
                        document.getElementById("err_age").innerHTML = "";
                        
                        if(value.name_error != '' && value.name_error != undefined) {
                            let fullname = document.getElementById("err_name");
                            fullname.innerHTML = value.name_error;
                        }
                        if(value.email_error != '' && value.email_error != undefined) {
                            let email = document.getElementById("err_email");
                            email.innerHTML = value.email_error;
                        }
                        if(value.mobile_no_error != '' && value.mobile_no_error != undefined) {
                            let mobile = document.getElementById("err_mobile");
                            mobile.innerHTML = value.mobile_no_error;
                        }
                        if(value.dob_error != '' && value.dob_error != undefined) {
                            let dob = document.getElementById("err_dob");
                            dob.innerHTML = value.dob_error;
                        }
                        if(value.age_error != '' && value.age_error != undefined) {
                            let age = document.getElementById("err_age");
                            age.innerHTML = value.age_error;
                        }
                        
                        if(value.success != '' && value.success != undefined) {
                            let success = document.getElementById("success");
                            success.innerHTML = 'Successfully added!';

                            document.getElementById("submit-form").reset();
                            document.getElementById("err_name").innerHTML = "";
                            document.getElementById("err_email").innerHTML = "";
                            document.getElementById("err_mobile").innerHTML = "";
                            document.getElementById("err_dob").innerHTML = "";
                            document.getElementById("err_age").innerHTML = "";

                            window.scrollTo({ top: 0, behavior: 'smooth' });
                        }
                        
                    });

                });

                function isNumberKey(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;

                    return true;
                }
                function isNotNumberKey(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 47 && charCode < 59)
                        return false;

                    return true;
                }
            </script>
        </div>
    </div>       
</body>
</html>