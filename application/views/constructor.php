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
</head>
<body>
    <div class="container">
        <br/>
        <a href="<?php echo base_url(); ?>" class="back-btn"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
        <h1>10. Constructor</h1>
        <div class="pl-5">
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-lg-3 col-sm-12 text-right">Sample Input Numbers:</label>
                    <div class="col-lg-3 col-sm-12">
                        <span><?php echo $original_array; ?></span>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-lg-3 col-sm-12 text-right pt-5">Actions:</label>
                    <div class="col-lg-3 col-sm-12">
                        <select class="form-control" id="choose_action" name="choose_action" onchange="chooseAction()">
                            <option value="">--Choose one--</option>
                            <option value="sorted_array">Sorted Array</option>
                            <option value="median">Median</option>
                            <option value="largest">Largest</option>
                        </select>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="form-group result">
                    <label class="control-label col-lg-3 col-sm-12 text-right">Output:</label>
                    <div class="col-lg-3 col-sm-12">
                        <p id="result"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";

        function chooseAction() {
            var choose_action = document.getElementById("choose_action").value;
            document.getElementById('result').innerHTML = choose_action;

            postAction(choose_action);
        }

        async function postAction(input) {
            try {
                const eResponse = await fetch(base_url + '/constructor/getAction?action=' + input); 
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