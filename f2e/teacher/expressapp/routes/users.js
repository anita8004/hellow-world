var express = require('express');
var router = express.Router();
var mysql = require("mysql");

//建立連線
var connection = mysql.createConnection({
  host:'localhost',
  user:'root',
  password:'admin',
  database:'test'
});
// connection.connect();
connection.connect(function(err) {
  if (err) {
    console.error("error connecting: " + err.stack);
    return;
  }
  console.log("connected as id " + connection.threadId);
});


router
  .route("/users")
  .get(function(req, res) {//讀所有資料
      connection.query("select * from users",function(error,rows){
        if (error) throw error;
        res.json(rows);
      })
  }) 
  .post(function(req, res) {//新增資料
     var _user = req.body;
    connection.query("insert into users set ?", _user,function(error){
       if (error) throw error;
       res.json({ message: "新增成功" });
    })
  }); 
router
  .route("/users/:id")
  .get(function(req, res) {
    connection.query("select * from users where id=?", req.params.id,function(error,row){
      if(error) throw error;
      res.json(row);
    });
  
  }) 
  .put(function(req, res) {//修改資料
       var _user = req.body;  
       var id = req.params.id;
       connection.query("update users set ? where id=?",[_user, id],function(error){
          if(error) throw error;
          res.json({ message: "修改成功" });
       })

  }) 
  .delete(function(req, res) {//刪除資料
    connection.query("delete from users where id=?",req.params.id,function(error){
      if(error) throw error;
      res.json({ message: "刪除成功" });
    })
  }); 




module.exports = router;
