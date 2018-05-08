var express = require('express');
var router = express.Router();

/* GET users listing. */
// router.get('/users', function(req, res, next) {
//   res.send('Users !!');
// });

// router.get('/users/:name', function(req, res) {
//   res.send('Hello ' + req.parames.name + ' !!');
// });

var users = [
  {id: 1, name: "Anita", email: "anita@gmail.com", age: 27},
  {id: 2, name: "Joy", email: "Joy@gmail.com", age: 35},
  {id: 3, name: "Mercy", email: "mercy@gmail.com", age: 55},
  {id: 4, name: "Danny", email: "danny@gmail.com", age: 28}
];

router.route('/users')
.get(function (req, res) {
  res.json(users);
})
.post(function (req, res) {
  var _user = req.body;
  users.push(_user);
  res.json({"message": "Add Success!!"});
});

router.route('/users/:id')
.get(function (req, res) {
  //res.send('Hello ' + req.params.name + ' !!');
  var _user = users.filter(function(user){
    return user.id == req.params.id;
  });
  res.json(_user);
})
.put(function (req, res) {
  var _user = req.body;
  var index = 0;
  users.find(function(user, i){
    if (user.id == req.params.id) {
      index = i;
      return;
    }
  });
  users.splice(index, 1, _user);
  res.json({"message": "Edit Success!!"});
}) //修改資料
.delete(function (req, res) {
  users = users.filter(function(user){
    return user.id != req.params.id;
  });
  res.json({"message": "Delete Success!!"});
}); //刪除資料

module.exports = router;
