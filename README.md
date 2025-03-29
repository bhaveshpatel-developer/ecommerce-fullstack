# 🛒 Laravel TALL Stack eCommerce

A **full-stack eCommerce application** built with Laravel, Livewire, Tailwind CSS, and Filament for the admin panel. This project provides a minimal but functional online store with product management, category filtering, and an order system.

## 🚀 Features

### **Frontend (Webshop)**
- 🏪 **Product Listing** – Display products with images, prices, and categories.
- 🔍 **Search & Filters** – Search for products and filter by categories.
- 🛍️ **Order System** – Simple order form for customers.
- 📱 **Responsive UI** – Built with Tailwind CSS for a modern mobile-friendly design.

### **Admin Dashboard (Filament)**
- 📦 **Manage Products** – Create, update, and delete products.
- 🏷️ **Manage Categories** – Assign multiple categories to products.
- 📑 **Order Management** – View and track customer orders.

---

## 🛠️ Tech Stack
- **Laravel 10** – Backend framework
- **Livewire** – Reactive UI components
- **Tailwind CSS** – Styling framework
- **Alpine.js** – Lightweight JavaScript framework
- **Filament** – Admin panel

---

## 📂 Installation

### **1️⃣ Clone the repository**
```bash
git clone https://github.com/bhaveshpatel-developer/ecommerce-fullstack
cd ecommerce-fullstack
```

### **2️⃣ Install dependencies**
```bash
composer install
npm install && npm run dev
```

### **3️⃣ Configure environment**
```bash
cp .env.example .env
php artisan key:generate
```
Update the `.env` file with your database credentials.

### **4️⃣ Set up database**
```bash
php artisan migrate --seed
```

### **5️⃣ Run the application**
```bash
php artisan serve
```
Now visit [http://127.0.0.1:8000/](http://127.0.0.1:8000/) for front end and [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin) for the admin panel in your browser.
