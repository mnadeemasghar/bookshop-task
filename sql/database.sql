CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);

INSERT INTO users (username, password_hash, role) VALUES
('user1', '$2y$10$BFlzoCgGy0OsnAnRPkdDnOEbyi/w04cKZKES0cviGZwHNeoZclbfq', 'user'),
('user2', '$2y$10$BFlzoCgGy0OsnAnRPkdDnOEbyi/w04cKZKES0cviGZwHNeoZclbfq', 'user');

INSERT INTO users (username, password_hash, role) VALUES
('admin', '$2y$10$BFlzoCgGy0OsnAnRPkdDnOEbyi/w04cKZKES0cviGZwHNeoZclbfq', 'admin');