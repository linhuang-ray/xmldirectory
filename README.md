xmldirectory
============
This is an app provide xml directory service for cisco IP Phone. It is built by CodeIgniter with IonAuth library

functions include:
  1. web based login and user management system -- IonAuth library
  2. web based entry management system for each customer
      1. getting, updating, inserting and deleting directory entries
      2. update customer information
  3. xml format directory presenting
  4. pagination for the xml directory
  5. search for the xml directory
  
Model:
  1. IonAuth user model
  2. Entries model which provide the directory entry data retrieving, inserting, updating and deleting
  
Tips:
  1. Generate and grant each customer a key for their http xml request.
  2. Since IP Phone cannot handle the webpage redirecting such as: header('location: xxx') in PHP, and almost all
  MVC frameworks(PHP) use the redirecting to response, it is necessary to build REST API and use another PHP file 
  to send the request and response on the same page.
  As you can find in the xml folder, there are three php files with each calling to an API and put the response on
  the same page. This may looks dumb but the IP Phone features decide it.
