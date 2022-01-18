import pymysql
from crawler import crawler

data = crawler.getDetail()

#資料庫連線設定
db = pymysql.connect(
    host='127.0.0.1', 
    port=3306, 
    user='root', 
    passwd='root', 
    db='cart', 
    charset='utf8'
)
#建立操作游標
cursor = db.cursor()
#執行語法
for index, item in enumerate(data):
    #SQL語法
    sql = f"INSERT INTO cart (title, price, image) VALUES ('{data[index]['title']}', '{data[index]['price']}', '{data[index]['img']}')"
    print(sql)
    try:
        cursor.execute(sql)
        #提交修改
        db.commit()
        print('success')
    except:
        #發生錯誤時停止執行SQL
        db.rollback()
        print('error')

#關閉連線
db.close()

#輸出：success