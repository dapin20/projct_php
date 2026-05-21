-- Database untuk Tugas Mandiri Modul 18
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    level ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE berita (
    id INT PRIMARY KEY AUTO_INCREMENT,
    judul VARCHAR(255) NOT NULL,
    isi TEXT NOT NULL,
    foto VARCHAR(255),
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert data dummy
INSERT INTO users (username, password, email, level) VALUES
('admin', '$2y$10$7K0z3Z8L2.C6n1.M9p8x.eK0z3Z8L2.C6n1.M9p8x.eK0z3Z8L2C', 'admin@example.com', 'admin'),
('user1', '$2y$10$7K0z3Z8L2.C6n1.M9p8x.eK0z3Z8L2.C6n1.M9p8x.eK0z3Z8L2C', 'user1@example.com', 'user'),
('user2', '$2y$10$7K0z3Z8L2.C6n1.M9p8x.eK0z3Z8L2.C6n1.M9p8x.eK0z3Z8L2C', 'user2@example.com', 'user');

INSERT INTO berita (judul, isi, user_id) VALUES
('Berita Pertama', 'Ini adalah berita pertama dari aplikasi kami', 1),
('Berita Kedua', 'Ini adalah berita kedua yang dibuat oleh user', 2),
('Berita Ketiga', 'Berita ketiga berisi informasi penting', 3);
