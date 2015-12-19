# -*- coding: utf-8 -*-

# Define here the models for your scraped items
#
# See documentation in:
# http://doc.scrapy.org/en/latest/topics/items.html


import scrapy

class DmozItem(scrapy.Item):
	link = scrapy.Field()
	url = scrapy.Field()
	rating = scrapy.Field()
	image_link = scrapy.Field()
	name = scrapy.Field()
	data = scrapy.Field()
	review = scrapy.Field()
	review_title1 = scrapy.Field()
	review_author1 = scrapy.Field()
	review_author_place1 = scrapy.Field()
	review_data1 = scrapy.Field()
	review_title2 = scrapy.Field()
	review_author2 = scrapy.Field()
	review_author_place2 = scrapy.Field()
	review_data2 = scrapy.Field()
	review_title3 = scrapy.Field()
	review_author3 = scrapy.Field()
	review_author_place3 = scrapy.Field()
	review_data3 = scrapy.Field()
	user = scrapy.Field()
	movie_link=scrapy.Field()

	
	
	