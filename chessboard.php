<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chessboard</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="theme.css">
	<script src="jquery.js"></script>
	<script src="bootstrap.min.js"></script>


</head>
<body>
	<div class="container-fluid">
	<table class="table table-bordered">
		<?php
		//$tamCromossomo = 10;
		//$tamPop = 1000;
		//$probMutacao = 0.01;
		//$probCrossover = 70;
		//$qtMaxGeracoes = 3000;
		$s = null;
		if(isset($_GET["tamPop"])){
			$tamCromossomo = $_GET["tamCromossomo"];
			$tamPop = $_GET["tamPop"];
			$probMutacao = $_GET["probMutacao"];
			$probCrossover = $_GET["probCrossover"];
			$qtMaxGeracoes = $_GET["qtMaxGeracoes"];
			$s = shell_exec("./a.out $tamCromossomo $tamPop $probMutacao $probCrossover $qtMaxGeracoes");
		}
		else{
			$tamCromossomo = $_GET["tamCromossomo"];
			$inicialTemp = $_GET["inicialTemp"];
			$resfriamento = $_GET["resfriamento"];
			$s = shell_exec("./a.out $tamCromossomo $inicialTemp $resfriamento");
		}
		$a = explode(" - ",$s)[0];
		$a = explode(" ",$a);
		$colisoes = explode(" - ",$s)[1];
		$colisoes = explode(" ",$colisoes);
		// if(count($colisoes) != count($a))
		// 	for ($i=0; $i < count($a); $i++) { 
		// 		$colisoes[] = null;
		// 	}
		//print_r($colisoes);//count($a)." ".count($colisoes);
		$flag = 1;
		for ($i=0; $i <count($a); $i++) {
			echo "<tr>";
			for ($j=0; $j <count($a); $j++) {
				if($a[$j] == $i)
					if($colisoes[$j] == $j && $colisoes[$j] != "x"){
						echo "<td style='text-align:center; background-Color:red'><img src='queen2.png' alt='queen' width='60px' height='60px'/></td>";
					}
					else
						echo "<td style='text-align:center;'><img src='queen2.png' alt='queen' width='60px' height='60px'/></td>";
				else
					echo "<td width='60px' height='60px'></td>";

			}
			echo "</tr>";
		}
		?>
	</table>
	</div>
</body>
</html>

