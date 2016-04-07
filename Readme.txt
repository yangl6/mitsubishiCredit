1. To test this program, please go to the folder "main" in this project, and try to run Test.php in the command line or terminal by typing "php Test.php". 
   There is a small test case in this file (Test.php). 
   
2. In the same folder, there is a php file named "Demo", where there is the required static method that takes two arguments: a list of transactions and a price threshold. This function is called
"getFraudList", and can be used to generate a list of fraudent credit cards.

3. There are two interfaces and one abstract class. I) Transaction which is used to seperate the input string. II) Validator: which is used to validate the fraudent credit cards. III) 
Printer: which is used to print all kinds of formats for an array. The reason I made them interfaces is these business rules might be changing, and new logic might pop up
To ensure this program is portable and modularized.

4. The test folder in this project contains unit tests for the key classes, which is implemented by the use of PHPUnit. Before running the unit testing, please download the PHPUnit engine by typing 
composer global require "phpunit/phpunit=4.1.*". After that, you can simply use "phpunit" command to run each file in the "test" folder. 

Thank you for reviewing my code! 

