# Web application for video surveillance with RaspberryPi and motion :video_camera:
Web application hosted on RaspberryPi, streaming cameras with motion.
Some useful links to install motion on RaspberryPi :

&nbsp;
[trevilly.com](https://trevilly.com/installation-de-motion-sur-raspberry-pi3/)

[opendomotech.com](https://opendomotech.com/videosurveillance-avec-raspberry-pi-et-motion/)

This repository contains the code of the web application, the automatic management of file deletions, the email notification when recordings are triggered (to be personalized).

## Application illustrations :
![Illustration 1 vidéosurveillance en ligne](./illustrations/videosurveillance-compressor.png)

&nbsp;
## Main duties :
* :one: Live streaming display from two cameras
* :two: Viewing the list of video recordings
* :three: Reading records in the page
* :four: Real-time display of the number of recording files stored on the server
* :five: Real-time display of the size of the recording folder (to be customized)
* :six: Real-time display of the time of the last recording
* :seven: "Fake" link in the event of unauthorized access to the server with sending of mail ("mail_raspicam_acces_admin.py" file)
* :eight: Automatic deletion of customizable recordings ("suppvideo2.py" file) in crontab on the RaspberryPi
* :nine: Email notification at the end of a recording if file > 4mb (to be personalized)


&nbsp;
## Improvements to be expected :
* Real-time update of the record listing (without manual action), with node.js for sending data from the server
* Application greedy in network traffic: node.js
* Real-time display of the temperature of the RaspberryPi processor



&nbsp;
## Contributions :
You are all welcome :smiley:
* :one:  Fork it !
* :two:
```
git checkout -b developpement
git commit -am 'New feature'
git push origin developpement
```
* :three: Create Pull Request
