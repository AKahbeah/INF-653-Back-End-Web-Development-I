# Zippy Used Autos Web Application

## Overview

This project is a PHP web application developed for Zippy Used Autos. It allows users to view a list of available vehicles and provides an admin interface to manage inventory, makes, types, and classes. The application follows the MVC (Model-View-Controller) design pattern to keep the code organized and maintainable.

---

## Features

### Public Homepage

* Displays all vehicles sorted by price (highest to lowest) by default
* Option to sort vehicles by year
* Filter vehicles by:

  * Make
  * Type
  * Class
* Only one filter is applied at a time

---

### Admin Backend

Accessible via:

```
http://localhost/zippyusedautos/admin/
```

Admin features include:

* View all vehicles
* Add new vehicles
* Delete vehicles
* Manage vehicle categories:

  * Add/Delete Makes
  * Add/Delete Types
  * Add/Delete Classes

---

## Technologies Used

* PHP
* MySQL
* XAMPP (Apache & MySQL)
* HTML/CSS
* phpMyAdmin

---

## Project Structure (MVC)

```
zippyusedautos/
│
├── index.php
├── controllers/
│   └── vehicles.php
├── model/
│   └── vehicles_db.php
├── view/
│   └── vehicle_list.php
├── database/
│   └── database.php
├── admin/
│   ├── index.php
│   ├── add_vehicle.php
│   ├── makes.php
│   ├── types.php
│   └── classes.php
└── css/
    └── style.css
```

---

## Setup Instructions

1. Install XAMPP

2. Place project folder in:

   ```
   C:\xampp\htdocs\
   ```

3. Start Apache and MySQL in XAMPP

4. Open phpMyAdmin:

   ```
   http://localhost/phpmyadmin/
   ```

5. Create a database named:

   ```
   zippyusedautos
   ```

6. Import or create the required tables:

   * vehicles
   * makes
   * types
   * classes

7. Open the project in browser:

   ```
   http://localhost/zippyusedautos/
   ```

---

## Notes

* The admin section is not linked from the homepage and must be accessed directly via URL.
* The application uses PDO for database connections.
* Sorting and filtering are handled using GET requests.

---

## Author

[Amy Kahbeah]

---

## Reflection

This project helped reinforce concepts such as MVC structure, database integration, and debugging PHP applications. It also improved understanding of how front-end and back-end components interact in a web application.
