<?php 

// create session
session_start();

  include('../config.php');
  
  // delete record
  if(isset($_POST['save']))
  {
    // create array error
    $error = array();
    $success = array();
    $showMess = false;
//--------------------------------
  if(isset($_FILES['excel']['name']))
  {
	include ('../support-import-excel.php');
  //$con=mysqli_connect("localhost","root","","quanly_nhansu");
  
  if($conn){
    $excel=SimpleXLSX::parse($_FILES['excel']['tmp_name']);
    echo "<pre>";	
    // print_r($excel->rows(1));
    //print_r($excel->dimension(2));
    //print_r($excel->sheetNames());
        for ($sheet=0; $sheet < sizeof($excel->sheetNames()) ; $sheet++) { 
        $rowcol=$excel->dimension($sheet);
        $i=0;
        if($rowcol[0]!=1 &&$rowcol[1]!=1){
    foreach ($excel->rows($sheet) as $key => $row) {
      //print_r($row);
      $q="";
      foreach ($row as $key => $cell) {
        //print_r($cell);echo "<br>";
        if($i==0){
          $q.=$cell. " ,";
        }else{
          $q.="'".$cell. "',";
        }
      }		
      	
      $query="INSERT INTO ".$excel->sheetName($sheet)." values (".rtrim($q,",").");";
      
      //echo $query;
      if(mysqli_query($conn,$query))
      {         
      $i++;
      }  
    }
  }
}
  }
}
if(!$error)
{
  $showMess = true;
  
    //echo "<script>alert('Import thành công')</script>";
    $success['success'] = 'Tạo loại nhân viên thành công';
    echo '<script>setTimeout("window.location=\'import-excel-final.php?p=staff&a=employee-type\'",500000);</script>'; 
    
  
  }    
  } 
?>