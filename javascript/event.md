# Event

```html
<div id="circle" onclick="myClick(event);"></div>
```
```javascript
function myClick(e) {
  console.log(e);
}
```

===

##### 鍵盤事件：

altKey  按住alt鍵時

shiftKey

ctrlKey

metaKey

===

#### x y 事件

clientX,clientY

pageX,pageY

screenX,screenY

layerX,layerY

offsetX,offsetY

===

#### 目標

target

currentTarget

===

#### 監聽事件

```javascript
document.getElementById("element").addEventListener("click", function(e) {
  console.log(e.target);
  e.stopPropagation(); //防止目前 Dom Tree 的上一層事件
  e.stopImmediatePropagation(); //防止全部 Dom Tree 事件  
})
```