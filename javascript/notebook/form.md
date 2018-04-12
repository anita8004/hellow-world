# Form 表單

### HTML：
```html
<form action="" method="post" name="form1" onsubmit="return myForm();">
    <div class="form-group">
        <label for="name">姓名：</label>
        <input type="text" name="name" id="name" placeholder="Please input name">
    </div>    
    <div class="form-group">
        <select name="se" id="se">
        <option value="請選擇">請選擇</option>
        </select>
    </div>
    <div class="form-group">
        <input type="checkbox" name="cb" id="cb">
        <label for="cb">請選取</label>
    </div>
    <div class="form-group">
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <button type="submit">送出</button>
        <button type="reset">重置</button>
    </div>
</form>
```

### 選取表單

```javascript
document.forms  //列出所有表單
document.forms[0]
document.forms[form1]
document.form1

document.form1.elements //列出form1表單的所有元素
document.form1.name
```

### JAVASCRIPT

```javascript
function myForm() {
  if (!document.form1.name.value){
      alert("請填入姓名!")
      return false;
  }
  return true;
}
```

### regex

規則請看講義22頁

[regex 101](https://regex101.com/) regex測試網站


### 

```javascript
trim() //將字串前後的空白刪除
split("-") //以-為分隔，將字串切割
join("") //將字串拼合
var email_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
email_regex.test(email) // email為表單填入的內容  測試內容是否符合email規則
```