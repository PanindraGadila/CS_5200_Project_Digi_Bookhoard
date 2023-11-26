<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:../adminlogin.php');
} else {
    $Requested_Book_on_action;
    // code for accepting the student requests(ie just deleting the specif record)  
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $txt = explode("@",$id,2);
        $sql = "delete from student_requests WHERE Requested_StudentID=:id AND Requested_Book=:bid";
        $query = $pdo->prepare($sql);
        $query->bindParam(':id', $txt[0], PDO::PARAM_STR);
        $query->bindParam(':bid', $txt[1], PDO::PARAM_STR);
        $query->execute();
        header('location:student_reqs.php');
    }
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Digi-Bookhoard | Open Requests</title>

        <link href="../assets/css/bootstrap.css" rel="stylesheet" /><!-- BOOTSTRAP CORE STYLE  -->
        <link href="../assets/css/font-awesome.css" rel="stylesheet" /><!-- FONT AWESOME STYLE  -->
        <link href="../assets/css/style.css" rel="stylesheet" /><!-- CUSTOM STYLE  -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /><!-- GOOGLE FONT -->
        <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" /><!-- DATATABLE STYLE  -->

    </head>

    <body>
        <!------MENU SECTION START-->
        <?php include('../includes/header.php'); ?>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Book checkout requests from students</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Requests Display
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student ID</th>
                                                <th>Book Information </th>
                                                <th>Initiative</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT * from student_requests";
                                            $query = $pdo->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {               ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->Requested_StudentID); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->Requested_Book); ?></td>
                                                        <td class="center">
                                                                <a href="student_reqs.php?delete=<?php echo htmlentities($result->Requested_StudentID."@".$result->Requested_Book); ?>" onclick="return confirm('As a librarian you need to manually issue this book to Student if you accept request. Are you sure you want to Accept?');"><button class=" btn btn-primary"> Accept</button>
                                                        </td>
                                                    </tr>
                                            <?php $cnt = $cnt + 1;
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
            </div>
        </div>
        <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>                                    
        <!-- CONTENT-WRAPPER SECTION END-->
        <?php include('../includes/footer.php'); ?>
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->

        <script src="../assets/js/jquery-1.10.2.js"></script><!-- Jquery SCRIPTS  -->
        <script src="../assets/js/bootstrap.js"></script><!-- BOOTSTRAP SCRIPTS  -->
        <script src="../assets/js/custom.js"></script><!-- CUSTOM SCRIPTS  -->

        <!-- scripts ref for data-table scripts  -->
        <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
    </body>

    </html>
<?php } ?>