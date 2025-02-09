-- Security & User Management
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE SET NULL
);

-- Inventory Management
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category_id INT,
    size VARCHAR(50),
    color VARCHAR(50),
    fabric_type VARCHAR(100),
    barcode VARCHAR(100) UNIQUE,
    price DECIMAL(10,2),
    stock_quantity INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    raw_material_type VARCHAR(255),
    quantity INT DEFAULT 0,
    warehouse_location VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Sales & Order Management
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE,
    phone VARCHAR(50),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE sales_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Pending', 'Processing', 'Completed', 'Cancelled') DEFAULT 'Pending',
    total_amount DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
);

CREATE TABLE sales_order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2),
    total_price DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES sales_orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    payment_method ENUM('Cash', 'Bank Transfer', 'PayPal', 'Credit Card'),
    payment_status ENUM('Pending', 'Completed', 'Failed') DEFAULT 'Pending',
    amount DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES sales_orders(id) ON DELETE CASCADE
);

CREATE TABLE returns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    return_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reason TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES sales_orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Reporting & Analytics
CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_type VARCHAR(255),
    report_data TEXT,
    generated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Audit Logs for Security
CREATE TABLE audit_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    action TEXT NOT NULL,
    log_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

--Audit output
INSERT INTO audit_logs (user_id, action) 
VALUES (3, 'Updated stock quantity for product ID 15');


SELECT * FROM audit_logs WHERE user_id = 3 ORDER BY log_time DESC;

--Report output
INSERT INTO reports (report_type, report_data) 
VALUES ('Sales Summary', '{"total_sales": 50000, "best_selling_product": "T-Shirts"}');


SELECT * FROM reports WHERE report_type = 'Sales Summary';




-- CREATE TABLE users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) NOT NULL,
--     email VARCHAR(255) UNIQUE NOT NULL,
--     password VARCHAR(255) NOT NULL,
--     role_id INT,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
--     FOREIGN KEY (role_id) REFERENCES roles(id)
-- );

-- -- Role 
-- CREATE TABLE roles (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) UNIQUE NOT NULL,
--     description TEXT
-- );

-- -- role base permission table 
-- CREATE TABLE permissions (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) UNIQUE NOT NULL,
--     description TEXT
-- );
-- -- product table 
-- CREATE TABLE products (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) NOT NULL,
--     description TEXT,
--     price DECIMAL(10, 2) NOT NULL,
--     category VARCHAR(255),
--     size VARCHAR(255),
--     color VARCHAR(255),
--     fabric_type VARCHAR(255),
--     stock_quantity INT DEFAULT 0,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- );
-- --inventory 
-- CREATE TABLE inventory (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     product_id INT NOT NULL,
--     raw_material_type VARCHAR(255),
--     quantity INT DEFAULT 0,
--     warehouse_location VARCHAR(255),
--     FOREIGN KEY (product_id) REFERENCES products(id)
-- );
-- -- Sales Orders Table (To store customer orders)
-- CREATE TABLE sales_orders (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     customer_id INT NOT NULL,
--     order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     status VARCHAR(50) DEFAULT 'Pending',
--     total_amount DECIMAL(10, 2),
--     FOREIGN KEY (customer_id) REFERENCES customers(id)
-- );
-- --  salse detail 
-- CREATE TABLE sales_order_details (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     order_id INT NOT NULL,
--     product_id INT NOT NULL,
--     quantity INT NOT NULL,
--     price DECIMAL(10, 2),
--     total_price DECIMAL(10, 2),
--     FOREIGN KEY (order_id) REFERENCES sales_orders(id),
--     FOREIGN KEY (product_id) REFERENCES products(id)
-- );

-- -- customer 
-- CREATE TABLE customers (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) NOT NULL,
--     email VARCHAR(255) UNIQUE,
--     phone VARCHAR(50),
--     address TEXT,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );
-- --payment 
-- CREATE TABLE payments (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     order_id INT NOT NULL,
--     payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     payment_method VARCHAR(50),
--     payment_status VARCHAR(50),
--     amount DECIMAL(10, 2),
--     FOREIGN KEY (order_id) REFERENCES sales_orders(id)
-- );
-- -- Returns Table (To handle returned orders)
-- CREATE TABLE returns (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     order_id INT NOT NULL,
--     product_id INT NOT NULL,
--     quantity INT NOT NULL,
--     return_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     reason TEXT,
--     FOREIGN KEY (order_id) REFERENCES sales_orders(id),
--     FOREIGN KEY (product_id) REFERENCES products(id)
-- );
-- --report table
-- CREATE TABLE reports (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     report_type VARCHAR(255),
--     report_data TEXT,
--     generated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );



