import requests
from bs4 import BeautifulSoup
import random

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

            # 價格
            num = random.randint(0, 2)
            price = [99, 149, 199]
            detail['price'] = price[num]
            
            # 網址
            detail['url'] = url

            detailData.append(detail)

        print(detailData)
        return detailData

# 奇摩電影網址
crawler = Crawler('https://movies.yahoo.com.tw/movie_intheaters.html')


if __name__ == '__main__':
    crawler