# SkillSwap — Assessment 2 (Web Programming)

**Student ID:** s4167759  
**Repository:** https://github.com/s4167759/wp  

## Overview
SkillSwap is a simple skill listing site built with **PHP + MySQL**.  
This A2 implementation includes:

- **Home (`index.php`)**
  - **Bootstrap 5 carousel with 4 static banners** (`assets/images/banner1~4.jpg`)
  - “**Latest 4 skills**” list (database-driven, newest first)
- **Skills list (`skills.php`)** with `?q=` search (**prepared statements**)
- **Details (`details.php`)** via `?id=` (**prepared statements**)
- **Gallery (`gallery.php`)** rendering all records with images
- **Add (`add.php`) + process (`process_add.php`)**
  - Client-side checks (JS) + server-side validation
  - **Allowed types:** jpg/jpeg/png/gif/webp; **Max:** 5 MB
  - **Unique filename** generation + `move_uploaded_file()` to `assets/images/skills/`
  - **Prepared INSERT**
- **Shared UI:** Bootstrap **Navbar with search**, gradient footer, site CSS (`assets/css/styles.css`)
- **Security / hygiene:** output escaping via `htmlspecialchars`, uploaded image directory ignored by Git

## Tech Stack
- PHP 8.x (XAMPP on Windows), Apache, MySQL/MariaDB
- Bootstrap 5, Google Fonts (Inter), Material Symbols
- MySQLi with prepared statements, HTML5/CSS3/JS

## Project Structure
