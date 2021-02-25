# Project: RDT-jobs

Website source code for http://rdt-jobs.com/

# What is it

Website is focused on Pasadena City College's Restorative Dental Technology Department. Website provides an alternative and more efficient approach to current job listings, rather than sending emails for every new job posting. Administrator is able to login to website using stored credentials, add new job details, and post for users to view.


# Features

Website integrates HTML, CSS, Javascript, and PHP. Frontend for website based on PCC's website design. Backend based on storing login credentials and posting jobs (stored through phpMyAdmin database). Hyperlinks and resources for PCC's RDT department also available throughout main page.


# Running locally

Website run on local server using XAMPP 7.2.34-0. In order to run code (MacOS), go to Applications>>xamppfiles>>htdocs>>and create a file (ie. folder called "website") where code will be stored.

In order to run servers, open XAMPP's manager-osx: under "manage servers", run MySQL Database, ProFTPD, and Apache Web Server. If MySQL Database does not start, enter on the command line: sudo killall mysqld (this will stop MySQL altogether) and restart.

Open code from file under localhost (typing "localhost" alone opens XAMPP main page, localhost/phpmyadmin opens phpMyAdmin database, and localhost/(**folder name**) will open coded files (ie. localhost/website)

Accessing phpMyAdmin credentials: Username: root, Password: (*empty*)


# Running on website server (GoDaddy)
