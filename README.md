# 🧾 Inventory & Order Management System

A Laravel-based inventory and sales management system with product tracking, category management, order processing, purchase cost calculation, and profit reporting.

---

## 📸 Cover Image
(Add your screenshot/banner here)

---

## ✨ Features

- Product management (stock, purchase price, sell price)
- Category management
- Sales order creation with multiple items
- Purchase cost & profit calculation per order
- Dashboard
- Date filtering for reports
- Expandable order details view
- Responsive admin UI

---

## 🛠 Tech Stack

- Laravel
- Blade
- MySQL
- Vanilla JavaScript

---

## 🚀 Installation

### 1. Clone the repository
<code>git clone https://github.com/me-rana/Inventory-Management-System-Zavisoft.git</code> <br>
<code>cd Inventory-Management-System-Zavisoft</code><br>

### 2. Install dependencies [N.B: Not Required Yet]
<code>composer install</code> <br> 
<code>npm install</code> <br>
<code>npm run build </code>

### 3. Copy environment file
<code>cp .env.example .env</code> <br>
Now update database credentials inside .env. <br>

### 4. Generate app key
<code>php artisan key:generate</code> <br>

### 5. Run migrations
<code>php artisan migrate</code> <br>

### 6. Seed demo data
<code>php artisan db:seed</code> <br>

- This will create:
<ul>
    <li>Demo category</li>
    <li>Sample products </li>
    <li>Admin user account </li>
</ul>

### 7. Run The Application
<code>php artisan db:seed</code> <br>

### 🔐 Default Admin Login
- Login Two Way
- 1. Sanctum (JetStream) 
- 2. Oauth2 (Passport) - Api Login [Sodium Extention Enabled Required] <br>

 ## Procedure: Code Within Project, In Simple
1. User logs into Project A
2. A creates Sanctum token
3. Redirect to Project B with token
4. B asks A to validate token
5. If valid → B logs user in

- Normal Login
<code>
    Email: admin@domain.com
    Password: 012345
</code> <br>

## 📊 System Modules

### 🧱 Products
- Add, edit, and delete products  
- Track stock quantity in real time  
- Store purchase price and selling price for profit calculation  

### 🗂 Categories
- Organize products into categories  
- Support category images for better visual grouping  

### 🧾 Orders
- Create orders with multiple products  
- Automatic subtotal, VAT, and discount calculation  
- Track paid amount and remaining due  
- Expandable order detail view for quick inspection  

### 📈 Reports
- View total revenue from sales  
- Calculate total purchase cost  
- Monitor total profit  
- Filter reports by date range  

### 📁 Project Structure
<code>
app/
 ├── Models/
 ├── Http/Controllers/
database/
 ├── migrations/
 ├── seeders/
resources/views/
routes/
 ├── web.php
 ├── api.php
</code>

## 📄 License

This project is open-source and intended for educational purposes and internal business use.  
You are free to modify and use it according to your needs.

---

## 👨‍💻 Author

Developed as a learning and demonstration project for inventory and sales management systems.  
Designed to showcase product tracking, order processing, and profit reporting features.











