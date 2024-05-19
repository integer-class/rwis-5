CREATE DATABASE IF NOT EXISTS simwarga;

USE simwarga;

CREATE TABLE wealth_data (
    wealth_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT,
    job VARCHAR(255),
    income VARCHAR(255),
);

CREATE TABLE asset_data (
    asset_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_name VARCHAR(255),
);

CREATE TABLE health_data (
    health_id INT AUTO_INCREMENT PRIMARY KEY,
    blood_type VARCHAR(255),
    weight VARCHAR(255),
    height VARCHAR(255),
    disability VARCHAR(255),
    disease VARCHAR(255),
);

CREATE TABLE family_data (
    family_id INT AUTO_INCREMENT PRIMARY KEY,
    family_card_number VARCHAR(255),
    family_head_name VARCHAR(255),
    address VARCHAR(255),
    rt VaRCHAR(2),
    rw VARCHAR(2),
    village VARCHAR(255),
    sub_district VARCHAR(255),
    city VARCHAR(255),
    province VARCHAR(255),
    postal_code VARCHAR(255),
);

CREATE TABLE citizen_data (
    citizen_data_id INT AUTO_INCREMENT PRIMARY KEY,
    family_id INT,
    health_id INT,
    wealth_id INT,
    name VARCHAR(255),
    gender ENUM ('L', 'P'),
    marital_status ENUM ('Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati'),
    birth_date DATE,
    birth_place VARCHAR(255),
    religion VARCHAR(255),
    address_ktp VARCHAR(255),
    address_domisili VARCHAR(255),
);

CREATE TABLE citizen_user_data (
    citizen_user_id INT AUTO_INCREMENT PRIMARY KEY,
    citizen_data_id INT,
    nik VARCHAR(255),
    password VARCHAR(255),
    level ENUM ('RT', 'RW', 'Citizen') DEFAULT 'Citizen',
)


INSERT INTO citizen_user_data (citizen_data_id, nik, password, level) VALUES (NULL, '1234567890', 'admin', 'RW');

SELECT * FROM asset_data;
