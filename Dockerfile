FROM akkica/laravel-web-wkhtmltopdf:7.4

COPY . /var/www/html

CMD [ "/bin/sh", "-c", "/tmp/start.sh" ]
