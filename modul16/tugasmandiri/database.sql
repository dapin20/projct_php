-- Tabel untuk User (Login)
CREATE TABLE IF NOT EXISTS tb_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    level VARCHAR(20) NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel untuk Data Siswa Ekstrakurikuler
CREATE TABLE IF NOT EXISTS tb_siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(10) NOT NULL,
    tgl_lahir DATE NOT NULL,
    kota VARCHAR(50) NOT NULL,
    jenis_kelamin VARCHAR(15) NOT NULL,
    hobi VARCHAR(100) NOT NULL,
    ekskul VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert data user sample (username: admin, password: admin123)
INSERT INTO tb_user (username, password, level) VALUES 
('admin', '$2y$10$slYQmyNdGzin7olVZeVTm.IjZAgcg7EEEE7Ye0Yb5PnqB5xvVe7.u', 'admin');
-- Insert data user sample (username: user, password: user123)
INSERT INTO tb_user (username, password, level) VALUES 
('user', '$2y$10$SlYQmyNdGzin7olVZeVTm.IjZAgcg7EEEE7Ye0Yb5PnqB5xvVe7.u', 'user');
