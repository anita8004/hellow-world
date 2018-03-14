# Attribute 屬性

#### data-*  自訂屬性

```html
<div class="ball" data-name="baseball"></div>
```

```javascript
element.getAttribute("屬性名稱");  //取得屬性
element.setAttribute("屬性名稱",屬性值); //設定屬性
element.hasAttribute("屬性名稱");  //判斷是否擁有該屬性，回傳布林值
element.removeAttribute("屬性名稱");  //移除屬性
```

#### 範例
```javascript
    var ball = document.getElementsByClassName("ball")[0];
    ball.getAttribute("data-name"); //baseball
    ball.setAttribute("data-size", 50);
    //<div class="ball" data-name="baseball" data-size="50"></div>
```