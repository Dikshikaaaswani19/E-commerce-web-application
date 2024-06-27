<?php 
  require ("fpdf/fpdf.php");
  include 'config.php';

  $query = mysqli_query($conn, "SELECT * FROM `orders` where id='28'") or die('query failed');
  mysqli_num_rows($query);
  $row = mysqli_fetch_array($query);

  //customer and invoice details
  $info=[
    "customer"=>$row['name'],
    "address"=>"",
    "city"=>"",
    "invoice_no"=>$row['id'],
    "invoice_date"=>date("d-m-y"),
    "total_amt"=>$row['total_price'],
    "words"=>"",
  ];

  // $ = mysqli_query($conn, "SELECT * FROM order where id='($_GET['id'])'");
  // $res= mysqli_fetch_array($query);
  // if($res->num_rows>0)

  //invoice Products
  $products_info=[
    [
      "name"=>$row['total_products'],
      "price"=>$row['total_price'],
      "qty"=>1,
      "total"=>$row['total_price']
    ]
    // [
    //   "name"=>"Mouse",
    //   "price"=>"400.00",
    //   "qty"=>3,
    //   "total"=>"1200.00"
    // ],
    // [
    //   "name"=>"UPS",
    //   "price"=>"3000.00",
    //   "qty"=>1,
    //   "total"=>"3000.00"
    // ],
  ];
  
  class PDF extends FPDF
  {
    function Header(){
      
      //Display Company Info
      $this->SetFont('Arial','B',14);
      $this->Cell(50,10,"I Product Selling Store",0,1);
      $this->SetFont('Arial','',14);
      $this->Cell(50,7,"G-1 BizHub ,",0,1);
      $this->Cell(50,7,"SP Ring Road,",0,1);
      $this->Cell(50,7,"Ahemdabad 300045",0,1);
      $this->Cell(50,7,"PH : 8778731770",0,1);
      
      //Display INVOICE text
      $this->SetY(15);
      $this->SetX(-40);
      $this->SetFont('Arial','B',18);
      $this->Image('./images/trinity-logo.png', 160,13,40,20);

      // $this->Cell(50,10,"INVOICE",0,1);
      
      //Display Horizontal line
      $this->Line(0,48,210,48);
    }
       


    function body($info,$products_info){
      
      //Billing Details
      $this->SetY(55);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(50,10,"Bill To: ",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(50,7,$info["customer"],0,1);
      $this->Cell(50,7,$info["address"],0,1);
      $this->Cell(50,7,$info["city"],0,1);
      
      //Display Invoice no
      $this->SetY(55);
      $this->SetX(-60);
      $this->Cell(50,7,"Invoice No : ".$info["invoice_no"]);
      
      //Display Invoice date
      $this->SetY(63);
      $this->SetX(-60);
      $this->Cell(50,7,"Invoice Date : ".$info["invoice_date"]);
      
      //Display Table headings
      $this->SetY(95);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(80,9,"DESCRIPTION",1,0);
      $this->Cell(40,9,"PRICE",1,0,"C");
      $this->Cell(30,9,"QTY",1,0,"C");
      $this->Cell(40,9,"TOTAL",1,1,"C");
      $this->SetFont('Arial','',12);
      
      //Display table product rows
      foreach($products_info as $row){
        $this->Cell(80,9,$row["name"],"LR",0);
        $this->Cell(40,9,$row["price"],"R",0,"R");
        $this->Cell(30,9,$row["qty"],"R",0,"C");
        $this->Cell(40,9,$row["total"],"R",1,"R");
      }
      //Display table empty rows
      for($i=0;$i<12-count($products_info);$i++)
      {
        $this->Cell(80,9,"","LR",0);
        $this->Cell(40,9,"","R",0,"R");
        $this->Cell(30,9,"","R",0,"C");
        $this->Cell(40,9,"","R",1,"R");
      }
      //Display table total row
      $this->SetFont('Arial','B',12);
      $this->Cell(150,9,"TOTAL",1,0,"R");
      $this->Cell(40,9,$info["total_amt"],1,1,"R");
      
      //Display amount in words
      $this->SetY(225);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,9,"Amount in Words ",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(0,9,$info["words"],0,1);
      
    }
    function Footer(){
      
      //set footer position
      $this->SetY(-50);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,10,"I Product Selling Store",0,1,"R");
      $this->Ln(10);
      $this->SetFont('Arial','',12);
      $this->Cell(0,10,"Authorized Signature",0,1,"R");
      $this->SetFont('Arial','',10);
      
      //Display Footer Text
      $this->Cell(0,10,"Thank You For Shopping.",0,1,"C");
      
    }
    
  }
  //Create A4 Page with Portrait 
  $pdf=new PDF("P","mm","A4");
  $pdf->AddPage();
  $pdf->body($info,$products_info);
  $pdf->Output('Invoice.pdf','D');
?>