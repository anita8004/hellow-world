# vue test

題目：javascript30 #6 Type Ahead

參考學習：[Alex宅幹嘛#5](https://gaming.youtube.com/watch?v=8iRyEhJBdUg)

學生：Anita

日期：2018/04/25

---

## 目標
使用vue製作一個可篩選城市的功能

---

## 技術探討

### new Vue 結構
```javascript
new Vue({
    el: '.search-form', //使用vue的區塊
    data: {
        cities: null, //被篩選的資料陣列
        filter: '' //輸入的內容
    },
    computed: {
        //處理資料的方法
        regexp(){
            //篩選機制
            return new Regexp(this.filter, 'gi');
            //gi => g:全部, i:不分大小寫
        },
        filterArray(){
            //篩選動作
            //篩選出符合篩選機制的項目
            return this.cities.filter(city => city.city.match(this.regexp) || city.state.match(this.regexp))
        }
    },
    methods: {
        //其他方法
        hightlight(city){
            let cityName = city.city.replace(this.regex, `<span class="hl">${this.filter}</span>`);
            let cityState = city.state.replace(this.regex, `<span class="hl">${this.filter}</span>`);
            //將符合篩選機制的部分替換
            return cityName + ', ' + cityState;
            //返回需要的字串
        }
    },
    mounted(){ //完成準備後要做的事 = 把資料撈進來
        $.ajax({url: endpoint}).done(res => this.cities = JSON.parse(res));
        //設定cities為撈進來的資料
    }
});
```

---

### vue template

```html
<form class="search-form">
    <input type="text" class="search" placeholder="City or State" v-model="filter">
    <!-- input輸入的內容與filter綁定 -->
    <ul class="suggestions">
        <template v-if="filter && filterArray">
            <!-- if 有輸入內容並且有符合篩選項目時 -->
            <li v-for="city in filterArray">
                <!-- 列出所有符合篩選的項目 -->
                <span class="name" v-html="hightlight(city)"></span>
                <span class="population">{{ (city.population * 1).toScaleString() }}</span>
            </li>
        </template>
        <template v-else>
            <!-- if不符合時顯示的內容 -->
        </template>
    </ul>
</form>
```

---

### 方法

#### Regexp
#### filter
#### match
#### replace
#### ajax
#### toScaleString




