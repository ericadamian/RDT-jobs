# Project: RDT-jobs

Website source code for http://rdt-jobs.com/

# What is it

Website is focused on Pasadena City College's Restorative Dental Technology Department. Website provides an alternative and more efficient approach to current job listings, rather than sending emails for every new job posting. Administrator is able to login to website using stored credentials, add new job details, and post for users to view.


# Features

Website integrates HTML, CSS, Javascript, and PHP. Frontend for website based on PCC's website design. Backend based on storing login credentials and posting job details (stored through phpMyAdmin database tables). Hyperlinks and resources for PCC's RDT department also available throughout main page.


# Running locally

Website ran on local server using XAMPP 7.2.34-0. In order to run code (MacOS), go to Applications>>xamppfiles>>htdocs>>and create a folder (ie. folder called "website") where code will be stored.

In order to run local servers, open XAMPP's manager-osx: under "manage servers", run MySQL Database, ProFTPD, and Apache Web Server. If MySQL Database does not start, enter on the command line: sudo killall mysqld (this will stop MySQL altogether) and restart.

Open code from file under localhost (typing "localhost" alone opens XAMPP main page, localhost/phpmyadmin opens phpMyAdmin database, and localhost/(**folder name**) will open coded files (ie. localhost/website)

Accessing phpMyAdmin credentials: Username: root, Password: (*empty*)


# Running on website server (GoDaddy)

Website utilizes GoDaddy's Economy Linux Hosting with cPanel Web Hosting (alongside the domain name http://rdt-jobs.com/). Under My Hosting, go to cPanel Admin>>Files>>File Manager. Code is stored in public_html folder. 

phpMyAdmin database accessible through cPanel Admin>>Databases>>phpMyAdmin. In order to add a new database, go back to Databases>>MySQL Databases>>Create New Database. NOTE: you must also add a user for database. Under same page, enter a new username and password under "Add New User". After adding, make sure to provide correct privileges (ie. all).


NOTE: connect.php credentials vary locally versus website server (update database user/pass and server name) that was described above. Server name can typically be found at the top of the page on phpMyAdmin. Database user/pass is described above under "Add New User". Doing this will properly ensure connection to database.

