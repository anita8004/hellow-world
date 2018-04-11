# php 筆記
###### tag:`php`,`學習筆記`

### 基礎重點
- 變數以$開頭
- 結尾要加分號
- 單引號內的變數會變成字串
- 引號內的變數可用${a}或{$a}來表達

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

