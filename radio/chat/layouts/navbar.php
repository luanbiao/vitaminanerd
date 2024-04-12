<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./chat/bootstrap/css/bootstrap.min.css">
    <script src="./chat/bootstrap/js/jquery.min.js"></script>
    <script src="./chat/bootstrap/js/bootstrap.min.js"></script>
	
<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
  </div>

  <a class="navbar-brand" href="./"><img src="img/radio_logo.png" width="150px" height="auto" alt="Rádio VN"></a>

  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-left">
	<div class="player">
 <div id="player-container">
 <div id="play-pause" class="volume-icon">Play</div>
 </div>
 
 </div>
	  <div class="volume-div">
	       <input type="range" id="radioVolume" min="0" max="1" step="0.01" value="0.5" onchange="changevolume(this.value)">
		   </div>
</div>
    </ul>

     <ul class="nav navbar-nav navbar-right">
        <li><a href="./chat/register.php"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>

        <li><a href="./chat/login.php"><span class="glyphicon glyphicon-log-in"></span> Acesse</a></li>

    </ul>
  </div>
</nav>
<style>
.navbar-brand
{
    position: absolute;
    width: 100%;
    left: 0;
    text-align: center;
    margin:0 auto;
}
.navbar-toggle {
    z-index:3;
}
</style>