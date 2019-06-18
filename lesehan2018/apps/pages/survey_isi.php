<?Php
session_start();

// if (isset($_SESSION['id_customer'])) {

// 	header('Location:https://joker.5dapps.com/pertamina/lesehan2018/apps/index.php?menu=survey');
// }
$_SESSION['id_customer'] = $_GET['id_customer'];

// echo $_SESSION['id_customer'];

?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Survey online script plus2net demo scripts using JQuery</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
</head>
<body style="background-color:">
<script>
   $(document).ready(function() {

$("input:radio[name=options]").click(function() {
$('#maindiv').hide('slide', {direction: 'left'}, 100);
$.post( "pages/process/surveyck.php", {"opt":$(this).val(),"qst_id":$("#qst_id").val()},function(return_data,status){

if(return_data.next=='T'){
$('#q1').html(return_data.data.q1);
$('label[for=opt1]').html(return_data.data.opt1);
$('label[for=opt2]').html(return_data.data.opt2);
$('label[for=opt3]').html(return_data.data.opt3);
$('label[for=opt4]').html(return_data.data.opt4);
$('label[for=opt5]').html(return_data.data.opt5);
$("#qst_id").val(return_data.data.qst_id);
}
else{
	// $('#maindiv').html("Thanks for your views");
	// $('#maindiv').html('<center><i class="fa fa-check-circle" style="font-size: 20vw; color:#00b140; margin-top: 20vh;"></i><h3>Terimakasih, Atas jawaban anda! </h3></center>');

		$('#maindiv').html('<center><h3>Testimoni</h3><hr><br><div class="form-group"><textarea id = "testimoni" rows="10" cols = "100" style = "color : black; "></textarea><br><br><button id="success_lanjutkan" class = "btn-success">Lanjutkan</button></center>');

	$('#success_lanjutkan').click(function(){
		$.ajax({url: "pages/process/testimoni_survey.php", data:{testimoni:$('#testimoni').val(),id_customer : <?php echo "$_GET[id_customer]"; ?>}, success: function(result){
            console.log(result)
					location.href = 'https://joker.5dapps.com/pertamina/lesehan2018/apps/index.php?menu=survey';
	        }});
	});



	// setTimeout(function(){

	// location.href = 'https://joker.5dapps.com/pertamina/lesehan2018/apps/index.php?menu=survey';
	// },3000);
}

},"json"); 
$("#f1")[0].reset();
 $('#maindiv').show('slide', {direction: 'right'}, 1000);

     });


   });
</script>
<br><br><br><br><br>
<?Php
require "config.php";
$count=$dbo->prepare("select * from poll_qst where qst_id=1");
// $count=$dbo->prepare("SELECT  *  FROM `poll_qst` ORDER BY rand()");
if($count->execute()){
$row = $count->fetch(PDO::FETCH_OBJ);
}
echo "
<center>
<div id='maindiv' class='maindiv '>
<form id='f1'>


<h3 id='q1'>$row->qst</h3>

<input type=hidden id=qst_id value=$row->qst_id>

<div class='segmented-control__option'>
      <input class='segmented-control__input visually-hidden' type='radio' name='options' id='opt1' value='option1' > 
      <label class='segmented-control__label' for='opt1' class='lb'>$row->opt1</label>
 </div>     

<div class='segmented-control__option'>
      <input class='segmented-control__input visually-hidden' type='radio' name='options' id='opt2' value='option2' > 
       <label class='segmented-control__label' for='opt2' class='lb'>$row->opt2</label>
  </div>

<div class='segmented-control__option'>
      <input class='segmented-control__input visually-hidden' type='radio' name='options' id='opt3' value='option3' > 
       <label class='segmented-control__label' for='opt3' class='lb'>$row->opt3</label>
</div>

<div class='segmented-control__option'>
      <input class='segmented-control__input visually-hidden' type='radio' name='options' id='opt4' value='option4' >
        <label class='segmented-control__label' for='opt4' class='lb'>$row->opt4</label>
 </div>

<div class='segmented-control__option'>
      <input class='segmented-control__input visually-hidden' type='radio' name='options' id='opt5' value='option5' >
        <label class='segmented-control__label' for='opt5' class='lb'>$row->opt5</label>
 </div>



</form>
</div>
<center>


";
?>


</body>


<style type="text/css">
.soalnya{
	    width: 80vw;
    background: #008d33;
    font-size: 5vw;
    text-align: left;
    padding: 15px;
}
ol, ul {
	list-style: none;
	padding:0;
}

h2 {
	margin: 25px 10px;
	font-size: 28px;
	color: white;
}

.segmented-control {

	width: 100%;
	margin: 2em 0;
	padding: 0;
	background-color: green;
}

.segmented-control__option {
	display: inline-block;
	margin: 0;
	padding: 0;
	list-style-type: none;
}

.segmented-control__input {
	position: absolute;

}

.segmented-control__label {
	font-size: 25px;
	display: block;
	margin: 0 -4px -1px 0; /* -1px margin removes double-thickness borders between items */
	padding: 1em .25em;
	border: 5px solid #444;
	font: 14px/1.5 sans-serif; 
	text-align: center;  
	width:80vw;
	cursor: pointer;
	background:green;
}

.segmented-control__label:hover {
	background: #008d33;
	color: #fff;
	font-weight:bold;
}

.segmented-control__input:checked + .segmented-control__label {
	background: #008d33;
	color: #fff;
}

.segmented-control__input:focus + .segmented-control__label {
	background: #008d33;
	color: #fff;
	font-weight:bold;
}
.visually-hidden { /*https://developer.yahoo.com/blogs/ydn/clip-hidden-content-better-accessibility-53456.html*/
	position: absolute !important;
	clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
	clip: rect(1px, 1px, 1px, 1px);
	padding:0 !important;
	border:0 !important;
	height: 1px !important;
	width: 1px !important;
	overflow: hidden;
}
</style>
</html>
