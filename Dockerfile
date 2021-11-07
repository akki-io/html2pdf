FROM akkica/laravel-web-wkhtmltopdf:8.0

COPY ./.env.example /var/www/html/.env
COPY . /var/www/html
RUN composer install

CMD [ "/bin/sh", "-c", "/tmp/start.sh" ]
