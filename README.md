# Yemek Torbası

Yemek Torbasi (Food Bag) is a simple food ordering website written in PHP 8.1 as the server-side scripting language. <br>
I'm not a professional web developer therefore there might be mistakes or badly written code which is not considered good practice in general. <br>
This project's main goal is to learn the basics of frontend and backend web development, database management, SQL syntax, PHP and various other tools (eg. XAMPP).

### Measures Taken Against Malicious User Inputs
The form inputs filtered before processing with built-in methods trim(), htmlspecialchars() and stripslashes(). SQL statements prepared, bind_params then executed to prevent SQL Injection.
Users are blocked from accessing unauthorized pages. For example, if the user tries to reach the sign up page even though they're logged in server redirects to index page. <br>
User passwords inserted to the database after hashing.

### Overview
 Languages: HTML, CSS, JavaScript, PHP <br>
    Server: Apache <br>
Tools/IDEs: XAMPP v3.3.0, JetBrains PhpStorm 2021.3.1 <br>
 Framework: Bootstrap <br>
  Database: MariaDB <br>
