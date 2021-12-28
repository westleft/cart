# PHP 購物車

![](https://img.shields.io/badge/PHP-exercise-lightgrey)

![](https://i.imgur.com/DNzBH0p.jpg)

## 爬蟲寫進資料庫
由於資料庫內太寒酸，所以先用 `python` 爬 [奇摩電影](https://movies.yahoo.com.tw/movie_intheaters.html)，再將電影名稱、海報、價格寫進資料庫，價格因為是自己亂取的，所以用 `random.randint()` 隨機產生。

## Session 存取訂單
```PHP
function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }
    }
```
在 Cart 頁面把所有 Session 顯示出來。


## 待完成功能
* 登入功能
* 詳細訂單功能 (CHECK OUT)

