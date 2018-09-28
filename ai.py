# -*- coding: utf-8 -*-
from sklearn.svm import SVC  
from konlpy.tag import *
import os, sys, math
class Classifier:
	def __init__(self): #초기화
		self.words = set()
		self.dic_word = {}
		self.dic_class = {}
 
	def train(self, text, category): #데이터를 학습시킴
		self.word_freq(text, category)
		self.cate_freq(category)
 
	def word_freq(self, text, category):
		okt = Okt()
		malist = okt.pos(text, norm = True) #pos()는 텍스트를 형태소 단위로 자름
		if category not in self.dic_word: 
			self.dic_word[category] = {}
		for word in malist:
			if word[1] not in ["Josa", "Eomi", "Punctuation"]: #조사,어미, 구두점이 아닐경우
				if word not in self.dic_word[category]: #단어가 사전에 없을경우
					self.dic_word[category][word[0]] = 0 
				self.dic_word[category][word[0]] += 1 #있을경우 빈도를 증가
				self.words.add(word[0]) # 단어를 추가
	def cate_freq(self, category):
		if category not in self.dic_class: #병명이 분류사전에 없을경우
			self.dic_class[category] = 0
		self.dic_class[category] += 1 
	def word_prob(self, word, category):
		if word not in self.dic_word[category]:
			n = 0
		else:
			n = self.dic_word[category][word]
		return math.log(n + 1 / (len(self.words) + sum(self.dic_word[category].values()))) #단어의 빈도수 계산
	def category_prob(self, category):
		return math.log(self.dic_class[category] /sum(self.dic_class.values())) #분류사전에 분류가 있을 확률 계산
	def predict(self, text):
		maxScore = -sys.maxsize
		for category in self.dic_class.keys(): #분류사전에 병명
			score = 0
			categoryScore = self.category_prob(category)
			score += categoryScore
			okt = Okt()
			malist = okt.pos(text, norm = True)
			for word in malist:
				score += self.word_prob(word[0], category) #단어가 병명에 있는 확률 계산
			if maxScore < score:
				bestCategory = category
				maxScore = score
		return bestCategory
if __name__ == '__main__':
	cf = Classifier()
	train_data = []
	
	path_dir = '/home/os_201402410/python/symptoms'
	file_list = os.listdir(path_dir) #해당 디렉토리에 있는 모든 파일목록
	for i in file_list: #모든 txt파일을 읽어서 :단위로 자른뒤 학습시킴.
		f = open("/home/os_201402410/python/symptoms/"+ i +"", 'r', encoding='utf-8-sig')
		data = f.read()
		token = data.split(":")
		f.close()
		cf.train(token[1], token[0])
		#print (token)
	
	f = open("/home/os_201402410/python/data.txt" , 'r', encoding='utf-8-sig') #증상을 입력받아서 예측
	input_data = f.read()
	result = cf.predict(input_data)
	f.close()
	print ("당신의  증상을 빅데이터로 분석하여 가장 의심되는 병명을 도출했습니다. 병명은 == " + result)
	#print (result.encode('utf-8'))


