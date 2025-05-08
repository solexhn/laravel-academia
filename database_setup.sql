-- Create the database
CREATE DATABASE IF NOT EXISTS solexhn_academia;

-- Create the user with the specified password
CREATE USER IF NOT EXISTS 'solexhn'@'localhost' IDENTIFIED BY 'password';

-- Grant privileges to the user
GRANT ALL PRIVILEGES ON solexhn_academia.* TO 'solexhn'@'localhost';

-- Refresh privileges
FLUSH PRIVILEGES;

-- Select the database to use
USE solexhn_academia;

-- Note: After creating the database and user, you should run Laravel migrations with:
-- php artisan migrate

