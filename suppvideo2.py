#!/usr/bin/python3
#-*-coding:Utf-8 -*

# Ce programme supprime les fichiers .avi sur Raspi Cam

import os, time, stat

one_minute_ago = time.time() -259200 # Exprimer en seconde soit 72 heures

dossier = '/var/www/html/videos'
os.chdir(dossier)
for somefile in os.listdir('.'):
	if somefile.endswith('.mp4'):
		mtime = os.path.getmtime(somefile)
		if mtime < one_minute_ago:
			os.unlink(somefile)
