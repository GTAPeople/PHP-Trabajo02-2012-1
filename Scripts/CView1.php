<?php


class CView1 {
    
    public static function loadPieChart($cantidad,$product, $cant){
        for($i = 0; $i < $cantidad; $i++){
            $pieces[]="['$product[$i]',$cant[$i]]";
        }
        $array= implode(",", $pieces);
        $headScript="
            google.load('visualization', '1', {packages:['corechart']});
              google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Productos', 'Cantidades'],
                    $array
                ]);

                var options = {'title':'Porcentaje y cantidad de productos',
                                is3D: true};

                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }";
        return $headScript;
    }

}

?>
