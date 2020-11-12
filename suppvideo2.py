#!/usr/bin/python3
#-*-coding:Utf-8 -*

# This program deletes .avi files on Raspi Cam

import os, time, stat

one_minute_ago = time.time() -2592000 # Express in seconds, i.e. 30 days

dossier = '/var/www/html/videos'
os.chdir(dossier)
for somefile in os.listdir('.'):
	if somefile.endswith('.mp4'):
		mtime = os.path.getmtime(somefile)
		if mtime < one_minute_ago:
			os.unlink(somefile)
