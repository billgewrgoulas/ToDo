
Built with:

PHP: 7.3.21<br />
WAMPSERVER: 3.2.3<br /> 
CODEIGNITER: 3.1.11<br />
MySQL: 8.0.21<br />
URL: http://localhost:8080/todo/home (home page)<br />   
phpMyAdmin: http://localhost:8080/phpmyadmin/ (root account)<br /> 
  
Admin User Stories:
  The administrator after logging in can:
     • modify his profile information.
     • see all registered customers and for each customer
       can delete him, modify his profile and see
       all his messages. When a customer is deleted then
       all his messages are deleted.
     • see all messages in the database and delete any of them
       For each message we display the information of the user to whom
       belongs as well as the message information.
Customer User Stories:
  A customer after logging in can:
     • modify his profile information.
     • create new messages.
     • see all his messages as well as delete any of them.
Authentication / Authorization:

• Sessions were used to store each user's information after
  login to protect endpoints.
• A user does not have access to the application or the possibility for a request if he does not have it
  login.
• Based on the role of the user, we ensure that he only has access to its functions
  correspond. A customer can only delete and see his own messages
  as well as modify only his own profile.
• During registration, the uniqueness of the email in the database is checked.
Form Validation:
• Validation has been implemented in each form.
Extra:
• After login we redirect the user to the home page.
• A non-functional view has been implemented for password recovery.



