# DIGI-BOOKHOARD (Library-Management)-USING-PHP

-----Way to run this Project----

1. Download and Unzip file on your local system copy digi_bookhoard.
2. Put digi_bookhoard folder inside root directory(htdocs folder of mamp software.)
3. Database Configuration
   Open phpmyadmin server
   Create Database digi_bookhoard
   Import database digi_bookhoard.sql (available inside zip package)
   run query - "GRANT ALL ON digi_bookhoard.* TO 'php'@'localhost' IDENTIFIED BY 'phpdb';"

For Students
Open Your browser put inside browser “http://localhost/digi_bookhoard"
(OR FOR MACOS include the port no.) navigate to : "http://localhost:8080/digi_bookhoard/"

For Librarian/admin Panel
Open Your browser put inside browser : “http://localhost/digi_bookhoard/adminlogin.php”
(OR FOR MACOS include the port no.) navigate to : "http://localhost:8080/digi_bookhoard/adminlogin.php"

Access info:
1.Login Details for Librarian/admin :
    Username1 : admin
    Username2 : Mahindra_admin
    Username3 : panindra_admin
    Password  : test@123
    (all admin users here have the same password "test@123")


2.Login Details for (Students)users:
    Username1 : test@gmail.com
    Username2 : gadilapanindrareddy@gmail.com
    Username4 : Mahindrak@gmail.com
    Password  : test@123
    (all students mentioned here have the same password "test@123" or you may register new in app)




Project Info:- digi_bookhoard

-This is a simple Library Management app for School.

-This app has divided in two modules

1.Students
2.Librarian

NOTE: Librarian here is similar to admin


Module 1: Librarian/Librarian/admin Features:

Librarian/admin Dashboard
Librarian/admin can add/update/ delete books
Librarian/admin can issue a new book to student and also update the details when student return book
Librarian/admin can search student by using their student ID
Librarian/admin can also view student details
Librarian/admin can watch the students requests of their selected books and decide to accept it or not.
Librarian/admin can change own password

Module 2: Students

Student can register yourself and after registration they will get studentid
After login student can view own dashboard.
Student can search available books in dashboard and can request one.
Student can update own profile.
Student can see the announcement images in the dashboard.
Student can view issued book and book return date-time.
Student can also change own password.
Student can also recover own password.


Note : we have mentioned the respective source licenses, urls of authors in respective files in this project for using Bootstrap, Jquery, awesomefonts sources codes.