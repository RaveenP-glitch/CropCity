#webscraping
import requests
from bs4 import BeautifulSoup

page = requests.get('https://www.weather.gov/')
soup = BeautifulSoup(page.content, 'html.parser')
print(soup.findall('a'))
print("Im a new boss")
print("second line")
