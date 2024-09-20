const mysql = require('mysql2/promise');

// Create a connection pool
const pool = mysql.createPool({
  host: '127.0.0.1',
  user: 'root', // default XAMPP MySQL username
  password: '', // default XAMPP MySQL password (empty)
  database: 'CSWeb',
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0
});

// Test the connection
async function testConnection() {
  try {
    const connection = await pool.getConnection();
    console.log('Successfully connected to the database.');
    connection.release();
  } catch (error) {
    console.error('Error connecting to the database:', error);
  }
}

// Function to execute queries
async function query(sql, params) {
  try {
    const [results] = await pool.execute(sql, params);
    return results;
  } catch (error) {
    console.error('Error executing query:', error);
    // throw error;
  }
}

async function checkDatabaseAndCreateTable() {

  query('CREATE DATABASE IF NOT EXISTS CSWeb');
  query('CREATE TABLE IF NOT EXISTS csweb.payment (id VARCHAR(36) PRIMARY KEY NOT NULL , total DECIMAL NULL , method VARCHAR(10) , `bank` VARCHAR(255) NULL, `number` VARCHAR(255) NULL, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, `post_link` VARCHAR(255) NULL,`redirect_link` VARCHAR(255) NULL );');
  query('CREATE TABLE IF NOT EXISTS csweb.`delivery` ( `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT, `name` VARCHAR(255) NULL,  `status` int(11) NOT NULL DEFAULT 1, created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP);');
  query('CREATE TABLE IF NOT EXISTS csweb.`message` (`id` int(11) NOT NULL,`phone` varchar(255) DEFAULT NULL,`message` varchar(1000) DEFAULT NULL,`created_at` DATETIME NULL DEFAULT current_timestamp());');
  /* delivery status 1= created, 2=assigned, 3= ongoing, 4= reach
   */

}

// Example function to get all records from a table
async function getAllRecords(tableName) {
  const sql = `SELECT * FROM ${tableName}`;
  return await query(sql);
}

// Example function to insert a record into a table
async function insertRecord(tableName, data) {
  const keys = Object.keys(data);
  const values = Object.values(data);
  const sql = `INSERT INTO ${tableName} (${keys.join(', ')}) VALUES (${keys.map(() => '?').join(', ')})`;
  return await query(sql, values);
}

module.exports = {
  testConnection,
  query,
  getAllRecords,
  insertRecord,
  checkDatabaseAndCreateTable
};