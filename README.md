# DevPath - Online Course Selling Platform

Welcome to **DevPath**, an online platform designed to simplify learning programming languages. Whether you're a beginner or an advanced learner, DevPath offers a seamless experience for exploring, purchasing, and managing courses.

---

## Features

### User Roles
1. **Public User**:
   - Browse available courses.
   - View course details.

2. **Registered User**:
   - Purchase courses.
   - Access a personalized dashboard to track progress.
   - Edit profile and view purchased course statistics.

3. **Admin**:
   - Manage courses (add, edit, delete).
   - Monitor user activity and sales statistics.
   - Restrict page access for unauthorized users.

### Core Functionalities
- **Authentication**: 
  - Login and registration system.
  - Role-based access control (Admin/User/normal).
- **Course Management**:
  - Add, edit, and delete courses.
  - Categorize courses for easy navigation.
- **Profile Management**:
  - Update user information.
  - View purchase history.
- **Statistics**:
  - Track user course progress and admin sales data.

---

## Tech Stack

- **Frontend**: HTML, CSS,  jQuery
- **Backend**: PHP
- **Database**: MySQL (managed with phpMyAdmin)
- **APIs**: AJAX for dynamic content updates.

---

## Installation

### Prerequisites
- A local server (e.g., XAMPP P).
- PHP 7.x or later installed.
- MySQL database.

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/Ashoknegi13/DevPath.git
2. Move the files to your server's root directory (e.g., htdocs for XAMPP).
3. Import the database.
   Open phpMyAdmin.
   Create a new database (user).
    I also  provided user.sql file please check this file and import on your database.
4. Update database configuration.
    Open conn.php (in this file has a database connectivity).
      host_name =  'localhost' ,
      user =  'root',
      pass =  '' ,
      database_name =  'user' ;
5. Start the local server and access the platform at:
 http://localhost/DevPath/signup.php  (also access this page first because index.php file does't exit in this projects )

6. Screenshots .
7. 


