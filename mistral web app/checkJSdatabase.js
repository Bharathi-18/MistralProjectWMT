import mysql;

// var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "wmt"
});

con.connect(function(err) {
  if (err) throw err;
  //Select all customers and return the result object:
  con.query("SELECT * FROM usertable", function (err, result, fields) {
    if (err) throw err;
    console.log(result[1]['name']);
    console.log(result[1]['id']);
  });
});
