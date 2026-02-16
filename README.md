🍰 Bakery Website – Full Stack Dynamic Web Application

A modern, fully responsive, and dynamic Bakery Website with Online Ordering System built using:

HTML5

CSS3

Bootstrap 5

JavaScript (ES6)

PHP (Core PHP)

MySQL

This project allows customers to browse bakery products, add items to cart, place online orders, and contact the bakery directly via WhatsApp.

🚀 Features
🛍️ Customer Side

Responsive modern UI

Dynamic product listing from database

Category filtering (Cakes, Pastries, Cookies, Breads, Custom Cakes)

Add to Cart functionality

Cart management (update quantity, remove items)

Checkout system

Cash on Delivery / Bank Transfer options

WhatsApp floating contact button

Contact form

Google Maps integration

🔐 Admin Panel

Secure admin login

Add / Edit / Delete products

Image upload functionality

View customer orders

Update order status (Pending, Preparing, Delivered)

Dashboard statistics:

Total Products

Total Orders

Total Revenue

🏗️ Tech Stack
Frontend

HTML5

CSS3 (Flexbox & Grid)

Bootstrap 5

JavaScript (ES6)

Backend

PHP (Core PHP – no framework)

MySQL (Database)

PDO / MySQLi

📂 Project Structure
bakery-website/
│
├── index.php
├── about.php
├── products.php
├── cart.php
├── checkout.php
├── contact.php
│
├── admin/
│   ├── login.php
│   ├── dashboard.php
│   ├── add-product.php
│   ├── manage-products.php
│   ├── orders.php
│
├── includes/
│   ├── db.php
│   ├── header.php
│   ├── footer.php
│
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
│
└── database.sql

🗄️ Database Structure
Tables:

products

orders

order_items

users (optional for registration)

Import the provided database.sql file into phpMyAdmin.

⚙️ Installation Guide (Local Setup)
Step 1: Install Local Server

Download and install:

XAMPP / WAMP / Laragon

Step 2: Clone Repository
git clone https://github.com/your-username/bakery-website.git

Step 3: Move Project

Place project folder inside:

htdocs/ (for XAMPP)

Step 4: Setup Database

Open phpMyAdmin

Create new database (e.g., bakery_db)

Import database.sql

Step 5: Configure Database Connection

Open:

includes/db.php


Update credentials:

$host = "localhost";
$user = "root";
$pass = "";
$db   = "bakery_db";

Step 6: Run Project

Open in browser:

http://localhost/bakery-website

💬 WhatsApp Integration

Floating WhatsApp button is integrated using:

https://wa.me/92XXXXXXXXXX


It opens WhatsApp chat with a pre-filled message:

Hello, I want to order from your bakery.

🔐 Security Features

Password hashing

Form validation (Frontend + Backend)

SQL Injection protection (Prepared Statements)

Session-based cart system

Secure admin authentication

📱 Responsive Design

Mobile-first layout

Optimized images

Collapsible navigation bar

Clean typography and spacing

Smooth animations

🎨 UI Highlights

Soft bakery theme colors

Modern product cards

Hover effects

Sticky navigation

Scroll-to-top button

🔮 Future Improvements

Online payment gateway (Stripe / PayPal)

Email notifications

Customer login & order tracking

Product reviews system

Discount coupon system

Multi-language support

👨‍💻 Author

Developed by: [Your Name]
Role: Full Stack Web Developer

📄 License

This project is open-source and free to use for educational purposes.
