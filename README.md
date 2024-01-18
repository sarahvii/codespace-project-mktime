# MK Time

This is a project we worked on as part of the [Codespace course](https://www.edinburghcollege.ac.uk/courses/browse/bootcamp-beginner-software-free-course-cr1csicz23) at Edinburgh College. The idea was to build a full-stack retail application that would consolidate our coursework.

## Project Brief  

### Client Overview  

MKTIME is a prestigious retailer based in Scotland, specialising in the sale of high-quality Swiss watches. With a reputation for excellence and a commitment to providing customers with a curated selection of luxury timepieces, MKTIME aims to expand its reach through the development of a sophisticated eCommerce web application.

--- 

### Project Objectives

1. Online Presence: Establish a robust online presence for MKTIME to reach a global audience and increase sales.
2. User-Friendly Interface: Create an intuitive and user-friendly interface that enhances the shopping experience, allowing customers to easily browse, search, and purchase products. 
3. Product Showcase: Showcase MKTIME's collection of Swiss watches through visually appealing and detailed product pages, highlighting key features, specifications, and pricing. 
4. Responsive Design: Develop a responsive design that ensures seamless functionality across various devices, including desktops, tablets, and smartphones. 

---

### Project Overview

Create a small-scale eCommerce web application that leverages a robust database to manage product listings, user account, and order processing. The application aims to provide a seamless and secure shopping experience for users while ensuring efficient data management and scalability. 

---

### Key Features

1. User Authentication and Account Management: 
- User registration and login functionality. 
- Secure password handling and storage. 
- User profile management, including order history. 

2. Product Catalogue: 
- Database-driven product management. 
- Each product should have details such as name, description and price. 

3. Shopping Cart: 
- Users can add/remove items to/from their shopping cart. 
- Ability to modify quantities and proceed to checkout. 

4. Database Architecture: 
- Choose an appropriate relational database system (e.g., MySQL) for data storage. 
- Define clear relationships between entities (users, products, orders, order content). 
- Ensure data integrity and normalization. 

5. Responsive Design: 
- Create a responsive and mobile-friendly user interface for seamless access on various devices. 

---

### Technology Stack

- Frontend: Bootstrap and HTML
- Backend: PHP 
- Database: MySQL
- Version Control: Git
- Project Management: Jira
- Testing: Selenium

--- 

### Testing

- Implement unit testing for critical components. 
- Conduct thorough testing of the application's functionality, security, and performance.
  
-------

## Our approach

We used this project brief to draw up a data structure using the noun technique. After working out our database requirements - using a combination of Microsoft Access, Microsoft Excel, MySQL and drawio - we moved onto the UI. Initially we made basic segments of the app separately (e.g. the display pages, login/authorisation, and shopping cart) before combining them together. For security reasons we used sessions to transfer transaction data from one file to the next. For testing we had been using Cypress during the course, but used Selenium here to get experience with a wider range of tools. 

The coding was mostly done on Notepad++ and Visual Studio Code, with XAMPP allowing us to view the app and databases on our local host. 

### To use the app on your local server you need to do the following:

- Download and install [XAMPP](https://www.apachefriends.org/)
- Start the Apache and then MySQL servers.
- Clone this repo into a folder in your XAMPP htdocs folder (often C: > xampp > htdocs)
- On XAMPP click the MySQL 'Admin' button to be taken to the PHP Admin My SQL page. Create a database called 'mktime' and then upload the 'mktime.sql' file from this repo.
- Type 'http://localhost/newfoldername/root/index.php' into your browser and press 'enter' (don't forget to replace 'newfoldername' with the name of your new folder).
- You can now view the home page and product detail pages on the app, but to buy anything you have to log in.
- You may have spotted that passwords on the database have been encrypted, so feel free to use 'a_coolio@example.com' and 'coolio1' to login or to make up your own email and password combination.
- Now you're logged in you can add as many watches as you want to your basket.
- Browse, search and look at more detailed product information before checking out.
