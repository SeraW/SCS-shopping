STEPS TO SETUP AND RUN PROJECT:

1. Ensure that node.js is installed
2. If using Chrome, please install Moesif Origin & CORS Changer (this is not needed for FireFox or Edge browsers) at 
https://chrome.google.com/webstore/detail/moesif-origin-cors-change/digfbfaphojjndkpccljibejjbppifbc

3. If using Chrome, turn on the extension
4. Start up XAMPP Control Panel
5. Start Apache and MySQL
6. Select Explorer on the right selection of the control panel
7. Select the htdocs folder
8. Drag the folder named 'Team30API', located at Team_30_3/Team30API into the htdocs folder
9. Go to your browser and enter: http://localhost/phpmyadmin/index.php
10. On the left column, select "New" to create a new database
11. Enter the Database Name as "project" without the quotes, then select Create
12. Select the project database that you have just created and select "Import" on the top of the page
13. Select "Choose File"
14. Navigate to Team_30_3/scs/src/sql and select the add_tables.sql file to import it, then select "Go"
15. In your terminal, navigate to Team_30_3/scs/ and run "npm start" 
16. The homepage should load automatically; if not, navigate to http://localhost:3000/
17. When done, remember to turn off the CORS extension (if on Chrome)!

ADMIN LOGIN: 
Username: davetran
Password: coolguy

SEARCH FUNCTION:
To use the search mode on the homepage, you need to check the user table or order table 
for the user id or order id.

REVIEW:
Note that you can only review products that you have purchased, and you must be logged in to review a product.