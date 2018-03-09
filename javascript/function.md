# Function 函式
函式的宣告有2種方式
例:
```javascript

function ex1() {
  //宣告一個函式，Hoisting會被提升到最前
}

var ex2 = function() {
  //宣告一個變數，Hoisting會被提升到最前，其值為undefined
  //執行到函式所在位置後，才將函式賦值給ex2
}

```

---

### 閉包
建立一個封閉的環境，使其中的區域變數不影響全域變數，也不受全域變數影響
例:
```javascript

var func = function(){
    var a = 0;
    return function(){
        console.log(a);
    }
}

```

---

###立即函式
函式一建立就馬上執行
```javascript
    (function(){
        ...
    })();
```
