-- Create Database
CREATE DATABASE wedding_shop;

-- Enter Database
USE wedding_shop;

-- Create customers table
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    contact_number VARCHAR(20),
    password_hash VARCHAR(255) NOT NULL,
    street_address VARCHAR(255),
    city VARCHAR(100),
    province VARCHAR(100),
    barangay VARCHAR(100),
    zip_code VARCHAR(10),
    gender VARCHAR(20),
    date_of_birth DATE,
    profile_img VARCHAR(255),
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create products table
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    material VARCHAR(100),
    image_path VARCHAR(255),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert placeholder products
INSERT INTO products (product_name, description, price, material, image_path) VALUES
('Classic Wedding Dress', 'Elegant white wedding dress with intricate lace details and flowing train', 2500.00, 'Silk and Lace', 'src/img/p-1.webp'),
('Modern Bridal Gown', 'Contemporary wedding dress with clean lines and minimalist design', 2200.00, 'Satin and Chiffon', 'src/img/p-2.jpg'),
('Vintage Style Dress', 'Retro-inspired wedding dress with vintage charm and classic silhouette', 2800.00, 'Tulle and Organza', 'src/img/p-3.webp'),
('Princess Ball Gown', 'Dramatic ball gown with full skirt and sparkling embellishments', 3200.00, 'Taffeta and Beads', 'src/img/p-4.webp'),
('Bohemian Wedding Dress', 'Flowing boho-style dress perfect for outdoor ceremonies', 1900.00, 'Chiffon and Lace', 'src/img/p-5.webp'),
('Mermaid Wedding Gown', 'Fitted mermaid silhouette with dramatic train and elegant details', 2600.00, 'Crepe and Lace', 'src/img/p-6.webp'),
('Cathedral Length Veil', 'Traditional cathedral length veil with delicate lace trim', 350.00, 'Tulle and Lace', 'src/img/pp-1.webp'),
('Fingertip Veil', 'Classic fingertip length veil with pearl accents', 180.00, 'Tulle and Pearls', 'src/img/pp-2.webp'),
('Birdcage Veil', 'Vintage-inspired birdcage veil with decorative comb', 120.00, 'Net and Rhinestones', 'src/img/pp-3.jpg'),
('Blusher Veil', 'Simple blusher veil for traditional wedding ceremonies', 95.00, 'Tulle', 'src/img/pp-4.jpg'),
('Jeweled Hair Comb', 'Elegant hair comb with crystal and pearl embellishments', 85.00, 'Metal and Crystals', 'src/img/pp-5.jpg'),
('Pearl Hair Pins', 'Set of decorative pearl hair pins for bridal styling', 45.00, 'Metal and Pearls', 'src/img/pp-6.webp'),
('Crystal Tiara', 'Sparkling crystal tiara for the perfect bridal look', 150.00, 'Metal and Crystals', 'src/img/pp-7.webp'),
('Flower Crown', 'Delicate flower crown with silk flowers and greenery', 75.00, 'Silk Flowers and Wire', 'src/img/pp-8.webp'),
('Bridal Belt', 'Elegant bridal belt with crystal and pearl details', 120.00, 'Satin and Crystals', 'src/img/pp-9.jpg'),
('Wedding Shoes', 'Comfortable and stylish wedding shoes with pearl accents', 180.00, 'Leather and Pearls', 'src/img/pp-10.webp');

-- Create orders table
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10,2) NOT NULL,
	status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    shipping_address TEXT,
    payment_method VARCHAR(50),
    notes TEXT,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) ON DELETE CASCADE
);

-- Create order_items table
CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    unit_price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);


