# Canvas 01
###### tag: `canvas`
---

### 建立畫布
```javascript
var cvs = document.getElementById("cvs");
var ctx = cvs.getContext("2d");
```

---

### Fill 填滿
- fillStyle 填滿樣式
- globalAlpha 透明度
- fillRect 畫填滿矩形

---

### Stroke 描邊
- strokeStyle 線框樣式
- strokeRect 畫線框矩形

---

### Path 路徑
可製作較複雜的圖形
1. beginPath() 開始繪製
2. moveTo() 移動到當前所在位置
3. lineTo() 拉線到指定位置
4. closePath() 關閉路徑
5. stroke() 描邊
6. fill() 填滿

---