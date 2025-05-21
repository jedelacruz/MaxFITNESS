-- Create the database
CREATE DATABASE IF NOT EXISTS maxfitness;
USE maxfitness;

-- Users table
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL, -- This will serve as the contact number
  address TEXT, -- New column for user address
  is_admin BOOLEAN DEFAULT FALSE, -- To identify admin users
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Timestamp for user registration
);

-- Add address column to users table if it doesn't exist (alternative to modifying CREATE TABLE directly if table already exists)
-- ALTER TABLE users ADD COLUMN address TEXT AFTER phone;

-- Products table
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  category VARCHAR(100), -- e.g., 'Arms', 'Back', 'Cardio', 'Chest', 'Core', 'Legs', 'Shoulders'
  image_url VARCHAR(255), -- Path or URL to the product image
  stock_quantity INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Orders table
CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  total_amount DECIMAL(10, 2) NOT NULL,
  order_status VARCHAR(50) DEFAULT 'Pending', -- e.g., Pending, Processing, Shipped, Delivered, Cancelled
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  shipping_address TEXT,
  billing_address TEXT, -- Can be the same as shipping or different
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE -- Link to the user who placed the order
);

-- Order Items table (to link products to orders)
CREATE TABLE IF NOT EXISTS order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  price_at_purchase DECIMAL(10, 2) NOT NULL, -- Price of the product at the time of order
  FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE, -- Link to the specific order
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE RESTRICT -- Link to the specific product
);

-- Messages table (for contact form submissions)
CREATE TABLE IF NOT EXISTS messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20), -- Optional
  subject VARCHAR(255),
  message TEXT NOT NULL,
  received_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  is_read BOOLEAN DEFAULT FALSE -- For admin to track read/unread messages
);

-- Add Admin User
INSERT INTO users (name, email, password, phone, is_admin) VALUES ('Admin User', 'admin@example.com', 'admin123', '1234567890', TRUE);

-- Example of how to add a product (run this manually or via an admin interface)
-- INSERT INTO products (name, description, price, category, image_url, stock_quantity) VALUES 
-- ('EZ Curl Bar', 'Solid steel with chrome finish for bicep curls and tricep extensions.', 69700.00, 'Arms', 'images/EZ-Curl-Bar.png', 10),
-- ('Adjustable Dumbbell', 'Adjustable from 5-90 lbs, versatile for home gyms.', 42000.00, 'Arms', 'images/Adjustable-Dumbbell.png', 15);

-- Static Product Inserts
INSERT INTO products (name, description, price, category, image_url, stock_quantity) VALUES
('EZ Curl Bar', 'Length: ~47 inches (120 cm); Weight: ~18–25 lbs (8–11 kg); Sleeve Diameter: 2 inches (fits Olympic plates); Grip Diameter: ~28 mm; Material: Solid steel with chrome finish; Knurling: Medium knurl on grip areas for secure handling; Load Capacity: Up to 400 lbs (181 kg); Bar Type: Olympic EZ Curl Bar; Use: Bicep curls, tricep extensions, and upper-body exercises', 69700.00, 'Arms', 'images/EZ-Curl-Bar.png', 10),
('Adjustable Dumbbell', 'Type: Adjustable (dial or selector-based); Material: Metal plates with plastic/metal adjustment system; Weight Range: 5–90 lbs, adjustable in 2.5–5 lb increments; Size: Approx. 14–17" L, 6–8" W/H; Best For: Chest flyes, presses, shoulder and arm exercises; Ideal Use: Compact and versatile for home gyms', 42000.00, 'Arms, Chest, Shoulders', 'images/Adjustable-Dumbbell.png', 10),
('Cable Machine Attachment Set', 'A versatile set including tricep rope, straight and curl bars, V-bar, double D handle, single handles, ankle straps, and carabiners; Ideal for full-body workouts like pushdowns, curls, rows, lat pulldowns, and leg exercises; Made from heavy-duty steel with comfortable grips; Compatible with most cable machines', 79700.00, 'Arms', 'images/Cable-Attachment-Set.png', 10),
('Freestanding Power Rack with Pull-Up Bar', 'Type: Freestanding Power Rack with integrated Pull-Up Bar; Construction: Heavy-duty steel frame with reinforced joints; Pull-Up Bar: Dual-bar system for varied grip options; Attachments: Includes dip handles and J-hooks for barbell exercises; Adjustability: Multiple height settings for pull-up and barbell positions; Stability: Wide base for stability during intense workouts; Use Case: Ideal for pull-ups, chin-ups, dips, squats, and bench presses', 15990.00, 'Back', 'images/Pull-Up-Bar.png', 10),
('Lat Pulldown & Low Row Combo Machine', 'Type: Dual-function (lat pulldown + seated row); Resistance: Uses standard/Olympic weight plates; Build: Steel frame, padded seat and thigh support; Features: High and low pulley, footplates for rows; Use: Ideal for home or small gyms for back and arm training', 30400.00, 'Back', 'images/Lat-Pulldown.png', 10),
('Seated Row Machine (Plate Loaded)', 'Purpose: Builds upper/mid-back muscles (lats, rhomboids, traps, biceps); Construction: Heavy-duty steel frame, padded seat & chest pad; Resistance: Plate-loaded (fits Olympic plates); Capacity: Up to 600–700 lbs; Features: Adjustable seat, rotating handles, compact design; Size: Approx. 60" L x 40" W x 50" H; Weight: Around 220–250 lbs', 93000.00, 'Back', 'images/Seated-Row.png', 10),
('Treadmill', 'Wide running belt and sturdy handrails; Digital console: speed, time, distance, calorie tracking; Motor: 1.5–3.5 HP; Speed: 0.8–16 km/h; Weight capacity: 100–150 kg; Foldable, incline settings, shock absorption, Bluetooth', 30100.00, 'Cardio', 'images/Treadmill.png', 10),
('Stationary Bike', 'Spin bike with heavy flywheel for smooth ride; Adjustable seat, handlebars, and pedal straps; LCD display for speed, time, distance, and calories; Weight capacity: ~100–150 kg; Manual knob resistance (magnetic or friction)', 11100.00, 'Cardio', 'images/Stationary-Bike.png', 10),
('Rowing Machine', 'Air resistance with large visible flywheel; Sliding seat and footrests with straps; Digital monitor: time, distance, calories, strokes/min; Heavy-duty steel frame, foldable/compact design; Dimensions: 2.4 meters; Weight capacity: 100–150 kg', 12100.00, 'Cardio', 'images/Rowing-Machine.png', 10),
('Barbell with Bench Press Station', 'Bench Type: Flat bench with padded vinyl surface; Barbell: Olympic 7-ft bar (~45 lbs / 20.4 kg); Weight Plates: Rubber-coated, approx. 160–170 lbs total; Rack: Steel frame with fixed-height J-hooks; Primary Use: Barbell bench press; Best For: Chest, triceps, shoulders', 22999.00, 'Chest', 'images/chest-bench-press.png', 10),
('Cable Machine', 'Type: Dual adjustable pulley (functional trainer); Weight Stack: Two stacks, ~100–200 lbs each; Adjustment: Vertical pulleys for multiple angles; Attachments: Single-handle grips (others optional); Best For: Flyes, presses, curls, triceps, core; Design: Compact, open frame for versatile use', 75900.00, 'Chest, Core', 'images/Cable-Machine.png', 10),
('Ab Wheel', 'Builds and tones core muscles (rectus abdominis, obliques, transverse abdominis); Engages shoulders, arms, and back; Main use: Rollouts for core stability and strength; Portable, compact, and easy to use at home or gym', 900.00, 'Core', 'images/Ab-Wheel.png', 10),
('Roman Chair', 'Materials: Steel frame, foam padding, non-slip foot holders; Dimensions: Approx. 45" (L) × 24" (W) × 36" (H); Adjustability: Adjustable thigh support; Weight Capacity: 250–300 lbs (113–136 kg)', 3100.00, 'Core', 'images/Roman-Chair.png', 10),
('Squat Rack with Barbell', 'Material: Heavy-duty steel frame; Dimensions: ~84" H × 48" W × 50" D; Weight Capacity: 700–1,000 lbs; Barbell Compatibility: Olympic (2" sleeve diameter); Includes: J-hooks, spotter arms, pull-up bar; Finish: Powder-coated; Use Cases: Squats, bench/overhead press, rack pulls, pull-ups', 220000.00, 'Legs', 'images/Squat-Rack-Barbell.png', 10),
('Leg Press Machine', 'Type: 45° Leg Press (Plate-Loaded); Material: Powder-coated steel frame; Footplate: Non-slip diamond steel; Seat: Adjustable, padded; Safety: Dual safety catches; Weight Storage: 4–6 Olympic plate holders; Max Weight Capacity: 1,000–1,200 lbs; Dimensions: 87" L × 57" W × 52" H', 120000.00, 'Legs', 'images/Leg-Press-Machine.png', 10),
('Hamstring Curl / Leg Extension Machine', 'Functions: Leg extensions and hamstring curls; Build: Steel frame, padded seat/rollers; Weight Stack: ~200 lbs, 10 lb increments; Dimensions: ~60" x 40" x 55"; Net Weight: ~320 lbs; User Capacity: Up to 350 lbs', 55000.00, 'Legs', 'images/Hamstring-Curl.png', 10),
('Smith Machine', 'Size: ~7 ft tall, ~4–5 ft wide, ~6.5 ft deep; Weight Capacity: Bar holds 600–1,000 lbs; Bar Weight: 15–25 lbs (some are counterbalanced); Material: Heavy-duty steel with powder coating; Key Features: Guided barbell, safety lockouts, plate pegs, adjustable stops', 122000.00, 'Shoulders', 'images/Smith-Machine.png', 10),
('Cable Tower', 'Weight Stack: Up to 90 kg (198 lbs); Pulley System: Adjustable height, smooth multi-pulley resistance; Attachments: Dual stirrup handles, compatible with other accessories; Design: Compact – 210cm H, 60cm W, 70cm D', 70900.00, 'Shoulders', 'images/Cable-Tower.png', 10);

-- I ALTERED THIS AND ADD AN ADDRESS COLUMN TO THE USERS TABLE
-- ALTER TABLE users ADD COLUMN address TEXT;