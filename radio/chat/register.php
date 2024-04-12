<?php include "../header.php"; ?>

<style>

  .container {
   width: 50%;
padding: 40px;

  }
  label{
  padding: 2px;
  }
  input{
  margin-right: 10px;
  }
@media only screen and (max-width: 600px) {
	.container{
	width: 100%;
	}
}


  </style>
  
  <style>
@media only screen and (max-width: 600px) {

.movimento{
	display: none;
}
.tempo{
	display: none;
}
.radio-app{
	grid-template-columns: 1fr 1fr 1fr;
}
.menu-mobile span{
	padding: 5px;

	
}

.right-panel span{
	font-size: x-large;
	padding: 2px;
	
}

.radio-app .TocandoMusica{
	display: none;
}
.radio-app .TocandoArtista{
	display: none;
}

.right-panel-2 {
	font-size: small;
	
}

.radio-app2 {
	font-size: x-large;
	grid-template-columns: 1fr;
	

}
.nav>li {
	display: -webkit-inline-box;
	padding-bottom: 10px;
	padding-top: 10px;
}

	#menu-mob{
	display: grid;
	grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
	width: 100%;

	}
.nav>li a {
	display: contents;
	font-size: small;
}

#menu-mob a{
	font-size: small;

}
#menu-mob li{

	padding-top: 5px;

}
.usuario{
	float: left;
	padding-left: 10px;
}

#menu-mob span{
	font-size: xx-large;

}

 </style>
	

<div class="container">
	
 
  <form class="form-horizontal" method="post" action="add_user.php">
   <center><h2>Cadastro</h2></center><hr/>
    <div class="form-group">
      <label class="control-label" for="name"><span class="glyphicon glyphicon-user"></span> Nick:</label>
      <div>
        <input type="text" minlength="4" maxlength="14" class="form-control" id="name" placeholder="Nome/Nick" name="name" required>
      </div>
    </div>
<!--	<div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="email">Email:</label>
	  
      <div class="col-sm-5">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      </div>
    </div> -->
    <div class="form-group">
      <label class="control-label" for="pwd"><span class="glyphicon glyphicon-asterisk"></span> Senha:</label>
      <div>          
        <input type="password" minlength="6" maxlength="16" class="form-control" id="pwd" placeholder="Senha" name="password" required>
      </div>
    </div>
	<!--	 <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="number">Number:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="number" placeholder="Enter number" name="number" required>
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="name">Address:</label>
	  
      <div class="col-sm-5">
        <textarea class="form-control" id="address" placeholder="Enter Address" name="address" required></textarea>
      </div>
    </div>-->
    
    <div class="form-group">        
        <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon glyphicon-pencil"></span> Cadastrar</button>

  </form>
  	<br/> <i>Acessando você poderá usar o chat e o sistemas de ranking. Ganhe pontos a cada minuto!</i>
</div>

</div>
</body>
</html>
