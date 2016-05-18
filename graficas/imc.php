<?php

/**
 * 
 * @ Por Nahum Ramirez Medina
 * @version 1.0
 */


				
	  include ("includes/conexion_database.php");
      $query1 = "SELECT imc FROM diagnostico";
      $resultados = $mysqli->query($query1);
	  $desnutricion=0;
	  $normal=0;
	  $sobrepeso=0;
	  $obesidad1=0;
	  $obesidad2=0;
	  $obesidad3=0;
            // ciclo mientras condicion
			while( $rdp=$resultados->fetch_assoc() )
    {	
				 if($rdp['imc']<18)
			  {
				  $desnutricion += 1;
			  }
			  if($rdp['imc']<19 && $rdp['imc']<24.9)
			  {
				  $normal += 1;
			  }
			  if($rdp['imc']>25 && $rdp['imc']<26.9)
			  {
				  $sobrepeso += 1;
			  }
			  if($rdp['imc']>27 && $rdp['imc']<29.9)
			  {
				  $obesidad1 += 1;
			  }
			  if($rdp['imc']>30 && $rdp['imc']<39.9)
			  {
				  $obesidad2 += 1;
			  }
			  if($rdp['imc']>40)
			  {
				  $obesidad3 += 1;
			  }
	}

		// para mostrar datos de la tabla datos
	$query2 = "SELECT * FROM datos";
      $resultados2 = $mysqli->query($query2);
	  $peso_actual=0;
	  $talla=0;
	  $edad=0;
	  $cintura=0;
            	// Inicia ciclo de condicion imc
			while( $rdp2=$resultados2->fetch_assoc() )
    {	
				 if($rdp2['peso_actual']>=0 && $rdp2['peso_actual']<=5)
			  {
				  $peso_actual += 1;
			  }
			  if($rdp2['talla']>5 && $rdp2['talla']<=15)
			  {
				  $talla += 1;
			  }
			  if($rdp2['peso_actual']>15 && $rdp2['peso_actual']<=75)
			  {
				  $edad += 1;
			  }
			  if($rdp2['peso_actual']>75 && $rdp2['peso_actual']<=85)
			  {
				  $cintura += 1;
			  }
		
	}
				?>

         <div class="main-inner">
            <div class="container">
                <div class="row">
                
                
                    <div class="span6"> 
                        <!-- /widget -->
                        <div class="widget">
                            <div class="widget-header">
                                <i class="icon-bar-chart"></i>
                                <h3 style="padding-left: 90px">
                                    IMC: numero de personas por categoria</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <canvas id="pie-chart" class="chart-holder" width="538" height="250">
                                </canvas>
                                <!-- /pie-chart -->
                            </div>
                            <!-- /widget-content -->
                        </div>
                        <!-- /widget -->
                    </div>
                    

                    <div class="span6">   
                    <div class="widget">
                            <div class="widget-header">
                                <i class="icon-bar-chart"></i>
                                <h3 style="padding-left: 90px">
                                    Peso Actual: Pesos de empleados</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <canvas id="pie-chart3" class="chart-holder" width="538" height="250">
                                </canvas>
                                <!-- /pie-chart -->
                            </div>
                            <!-- /widget-content -->
                        </div>
                        <!-- /widget -->
                    </div>
                
                    
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
   
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/excanvas.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/base.js"></script>
    <script src="js/Chart.js"></script>
    <script>
        

var pieData = [
             
				
			{
			    value: <?php echo $desnutricion ?>,
			    color: "#D97041",
                label: "Desnutrición"
			},
			{
			    value: <?php echo $normal ?>,
			    color: "#C7604C",
                label: "Normal"
			},
			{
			    value: <?php echo $sobrepeso ?>,
			    color: "#21323D",
                label: "Sobrepeso"
			},
			{
			    value: <?php echo $obesidad1 ?>,
			    color: "#9D9B7F",
                label: "Obesidad I"
			},
			{
			    value: <?php echo $obesidad2 ?>,
			    color: "#7D4F6D",
                label: "Obesidad II"
			},
			{
			    value: <?php echo $obesidad3 ?>,
			    color: "#584A5E",
                label: "Obesidad III"
			}

            ];

				var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);



var PieData3 = [
             
				
			{
			    value: <?php echo $peso_actual ?>,
			    color: "#D97041",
                label: "Peso Actual de Empleado"
			},
			{
			    value: <?php echo $talla ?>,
			    color: "#C7604C",
                label: "Talla de Empleado"
			},
			{
			    value: <?php echo $edad ?>,
			    color: "#21323D",
                label: "Edad de Empleado"
			},
			{
			    value: <?php echo $cintura ?>,
			    color: "#9D9B7F",
                label: "Cintura de Empleado"
			}

            ];

				var mypeso = new Chart(document.getElementById("pie-chart3").getContext("2d")).Pie(PieData3);
/**
 * @ Por Nahum Ramirez Medina
 * @version 1.0
 */
				</script>


