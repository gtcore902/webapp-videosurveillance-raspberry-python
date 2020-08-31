#!/usr/bin/python3
#-*-coding:Utf-8 -*

# Ce programme supprime les fichiers .avi sur Raspi Cam

import os, time, stat

one_minute_ago = time.time() -2592000 # Exprimer en seconde soit 30 jours

dossier = '/var/www/html/videos'
os.chdir(dossier)
for somefile in os.listdir('.'):
	if somefile.endswith('.mp4'):
		mtime = os.path.getmtime(somefile)
		if mtime < one_minute_ago:
			os.unlink(somefile)
