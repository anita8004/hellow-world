# php 筆記
###### tag:`php`,`學習筆記`

### 基礎重點

- 變數以$開頭
- 結尾要加分號
- 單引號內的變數會變成字串
- 引號內的變數可用${a}或{$a}來表達

---

### 連接資料庫&撈資料

```php
$mysqli = new mysqli('主機', '帳號', '密碼', '資料庫名稱'); //連接資料庫
$mysqli->query("SET NAMES utf8"); //設定中文不顯示亂碼
$sql = sprintf("SELECT * FROM `products`"); //sql操作，處理資料
$rs = $mysqli->query($sql); //使用$sql的操作處理$mysqli的資料
$row=$rs->fetch_assoc(); // each提取屬性名稱和數性值
```

參考：[fetch_assoc](http://www.runoob.com/php/func-mysqli-fetch-assoc.html)


---

### fetch_row && fetch_assoc && fetch_array

[[PHP][MySQL] fetch_array與fetch_assoc與fetch_row的比較](http://richarlin.tw/blog/2016/php-mysql-fetch/)

---

### prepare

```php
// prepare and bind
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
// ???各自代表 firstname, lastname, email
$stmt->bind_param("sss", $firstname, $lastname, $email);
// 有多少?就須填入多少個S,後面填入各個變數或值

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute(); //啟動
$stmt->close(); //關閉
```

參考：[prepare](https://www.w3schools.com/php/php_mysql_prepared_statements.asp)

---

### 自訂義常數

```php
define('PI', 3.14159);
echo PI;

```

---

### 判斷是否有值

```php
isset($_GET['a']) //判斷是否取得a的值
```

---

### 轉換成數字

```php
intval()
```

---

### Array
```php
   $ar1 = [2,4,6,8,10];
   $ar1[] = 12; //array_push   
   $ar3 = $ar1; //將陣列複製一份在設定給$ar3
   $ar4 = &$ar1; //直接將陣列設定給$ar4
   //若修改$ar1，$ar4會一起被修改,$ar3不會
```

---

### foreach

```php
$ar2 = [
        "name" => "anita",
        "age" => 27,
        "gender" => "female",
    ];
foreach($ar2 as $k => $v) {
    echo "$k : $v <br>";
}

//name : anita 
//age : 27 
//gender : female 
```

---

### 登入登出

```php
session_start(); //啟用session
session_destroy(); //清空session 較少用
unset($_SESSION['login']); //只清除登入紀錄
header('Location: https://example.com.tw'); //轉向指定網址
```

---

#### header

Send a raw HTTP header

#### session

參考：
[PHP Session 使用介紹，啟用與清除 session](http://www.webtech.tw/info.php?tid=33)

---

### include

- 將b檔案的內容include到a檔案
- 若找不到b檔案會顯示warning
- include_once : 相同檔案只會include一次，效能較低

### require

- 功能同include
- 若找不到b檔案會顯示error
- require_once : 相同檔案只會include一次，效能較低

---

### array_keys($arr1)

取得$arr1的屬性名稱並重組成一個新陣列

[PHP 教程](http://www.runoob.com/php/func-array-keys.html)

---

### sprintf()

[PHP 教程](http://www.runoob.com/php/func-string-sprintf.html)

```php
$element = "Anita";
$text = sprintf("Hello! I'm %s.", $element);
echo $text;
// Hello! I'm Anita.
// %s == 字符串
// %d == 負數、0、正數
```

---

### serialize()

輸出序列化表單值的結果

[serialize](http://www.w3school.com.cn/jquery/ajax_serialize.asp)

---

### json

```javascript
$.post('./path/json.php', {'可放入要傳入的值'}, function(data){}, 'json');
$.get('./path/json.php', {'可放入要傳入的值'}, function(data){}, 'json');
```

---

### strlen()

取得字串長度

[strlen](http://www.wibibi.com/info.php?tid=91)

---

### mb_strlen()

可加入編碼判斷字串長度

[mb_strlen](http://www.wibibi.com/info.php?tid=92)