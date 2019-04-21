# Basically, delete the webpage, and copy the git project onto it. Big hack.
#!/bin/bash

sudo rm -vR /var/www/html/glowing-engine
sudo cp -vR ../glowing-engine /var/www/html/
