# -*- coding: utf-8 -*-
# CE CODE FONCTIONNE AVEC PYTHON 2 MAIS PAS 3 !!

import smtplib, os
from id_password import adresse_mail, password_mail
from email.MIMEMultipart import MIMEMultipart
from email.MIMEText import MIMEText

os.chdir('/var/www/html/videos')
dossier = []
dossier = os.listdir('/var/www/html/videos')
dossier.sort()
taille = float(os.path.getsize(dossier[len(dossier) - 1])) / 1000000
taille = round(taille, 2)
taille = str(taille)
# get name file
fileName = os.path.basename(dossier[len(dossier) - 1])

if (os.path.getsize(dossier[len(dossier) - 1])) >= 4000000:
	fromaddr = adresse_mail
	toaddr = adresse_mail
	msg = MIMEMultipart()
	msg['From'] = fromaddr
	msg['To'] = toaddr
	msg['Subject'] = "Vidéo caméra garage " + taille + " Mo."

	body = "<p>Mouvements sur vidéosurveillance : <b>"
	body += taille
	body += " Mo.</b></p></br></br><a style=\"color:white; text-decoration:none;\" href=\"http://79.95.246.12/\"><div style=\"padding:25px; width:50%; background-color:#0174DF; border-radius:10px;text-align:center;\">ACCES SERVEUR</div></a>"
	body += " Mo.</b></p></br></br><a style=\"color:white; text-decoration:none;\" href=\"http://79.95.246.12/videos/" + fileName + "\"><div style=\"padding:25px; width:50%; background-color:#0174DF; border-radius:10px;text-align:center;\">VOIR FICHIER</div></a>"

	msg.attach(MIMEText(body, 'html'))

	server = smtplib.SMTP('smtp.gmail.com', 587)
	server.starttls()
	server.login(fromaddr, password_mail)
	text = msg.as_string()
	server.sendmail(fromaddr, toaddr, text)
	server.quit()
