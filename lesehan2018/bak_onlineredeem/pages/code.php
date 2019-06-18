<?php   include ('../index.php') ?>
 <div class="container">
<div class="row">
 
    <div class="col-lg-2 col-md-2 col-sm-0"> </div>
    <div  class="col-lg-8 col-md-8 col-sm-12 content">
      <center>  
        <div class="img-responsive" >
          <img class="berkahenduro" src="../assets/berkahenduro.png" style="width: 80%; margin-top: 20px;">
        </div>
        <form class="form-inline">
        <input class="form-control code" type="tel" name="code" placeholder="code" style="width: 80%; text-align: center;  border:3px solid green; border-right: 1px; border-bottom-right-radius: 0px; margin-left: 50px; border-top-right-radius: 0px">
        <input class="form-control btn-success sub" type="submit" name="submitcode" value=">" style="width: 5%; border:3px solid green; border-top-left-radius: 0px; border-bottom-left-radius: 0px;text-align:left; font-weight: bolder;">
        </form>
       </center>
    </div>
    <div class="col-md-2 col-lg-2 col-sm-0"> </div>
    
  </div>
  <div class="row">
      <div class="col-5"><img class="ketupat" src="../assets/ketupat.png" > <img class="lesehan" src=" ../assets/lesehan.png" ></div>
      <div class="col-2 mesjid"></div>
      <div class="col-5">
        <div class="col-12"> 
         <div>
          <img class  src="../assets/endurocolor.png" style="width: 60%;margin-top: 13%; float: right;">
        </div>        
        </div>
      </div> 
</div>
<br>	
<div class="row">
	<div class="col-12">	
		<div style="width: 100%;height: 100px; background-color:white; text-align: center"><h1>	sponsor</h1></div>
	</div>
</div>
</div>


<style>
.ketupat
{
  width: 47%;
}
.lesehan
{
  width: 45%;
  margin-top: 4%;
}
.content
{
}


@media all and (min-width:321px) and (max-width: 480px) {
  .code
  {
  	width: 90% !important;
  	border-right: 1px !important;
  	margin-left: 0px !important;

  }
  .berkahenduro
  	{
  		width: 90% !important;
  	}

  .sub
  {
  	width: 10% !important;
  }	
  }

</style>