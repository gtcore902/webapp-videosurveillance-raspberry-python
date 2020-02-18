# -*- coding: utf-8 -*-
# CE CODE FONCTIONNE AVEC PYTHON 2 MAIS PAS 3 !!

from id_password import adresse_mail, password_mail

import smtplib, os
from email.MIMEMultipart import MIMEMultipart
from email.MIMEText import MIMEText

fromaddr = adresse_mail
toaddr = adresse_mail
msg = MIMEMultipart()
msg['From'] = fromaddr
msg['To'] = toaddr
msg['Subject'] = "Accés ADMIN sur RASPICAM."

body = "<p>Attention : accès sur serveur CAMERA ! <b> "

msg.attach(MIMEText(body, 'html'))

server = smtplib.SMTP('smtp.gmail.com', 587)
server.starttls()
server.login(fromaddr, password_mail)
text = msg.as_string()
server.sendmail(fromaddr, toaddr, text)
server.quit()
