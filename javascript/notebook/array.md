# Array 陣列

---

### 重點整理
1. 陣列的內容可以是非同型的。
2. 陣列繼承自物件，所以陣列的索引值也可以使用字串，但未免混淆，建議不要那麼做，需使用屬性名稱時就用物件就好。
3. 每一個陣列都有一個length特性
4. 未使用的索引會有undefined值


---

### 功能簡介
1. push: 在陣列結尾堆疊新元素
2. pop: 在陣列結尾刪除元素
3. shift: 在陣列開頭刪除元素(佇列)
4. unshift: 在陣列開頭增加新元素(佇列)
5. concat: 在陣列中加入多個元素
6. slice: 取得某個陣列的子陣列
7. splice: 可以就地修改陣列，在任何索引加入或移除元素
8. copyWithin: es6新加入，切割與替換陣列元素
9. fill: es6新加入，在陣列中填入特定值
10. reverse: 反轉陣列
11. sort: 排序陣列，可指定排序函式
12. indexOf: 搜尋陣列，回傳索引值
13. lastIndexOf: 從結尾處開始搜尋，回傳索引值
14. findIndex: 搜尋陣列，可指定判斷函式，回傳索引值，找不到會回傳-1
15. find: 搜尋陣列，可指定判斷函式，回傳元素本身
16. some: 尋找符合條件的元素，只要1個符合就回傳true，否則false
17. every: 尋找符合條件的元素，所有元素都符合條件才回傳true
18. map: 可以轉換陣列的元素，如果陣列屬於某一種格式，但你需要另一種格式，可以使用它
19. filter: 移除陣列中不需要的元素
20. reduce: 轉換整個陣列，通常被用來將陣列精簡為一個值
21. join: 金振烈元素的值串接成字串
22. delete: 刪除陣列中的元素


---

### 就地或複製
就地: 直接修改原始陣列
複製: 不會修改原始陣列，而是回傳新陣列

就地： push、unshift、splice、copyWithin、fill、reverse、sort
複製： concat、slice、map、filter、reduce、join

---

### 陣列搜尋
indexOf、lastIndexOf、findIndex、find、some、every

---

### 陣列轉換
map、filter、reduce、join