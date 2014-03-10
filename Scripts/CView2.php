<?php

class CView2 {
   
    public function loadBarChart($Enero, $Febrero, $Marzo, $Abril,$Mayo,
            $Junio,$Julio,$Agosto,$Setiembre,$Octubre,$Noviembre,$Diciembre){
        if($Enero==null||$Enero<=0){
            $Enero=0;
        }
        if($Febrero==null||$Febrero<=0){
            $Febrero=0;
        }
        if($Marzo==null||$Marzo<=0){
            $Marzo=0;
        }
        if($Abril==null||$Abril<=0){
            $Abril=0;
        }
        if($Mayo==null||$Mayo<=0){
            $Mayo=0;
        }
        if($Junio==null||$Junio<=0){
            $Junio=0;
        }
        if($Julio==null||$Julio<=0){
            $Julio=0;
        }
        if($Agosto==null||$Agosto<=0){
            $Agosto=0;
        }
        if($Setiembre==null||$Setiembre<=0){
            $Setiembre=0;
        }
        if($Octubre==null||$Octubre<=0){
            $Octubre=0;
        }
        if($Noviembre==null||$Noviembre<=0){
            $Noviembre=0;
        }
        if($Diciembre==null||$Diciembre<=0){
            $Diciembre=0;
        }
        $headScript="
            google.load('visualization', '1');   // Don't need to specify chart libraries!
      google.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var wrapper = new google.visualization.ChartWrapper({
          chartType: 'ColumnChart',
          dataTable: [['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo',
                        'Junio','Julio','Agosto','Setiembre','Octubre',
                        'Noviembre','Diciembre'],
                      ['', $Enero, $Febrero, $Marzo, $Abril, $Mayo, $Junio,
                        $Julio,$Agosto,$Setiembre,$Octubre,$Noviembre,
                        $Diciembre]],
          options: {'title': 'Las ventas de un producto 2012'},
          containerId: 'chart_div'
        });
        wrapper.draw();
      }
            ";
        return $headScript;
    }
}

?>
