CREATE DATABASE staff_management;
USE staff_management;

CREATE TABLE department (
  department_id INT AUTO_INCREMENT PRIMARY KEY,
  department_name VARCHAR(100),
  location VARCHAR(100)
);

CREATE TABLE staff (
  staff_id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  department_id INT,
  salary DECIMAL(10,2),
  hire_date DATE,
  FOREIGN KEY (department_id) REFERENCES department(department_id)
);

CREATE TABLE performance (
  perf_id INT AUTO_INCREMENT PRIMARY KEY,
  staff_id INT,
  rating INT,
  review_date DATE,
  FOREIGN KEY (staff_id) REFERENCES staff(staff_id)
);
