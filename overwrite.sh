# Basically, delete the webpage, and copy the git project onto it. Big hack.
#!/bin/bash

sudo rm -R /var/www/html/glowing-engine
sudo cp -R ../glowing-engine /var/www/html/
