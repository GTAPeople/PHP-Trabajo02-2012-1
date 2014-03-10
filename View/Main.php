<?php
require_once '../Scripts/CView1.php';
require_once '../Scripts/CView2.php';
require_once '../Scripts/CView3.php';

class Main {
    public function ejecutar(){
        
        $view1 = new CView1();
        $view2 = new CView2();
        $view3 = new CView3();
        
        if(!isset($_GET['opcion'])){
            $this->_mostrarDesfaultView();
        }else{
            $opcion = $_GET['opcion'];
            
            if($opcion == 'ir'){
                $apps = $_POST['apps'];
                switch ($apps) {
                    case 'app1':
                        $piecesPro=null;
                        $piecesCant=null;
                        if(($_POST['cantidad']!=null)||($_POST['cantidad']>=1)){
                            $cantidad = $_POST['cantidad'];                            
                        }  else {
                            $cantidad=1;
                        }
                        for($i = 0; $i < $cantidad; $i++){
                            if(isset($_POST["producto$i"])){
                                $piecesPro[]=$_POST["producto$i"];
                            }
                            if(isset($_POST["cantidad$i"])){
                                if (($_POST["cantidad$i"])>=0){
                                    $piecesCant[]=$_POST["cantidad$i"];
                                }                                
                            }                            
                        }
                        
                        $pScript=$view1->loadPieChart($cantidad,$piecesPro, $piecesCant);
                        $this->_view01($cantidad,$pScript);                                       
                        break;
                    case 'app2':
                        if(isset($_POST['enero'])){
                            $Enero=$_POST['enero'];
                        }  else {
                            $Enero=0;
                        }
                        if(isset($_POST['febrero'])){
                            $Febrero=$_POST['febrero'];
                        }  else {
                            $Febrero=0;
                        }
                        if(isset($_POST['marzo'])){
                            $Marzo=$_POST['marzo'];
                        }  else {
                            $Marzo=0;
                        }
                        if(isset($_POST['abril'])){
                            $Abril=$_POST['abril'];
                        }  else {
                            $Abril=0;
                        }
                        if(isset($_POST['mayo'])){
                            $Mayo=$_POST['mayo'];
                        }  else {
                            $Mayo=0;
                        }
                        if(isset($_POST['junio'])){
                            $Junio=$_POST['junio'];
                        }  else {
                            $Junio=0;
                        }
                        if(isset($_POST['julio'])){
                            $Julio=$_POST['julio'];
                        }  else {
                            $Julio=0;
                        }
                        if(isset($_POST['agosto'])){
                            $Agosto=$_POST['agosto'];
                        }  else {
                            $Agosto=0;
                        }
                        if(isset($_POST['setiembre'])){
                            $Setiembre=$_POST['setiembre'];
                        }  else {
                            $Setiembre=0;
                        }
                        if(isset($_POST['octubre'])){
                            $Octubre=$_POST['octubre'];
                        }  else {
                            $Octubre=0;
                        }
                        if(isset($_POST['noviembre'])){
                            $Noviembre=$_POST['noviembre'];
                        }  else {
                            $Noviembre=0;
                        }
                        if(isset($_POST['diciembre'])){
                            $Diciembre=$_POST['diciembre'];
                        }  else {
                            $Diciembre=0;
                        }
                        $cScript= $view2->loadBarChart($Enero,$Febrero,$Marzo,$Abril,
                        $Mayo,$Junio,$Julio,$Agosto,$Setiembre,$Octubre,
                        $Noviembre,$Diciembre);
                        $this->_view02($cScript);
                        break;
                    case 'app3':
                        if(isset($_POST['puntos'])){
                            $Puntos=$_POST['puntos'];
                        }  else {
                            $Puntos=0;
                        }
                        $tScript= $view3->loadScatterChart($Puntos);
                        $this->_view03($tScript);
                        break;
                    default:
                        break;
                }
            }
        }
    }
    

    private function _mostrarDesfaultView(){
        require_once '../View/defaultView.html';
    }
    
    private function _view01($cantidad,$pScript){
        require_once '../View/view01.html';
    }
    
    private function _view02($cScript){
        require_once '../View/view02.html';
    }
    
    private function _view03($tScript){
        require_once '../View/view03.html';
    }
    
}

$main = new Main();
$main->ejecutar();
?>
