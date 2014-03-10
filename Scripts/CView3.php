<?php


class CView3 {
    public function loadScatterChart($Puntos){
        
        if (($Puntos<=0)||($Puntos==null)) {
            $headScript=null;
        }  else {
            for($i = 0; $i < $Puntos; $i++){
                $n=$i+1;
                $randX[]=  rand(1, 50);
                $pieces[]="'Puntos $n'";                
                for($j = 0; $j < $Puntos; $j++){
                    if($i==$j){
                        $randY[$i][$j]=rand(1, 50);
                    }  else {
                        $randY[$i][$j]='null';
                    }                    
                }
                $allY[]=  implode(",", $randY[$i]);
                
            }
            for($i = 0; $i < $Puntos; $i++){
                $piecesXY[]="[$randX[$i],$allY[$i]]";
            }
            
            $arrayP= implode(",", $pieces); 
            $arrayXY= implode(",", $piecesXY);
                        
            $headScript="
            google.load('visualization', '1', {packages:['corechart']});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['X', $arrayP],
                $arrayXY
                ]);

                var options = {
                legend: 'none',
                vAxis: {gridlines: {color: '#FFFFFF'},textPosition: 'none'},
                hAxis: { gridlines: {color: '#FFFFFF'},textPosition: 'none'}, 
                baselineColor: 'none',
                pointSize: 20,
                tooltip : {trigger: 'none'},
                chartArea: {width: 795, height: 595}
                };

                var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }";
        }      
                
        return $headScript;
    }
}

?>
