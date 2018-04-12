# mySql 筆記

### 安全性設定
檔案：config.ini.php

預設：
```php
$cfg['blowfish_secret'] = 'xampp';
$cfg['Servers'][$i]['auth_type'] = 'config';
$cfg['Servers'][$i]['user'] = 'root';
$cfg['Servers'][$i]['password'] = '';
```

---

開發用(自動登入)：
```php
$cfg['blowfish_secret'] = 'xampp';
$cfg['Servers'][$i]['auth_type'] = 'config';
$cfg['Servers'][$i]['user'] = 'anita'; //設為你設定的使用者名稱
$cfg['Servers'][$i]['password'] = 'admin'; //設為你設定的密碼
```

---

上線後(需要手動登入)：
```php
$cfg['blowfish_secret'] = 'sfjhfu'; //更改為隨意字串
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['user'] = '';
$cfg['Servers'][$i]['password'] = '';
```

---

### 上傳檔案大小設定

檔案：php.ini

預設：
```ini
post_max_size=8M
upload_max_filesize=2M
```
建議最大為32M

---

### sql

- 字串只能用單引號
- DELETE 刪除 、 UPDATE 編輯 、 SET 設定 、 INSERT 插入