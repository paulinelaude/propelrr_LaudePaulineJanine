<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propelrr Exam - Fabonacci</title>

    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?php echo base_url(); ?>assets/css/stylesheet.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br/>
        <a href="<?php echo base_url(); ?>" class="back-btn"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>

        <h1>9. Fabonacci</h1>
    
        <div class="row">
            <div class="form-group">
                <label for="fabo" class="col-lg-2 col-sm-12 control-label text-right pt-5">Input number</label>
                <div class="col-lg-3 col-sm-12">
                    <input type="text" id="fabo" name="fabo" class="form-control" placeholder="Input number" onkeyup="passInput()" />
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group result">
                <label for="fabo" class="col-lg-2 col-sm-12 control-label text-right pt-5">Output</label>
                <div class="col-lg-3 col-sm-12">
                    <p id="result"></p>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";

        function passInput() {
            var fabo_value = document.getElementById("fabo").value;
            document.getElementById('result').innerHTML = fabo_value;

            postInputFabonacci(fabo_value);
        }

        async function postInputFabonacci(input) {
            try {
                const eResponse = await fetch(base_url + '/fabonacci/getFabonacci?input=' + input); 
                const showData = await eResponse.json();
                
                // Call functions to display offense and defense type data
                showResult(showData, input);
                
            } catch (error) {
                console.error('Error fetching type data:', error);
            }
        }

        function showResult(showData, input) {
            document.getElementById('result').innerHTML = showData;
        }
    </script>
</body>
</html>