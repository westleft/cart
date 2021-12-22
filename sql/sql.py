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

    def getUrls(self):
        fullData = []
        urlData = []

        # 爬電影目錄
        for i in range(1):
            r = requests.get(f'{self.url}?page={i}',  headers=headers)
            soup = BeautifulSoup(r.text, "html.parser")

            urls = soup.select('.release_foto a')
            urlData.append(urls)

        # 爬電影目錄內的10個電影
        for index, urls in enumerate(urlData):
            for url in urls:
                fullData.append(url['href'])
        return fullData

    def getDetail(self):
        detailData = []
        detail = {}
        fullData = self.getUrls()

        for url in fullData:
            detail = {}
            r = requests.get(url,  headers=headers)
            soup = BeautifulSoup(r.text, "html.parser")
            # 電影名稱
            title = soup.find('h1').text
            detail['title'] = title

            # 電影海報
            img = soup.find(class_='movie_intro_foto').find('img')
            detail['img'] = img['src']

            detail['url'] = url
            detailData.append(detail)
        print(detailData)


crawler = Crawler('https://movies.yahoo.com.tw/movie_intheaters.html')
crawler.getDetail()