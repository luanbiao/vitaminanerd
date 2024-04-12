<?php
	session_start();
	$nome = ($_SESSION['name']);
	
	?>
	<style>
	#mod {
	display: none;
	}
	
	#ctgr {
	display: none;
	}
<html>
    <head>
        <title>Update Data</title>
        <script src="./js/jquery.min.js"></script>
    </head>
    <body>
	
        <center>
        <h3>UPDATE DATA</h3>
        <?php
        $conn = new mysqli('localhost', 'root', 'G4tosN3rds2505', 'radio');
        $sql = "SELECT * FROM register";
        $result = $conn->query($sql);
		?>
		<table>
		<tr>
<!--<td>ID</td>-->
<td>Nome</td>
<td>Pontos</td>
</tr>

	<?php
	 $randomico = rand(1,1000);
        while ( $row=mysqli_fetch_assoc($result)) {  
		if ($row['name'] == $nome){
		$pontos = $row['pontos'];
	
	//	echo "<tr><td>".$row['id']."</td>";
		echo "<td id='mod'>".$row['name']."</td>";
		echo "<td id='ctgr'>".$row['pontos']."</td></tr>";
			}
        //  echo  'Nome :<input type="text" id="mod" value="'.$row['name'].'">';         
        // echo  'Pontos :<input type="text" id="ctgr" value="'.$row['pontos'].'"><br/>';
        }?> 
		</table>
		<?php
	// echo  'Nome :<input type="text" id="mod" value="'.$nome.'">';     
		// echo  'Pontos :<input type="text" id="ctgr" value="'.$pontos.'"><br/>'; 
		?>
        <!--<button type="submit" id="update">UPDATE</button>-->
        </center>
        <script>
		
            $(document).ready(function(){
				setInterval(function() {
				var name=$("#mod").text();
                    var ctgr=$("#ctgr").text();
					var ctgr2=$("#ctgr").text();
			
					var resol=parseInt(ctgr2)+10;
					$("#ctgr").text(resol);//$("#ctgr").val() = 10;
                    $.ajax({
                        url:'update.php',
                        method:'POST',
                        data:{
                            name:name,
                            ctgr:ctgr
                        },
                        success:function(response){
		
                           // console.log(response);
							
                        }
                    });
}, 1000 * 60 * 3);	
                /*$("#update").click(function(){
                    var name=$("#mod").val();
                    var ctgr=$("#ctgr").val();
                    $.ajax({
                        url:'update.php',
                        method:'POST',
                        data:{
                            name:name,
                            ctgr:ctgr
                        },
                        success:function(response){
                            alert(response);
                        }
                    });
                });*/
            });
        </script>
    </body>
</html>