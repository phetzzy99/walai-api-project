<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Butterfly Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Butterfly - v2.1.0
  * Template URL: https://bootstrapmade.com/butterfly-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      <!-- Uncomment below if you prefer to use text as a logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Butterfly</a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">Borrow</a></li>
          <li><a href="#services">Overdue</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <!--<li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>-->
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section></section>
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h1>Get Patron Borrow</h1>
          <p>แสดงรายการทรัพยากรที่ทำการยืมในปัจจุบันพร้อมทั้ง <strong>วัน-เวลา-ที่กำหนดคืนทรัพยากร</strong> </p>
        </div>

        <div class="row mt-1 justify-content-center">

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="get.php" method="post" role="form" class="php-email-form">
              <div class="form-row justify-content-center">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <!--<div class="error-message"></div>-->
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php
if(isset($_POST['name']) && $_POST['name'] != '')
{
  $name = $_POST['name'];

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://imagesopac.sru.ac.th/v1/api/GetPatronBorrow/".$name,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Token: UBWmZBBYYvM6l/vcSSyGYCmS2sirXnRBH0F2vvUFK2ST5NGDu00/v+dsErbOD4m5pgRjkLAd5ZvnWOQImEPlKQ=="
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  $data = json_decode($response,true);
  $total = count($data);
  $Str = '<h1>Total : '.$total.'';
  echo $Str.'<br>';
  echo '
  <center>
  <div class="table-responsive : container">
  <table class="table table-bordered : table-striped">
  <thead>
  <tr>
  <th>No.</th>
  <th>Barcode</th>
  <th class="text-center">ชื่อเรื่อง</th>
  <th class="text-center">Call Number</th>
  <th class="text-center">วันที่ยืม</th>
  <th class="text-center">กำหนดส่ง</th>
  </tr>
  </thead>
  <tbody>';
  $i = 1;
  foreach ($data as $key => $value) {
    ?>
    <tr>
      <td><center><h6><?php echo $i++ .'.';?></h6></center></td>
      <td><h6><?php echo $value['BARCODE']; ?></h6></td>
      <td><h6><?php echo $value['TITLE']; ?></h6></td>
      <td class="col-md-2"><h6><?php echo $value['CALLNO']; ?></h6></td>
      <td class="text-center : text-success"><h6><strong><u><?php echo $value['CHECKOUTDATE']; ?></u></strong></h6></td>
      <td class="text-center : text-danger : col-md-1"><h6><strong><u><?php echo $value['DUEDATE']; ?></u></strong></h6></td>
    </tr>
    <?php
  }
  ?>
</tbody>
</table>
</div>
</center>
<?php
}
else
{
  echo 'Not Value';
}

?>

<?php
function DateThai($strDate)
{
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));
  //$strHour= date("H",strtotime($strDate));
  //$strMinute= date("i",strtotime($strDate));
  //$strSeconds= date("s",strtotime($strDate));
  $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
  $strMonthThai=$strMonthCut[$strMonth];
  $strYearCut = substr($strYear,2,2);
  return "$strDay $strMonthThai $strYear";
}
//var_dump($array);
//echo $response;
?>
