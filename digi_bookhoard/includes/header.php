<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        
        <?php if ($_SESSION['login']) {?>
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">

                <img src="assets/img/logo.png"/>
               
            </a>
        </div>
            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
        <?php } elseif ($_SESSION['alogin']) { ?>
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">

                <img src="../assets/img/logo.png"/>
            </a>    
        </div>
            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
        <?php } else{ ?>
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">

                <img src="assets/img/logo.png"/>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<!-- LOGO HEADER END-->


<?php if ($_SESSION['login']) {?>
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">My Profile</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                                </ul>
                            </li>
                            <li><a href="issued-books.php">Issued Books</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } elseif($_SESSION['alogin']){?>
<section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="../admin/dashboard.php" class="menu-top-active">DASHBOARD</a></li>
 <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Books <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/add-book.php">Add Book</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/manage-books.php">Manage Books</a></li>
                                </ul>
                            </li>

                           <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Issue Books <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/issue-book.php">Issue New Book</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/manage-issued-books.php">Manage Issued Books</a></li>
                                    
                                </ul>
                            </li>
                             <li><a href="../admin/reg-students.php">Reg Students</a></li>
                    
  <li><a href="../admin/change-password.php">Change Password</a></li>
  <!-- this is the code for displacing notifying count in the admin dashboard -->
  <?php $sql1 = "SELECT count(*) FROM student_requests ";
        $query = $pdo->query($sql1);
        $count = $query->fetchColumn();?>
  <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/student_reqs.php">Requests <span id = "notify_count" class="badge rounded-pill badge-notification bg-danger" style="background-color:red;"><?=$count;?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php } else { ?>
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="adminlogin.php">Librarian Login</a></li>
                            <li><a href="signup.php">Student Signup</a></li>
                            <li><a href="index.php">Student Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
