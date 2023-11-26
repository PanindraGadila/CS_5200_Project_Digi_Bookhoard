<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  // code for send book request new feature
  if (isset($_POST['request_book'])) {
    $Requested_StudentID = $_SESSION['stdid'];
    $Requested_Book = $_POST['booikid'] . "-" . $_POST['passvalue'];
    $sql = "SELECT * FROM student_requests WHERE Requested_StudentID=:rsid AND Requested_Book=:bid";
    $query = $pdo->prepare($sql);
    $query->bindParam(':rsid', $Requested_StudentID, PDO::PARAM_STR);
    $query->bindParam(':bid', $Requested_Book, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    //    if data base is empty do this
    if (empty($results)) {
      // $status = 1;
      $sql = "INSERT INTO  student_requests(Requested_StudentID,Requested_Book) VALUES(:rsid,:bid)";
      $query = $pdo->prepare($sql);
      $query->bindParam(':rsid', $Requested_StudentID, PDO::PARAM_STR);
      $query->bindParam(':bid', $Requested_Book, PDO::PARAM_STR);
      // $query->bindParam(':num', $status, PDO::PARAM_STR);
      $query->execute();
      $_SESSION['req_msg'] = "request Sent to admin successfully ";
      $_SESSION['req_error']='';
    } else {
      $_SESSION['req_error'] = "You had requested this book previously and cannot make multiple requests on same book, you may lookup for new book if intrested!";
      $_SESSION['req_msg']='';
    }
    unset($_POST);
    header('location:dashboard.php');
  }

?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Digi-Bookhoard | User Dash Board</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet" /><!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" /><!-- FONT AWESOME STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" /><!-- CUSTOM STYLE  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /><!-- GOOGLE FONT -->

  </head>

  <body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
      <div class="container">
        <div class="row pad-botm">
          <div class="col-md-12">
            <h4 class="header-line">STUDENT DASHBOARD</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-info back-widget-set text-center">
              <i class="fa fa-bars fa-5x"></i>
              <?php
              $sid = $_SESSION['stdid'];
              $sql1 = "SELECT id from tblissuedbookdetails where StudentID=:sid";
              $query1 = $pdo->prepare($sql1);
              $query1->bindParam(':sid', $sid, PDO::PARAM_STR);
              $query1->execute();
              $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
              $issuedbooks = $query1->rowCount();
              ?>

              <h3>
                <?php echo htmlentities($issuedbooks); ?>
              </h3>
              Book Issued
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-warning back-widget-set text-center">
              <i class="fa fa-recycle fa-5x"></i>
              <?php
              $rsts = 0;
              $sql2 = "SELECT id from tblissuedbookdetails where StudentID=:sid and RetrunStatus=:rsts";
              $query2 = $pdo->prepare($sql2);
              $query2->bindParam(':sid', $sid, PDO::PARAM_STR);
              $query2->bindParam(':rsts', $rsts, PDO::PARAM_STR);
              $query2->execute();
              $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
              $returnedbooks = $query2->rowCount();
              ?>

              <h3>
                <?php echo htmlentities($returnedbooks); ?>
              </h3>
              Books Not Returned Yet
            </div>
          </div>
        </div>
        <div>
          <section>
            <!-- (A) SEARCH FORM -->
            <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
              <div class=" panel panel-info">
                <div class="panel-heading">
                  search across available books and Request for checkout
                </div>
                <div class="panel-body">
                  <form role="form" method="POST">
                    <div class="form-group">
                      <label>Book number(ISBN)<span style="color:red;">*</span></label>
                      <input type="hidden" name="passvalue" id="passvalue" value="">
                      <input class="form-control" type="text" name="booikid" id="bookid" onBlur="getbook()" required="required" placeholder="only number here" />
                      <div id="suggesstion-box"></div>
                    </div>
                    <div class="form-group">
                      <select class="form-control" name="bookdetails" id="get_book_name" readonly>
                        <option value="" disabled selected>your search selection will be here</option>
                      </select>
                    </div>
                    <button type="submit" name="request_book" id="submit" class="btn btn-info">Request Librarian for check out</button>
                  </form>
                </div>
              </div>
              <!-- sucess and warning messages -->
              <div class="row">
                <?php if ($_SESSION['req_error'] != "") { ?>
                  <div class="col-md-6">
                    <div class="alert alert-danger">
                      <strong>Error :</strong>
                      <?php echo htmlentities($_SESSION['req_error']); ?>
                      <?php //echo htmlentities($_SESSION['req_error'] = ""); ?>
                    </div>
                  </div>
                <?php } ?>
                <?php if ($_SESSION['req_msg'] != "") { ?>
                  <div class="col-md-6">
                    <div class="alert alert-success">
                      <strong>Success :</strong>
                      <?php echo htmlentities($_SESSION['req_msg']); ?>
                      <?php //echo htmlentities($_SESSION['req_msg'] = ""); ?>
                    </div>
                  </div>
                <?php } ?>
              </div>
          </section>
        </div>
        <div class="row">

          <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-1">
            <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel">

              <div class="carousel-inner">
                <div class="item active">

                  <img src="assets/img/1.jpg" alt="" />

                </div>
                <div class="item">
                  <img src="assets/img/2.jpg" alt="" />

                </div>
                <div class="item">
                  <img src="assets/img/3.jpg" alt="" />

                </div>
              </div>
              <!--INDICATORS-->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example" data-slide-to="1"></li>
                <li data-target="#carousel-example" data-slide-to="2"></li>
              </ol>
              <!--PREVIUS-NEXT BUTTONS-->
              <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <script src="assets/js/jquery-1.10.2.js"></script><!-- Jquery SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script><!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/custom.js"></script><!-- CUSTOM SCRIPTS  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" /><!-- DATATABLE STYLE  -->
  </body>

  </html>
  <script>
    //function for book details
    function getbook() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "admin/get_book.php",
        data: 'bookid=' + $("#bookid").val(),
        type: "POST",
        success: function(data) {
          $("#get_book_name").html(data);
          $("#passvalue").val($("#get_book_name option:selected").text()); // this is to pass value from javascript to php using hidden input html tag
          $("#loaderIcon").hide();
        },
        error: function() {}
      });
    }
  </script>
  <!-- code for the auto suggestions -->
  <script>
    // AJAX call for autocomplete 
    $(document).ready(function() {
      $("#bookid").keyup(function() {
        $.ajax({
          type: "POST",
          url: "book_request.php",
          data: 'bookid=' + $(this).val(),
          beforeSend: function() {
            $("#bookid").css("background", "background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
          },
          success: function(data) {
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
            $("#bookid").css("background", "#FFF");
          }
        });
      });
    });
    //To select a suggestion list here name
    function selectBook(val) {
      $("#bookid").val(val).focus();
      $("#suggesstion-box").hide();
    }
  </script>
<?php } ?>