import scrapy
import json
import sys
from pprint import pprint
from scrapy.spider import BaseSpider
from scrapy.http import Request
from scrapy.selector import HtmlXPathSelector
from tutorial.items import DmozItem
from scrapy.spider import Spider
from scrapy.selector import Selector
from scrapy.http import FormRequest
class DmozSpider(scrapy.Spider):
	name = "dmoz"
	allowed_domains = ["www.imdb.com"]
	#s = "https://www.imdb.com/find?q=Leonardo+dicaprio+&s=nm"
	s = "https://www.imdb.com/find?q=Amitabh+bacchan+&s=nm"
	#s = "https://www.imdb.com/find?q=Aag+Aur+Daag+1970+"
	start_urls = [l.strip() for l in open('c:/google/input.txt').readlines()]
		
	def parse(self, response):
		#items = []
		sel = Selector(response)
		item = DmozItem()
		item['url']=response.url
		link = sel.xpath('//td[2]/a/@href').extract()[0]
		check=''.join(link)
		check='https://www.imdb.com'+check
		item['link']=check
		print "\n"
		#print url
		#print links
		print "\n"
		yield Request(check, callback=self.get_movie,meta={'item':item})
		#request.meta['item'] = item
		#yield request
		#items.append(item)
		##if self.task_urls:
			##r = Request(url=self.task_urls[0], callback=self.parse)
			##items.append(r)
		#return items
	
	def get_movie(self, response):
		#item = response.meta['item']
		print "\n\n"
		item = DmozItem(response.meta["item"])
		sel = Selector(response)
		url=response.url
		#item['rating']=url
		for num in range(1,4): 
			st='//*[@id="knownfor"]/div['+str(num)+ ']/a[1]/@href'
			print st
			link= sel.xpath(st).extract()
			check=''.join(link)
			check='https://www.imdb.com'+check
			#s="movie_link"+str(num)
			#item[s]=check
			yield Request(check, callback=self.get_movie_data,meta={'item':item})
			print link
		print url
		#return item
		print "\n\n\n"
		
	def get_movie_data(self, response):
		#item = response.meta['item']
		print "\n\n"
		item = DmozItem(response.meta["item"])
		sel = Selector(response)
		item['movie_link']=response.url
		
		img_link=sel.xpath('//div[@class="poster"]/a/img/@src').extract()
		item['image_link']=img_link
		item['rating']=sel.xpath('//*[@id="ratingWidget"]/span/span/text()').extract()
		item['name']=sel.xpath('//*[@id="title-overview-widget"]//h1[@itemprop="name"]/text()').extract()
		item['data']=sel.xpath('//*[@id="title-overview-widget"]//div[@class="subtext"]//text()').extract()
		item['user']=sel.xpath('//*[@id="title-overview-widget"]//span[@itemprop="ratingCount"]/text()').extract()
		rew=sel.xpath('//div[@class="see-more"]/a[2]/@href').extract()
		
		check=''.join(rew)
		check='https://www.imdb.com'+check
		item['review']=check
		yield Request(check, callback=self.get_review,meta={'item':item})
		'''print image_link
		print url	
		print rating
		print name
		print data
		print review'''
		#return item
		print "\n\n\n"

	def get_review(self, response):
		#item = response.meta['item']
		item = DmozItem(response.meta["item"])
		print "\n\n"
		sel = Selector(response)
		url=response.url
		print url
		item['review_title1']=sel.xpath('//*[@id="tn15content"]/div[1]/h2/text()').extract()
		item['review_author1']=sel.xpath('//*[@id="tn15content"]/div[1]/a[2]/text()').extract()
		item['review_author_place1']=sel.xpath('//*[@id="tn15content"]/div[1]/small[2]/text()').extract()
		item['review_data1']=sel.xpath('//*[@id="tn15content"]/p[1]/text()[1]').extract()
		#print review_title1,review_author1,review_author_place1,review_data1
		item['review_title2']=sel.xpath('//*[@id="tn15content"]/div[3]/h2/text()').extract()
		item['review_author2']=sel.xpath('//*[@id="tn15content"]/div[3]/a[2]/text()').extract()
		item['review_author_place2']=sel.xpath('//*[@id="tn15content"]/div[3]/small[2]/text()').extract()
		item['review_data2']=sel.xpath('//*[@id="tn15content"]/p[2]/text()[1]').extract()
		#print review_title2,review_author2,review_author_place2,review_data2
		item['review_title3']=sel.xpath('//*[@id="tn15content"]/div[5]/h2/text()').extract()
		item['review_author3']=sel.xpath('//*[@id="tn15content"]/div[5]/a[2]/text()').extract()
		item['review_author_place3']=sel.xpath('//*[@id="tn15content"]/div[5]/small[2]/text()').extract()
		item['review_data3']=sel.xpath('//*[@id="tn15content"]/p[3]/text()[1]').extract()
		#print review_title3,review_author3,review_author_place3,review_data3
		return item
		print "\n\n\n"

	
	

			
			
