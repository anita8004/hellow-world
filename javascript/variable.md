# variable 變數

---

### 全域與區域變數
在function內宣告的變數，為區域變數，只能作用於區域中
```javascript
var a = 10; //全域變數
var b = 20;
function aaa(){
    var a = 100; //在函式內宣告一個新變數(區域變數)，此a不等於全域的a
    b = 200; //直接改變全域變數
}
aaa();
console.log(a); //10
console.log(b); //200
```