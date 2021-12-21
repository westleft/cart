# import pymysql

# conn = pymysql.connect(host='127.0.0.1', port=3306, user='root', passwd='root',db='cart')
# cur = conn.cursor()

# cur.execute("SELECT * FROM cart ORDER BY title DESC")
# # for r in cur.fetchall():
# #     print(r)

# print(cur.fetchall())
# conn.close()

import requests
from bs4 import BeautifulSoup
import codecs

headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36'
}

class Crawler():
    def __init__(self, url):
        self.url = url
        
    def getUrl(self):
        for i in range(2):
            r = requests.get(f'{self.url}?page={i}',  headers=headers)
            soup = BeautifulSoup(r.text, "html.parser")

            src = soup.find_all(class_='release_foto')
            print(src)

crawler = Crawler('https://movies.yahoo.com.tw/movie_intheaters.html')
crawler.getUrl()

