<?php
include 'class/Imp.class.php';
include 'class/Hero.class.php';
session_start();
$teren = Array('Woda','Trawa','Śnieg','Pustynia','Góra',
              'Lawa','Miasto','Pustkowie','Jaskinia','Bagno');
if(isset($_SESSION['hero'])) {
  /* Jezeli istnieje w sesji nasz bohater to wczytujemy
  ich z sesji */
  $log = $_SESSION['log'];
  $hero = $_SESSION['hero'];
} else {
  /* Jezeli nie ma w sesji naszego bohatera to tworzymy
  nowego bohatera */
  $hero = new Hero();
  $log = Array();
}
if(isset($_SESSION['mapa'])) {
  $mapa = $_SESSION['mapa'];
} else {
  $mapa = Array();
  for ($y=-10; $y <= 10 ; $y++) {
    for ($x=-10; $x <= 10 ; $x++) {
      $mapa[$x][$y] = rand(0,9);
    }
  }
}
// przetwarzanie danych od uzytjownika
if(isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {
    case 'attack':
      // Nacisnieto atakuj
      $hero->attack();
      break;
    case 'defend':
      // Nacisnieto bron sie
      $hero->shield();
      break;
    case 'heal':
      // Nacisnieto lecz sie
      $hero->heal();
      break;
    case 'move':
      $hero->move($_REQUEST['direction']);
      break;
    default:
      // Błędna zawartosc zmiennej action
      break;
  }
}

print_r($hero->getLocation());
$hero->calculateStats();
$item = new Item("Miecz siły", 5);
$item2 = new Item("Siedmiomilowe buty",2,3);
//$hero->backpack->addToBackpack($item);
//$hero->backpack->addToBackpack($item2);
//$imp = new Imp();
//$hero->attack($imp);
//$imp->attack($hero);
//print_r($hero);
//print_r($log);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body" id="myModalBody">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<div class="container">
	<div class="row">
	<div class="col-xs-12">
		<nav class="navbar navbar-inverse" style="background-color: brown;">
			<ul class="nav navbar-nav">
				<li><a href="#" style="color: white; font-size: 15px">Status</a></li>
				<li><a href="#" data-toggle="modal" data-target="#myModal" content="character" s style="color: white; font-size: 15px">Postać</a></li>
				<li><a href="#" data-toggle="modal" data-target="#myModal" content="backpack" s style="color: white; font-size: 15px">Plecak</a></li>
				<li><a href="#" style="color: white; font-size: 15px">Gildie</a></li>
				<li><a href="#" style="color: white; font-size: 15px">Opcje</a></li>
				<li><a href="#" style="color: white; font-size: 15px">Wyśjcie</a></li>
			</ul>
		</nav>
	</div>
	</div> <!-- /row od menu -->

	<div class="row">
	<div class="col-md-12">

	<div class="col-md-3">
		<div>
			<br>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
          <a href="index.php?action=move&direction=north">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
					</button>
          </a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4">
          <a href="index.php?action=move&direction=west">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
					</button>
          </a>
				</div>
				<div class="col-md-4 col-md-offset-4">
          <a href="index.php?action=move&direction=east">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
					</button>
          </a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
          <a href="index.php?action=move&direction=south">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
					</button>
        </a>
				</div>
			</div>
		</div>
			<br>
			<br>
			<br>
		<div>

		<div class="list-group">
      <a href="index.php?action=attack">
			 <button type="button" class="list-group-item">Atakuj</button>
      </a>
      <a href="index.php?action=defend">
			 <button type="button" class="list-group-item">Zwiększ obrone</button>
      </a>
			 <button type="button" class="list-group-item">Ulecz się</button>
			 <button type="button" class="list-group-item">Przywróć manę</button>
			 <button type="button" class="list-group-item">Kula ognia</button>
		</div>

		</div>



	</div> <!-- /left div -->

	<div class="col-md-6">
			<div class="row">
			<div class="progress">
				<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					Experience 1/10
				</div>
			</div>
			</div>

			<div class="row">
        <?php
        $heroLocation = $hero->getLocation(); // [x][y]
        //echo "<br>Mapa: <br>";
        echo '<table>';
        for ($y=$heroLocation[1]+5; $y >= $heroLocation[1]-5 ; $y--) {
          echo '<tr>';
          for ($x=$heroLocation[0]-5; $x <= $heroLocation[0]+5 ; $x++) {
            $typTerenu = $mapa[$x][$y];
            echo '<td><img src="img/'.$typTerenu.'.jpg"></td>';
            //echo "<td>($x, $y)</td>";
          }
          echo '</tr>';
        }
        echo '</table>';
        ?>
			</div>
	</div>  <!-- /middle div -->

	<div class="col-md-3">

			<div class="progress">
				<div class="progress-bar progress-bar-danger progress-bar-striped active"
        role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
        style="width: <?php echo $hero->getHpPercent(); ?>%">
					HP <?php echo $hero->getHp(); ?>/<?php echo $hero->getBaseHp(); ?>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-info progress-bar-striped active"
        role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
        style="width: <?php echo $hero->getManaPercent(); ?>%">
					MANA <?php echo $hero->getMana(); ?>/<?php echo $hero->getBaseMana(); ?>
				</div>
			</div>

				<div class="progress col-md-6">
					<div class="progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
					VIT<input type="text">
					</div>
				</div>
				<div class="progress col-md-6">
					<div class="progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
					INT<input type="text">
					</div>
				</div>
				<div class="progress col-md-6">
					<div class="progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
					STR<input type="text">
					</div>
				</div>
				<div class="progress col-md-6">
					<div class="progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
					DEX<input type="text">
					</div>
				</div>



			<div class="row">
				<div class="col-md-1">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /head -->
					</button>
				</div>
				<div class="col-md-1 col-md-offset-8">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span> <!-- /trinket -->
					</button>
				</div>

				<div class="col-md-12">
					<p style="float:left; line-height:70%">Head</p>
					<p style="float:right; line-height:70%">Trinket</p>
				</div>

			</div>

			<div class="row">
				<div class="col-md-1">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /body -->
					</button>
				</div>
				<div class="col-md-1 col-md-offset-8">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /trinket -->
					</button>
				</div>

				<div class="col-md-12">
					<p style="float:left; line-height:70%">Body</p>
					<p style="float:right; line-height:70%">Trinket</p>
				</div>

			</div>

			<div class="row">
				<div class="col-md-1">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /legs -->
					</button>
				</div>
				<div class="col-md-1 col-md-offset-8">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /ring -->
					</button>
				</div>

				<div class="col-md-12">
					<p style="float:left; line-height:70%">Legs</p>
					<p style="float:right; line-height:70%">Ring</p>
				</div>

			</div>
			<div class="row">
				<div class="col-md-1">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /boots -->
					</button>
				</div>
				<div class="col-md-1 col-md-offset-8">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /necklace -->
					</button>
				</div>

				<div class="col-md-12">
					<p style="float:left; line-height:70%">Boots</p>
					<p style="float:right; line-height:70%">Necklace</p>
				</div>

			</div>
			<div class="row">
				<div class="col-md-1 col-md-offset-4">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /ranged weapon -->
					</button>
				</div>
				<div class="col-md-1 ">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /melee -->
					</button>
				</div>

				<div class="col-md-12">
					<p style="text-align:center; line-height:70%">Range Melee</p>
				</div>

			</div>
			<div class="row">


			</div>

	</div> <!-- /right div -->

	</div> <!-- /div glowny -->

	<div class="row">
	<div class="col-md-12">
  <?php
  foreach ($log as $line) {
    echo "<p>$line</p>";
  }
  ?>
	</div>
	</div>

	</div> <!-- /row glowny -->
</div> <!-- /container -->
<pre>
  <?php print_r($hero); ?>
</pre>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>

    $("a[data-toggle=modal]").click(function()
    {
      var pageUrl = $(this).attr('content')+'.php';

      $.ajax({
          cache: false,
          type: 'GET',
          url: pageUrl,
          //data: 'EID='+essay_id,
          success: function(data)
          {
              $('#myModal').show();
              $('#myModalBody').html(data);
          }
      });
    });
  </script>
  </body>
</html>
<?php
$_SESSION['hero'] = $hero;
$_SESSION['log'] = $log;
$_SESSION['mapa'] = $mapa;
?>
