FROM akkica/laravel-web-wkhtmltopdf:8.0

COPY . /var/www/html
COPY ./.env.example /var/www/html/.env
RUN composer install

CMD [ "/bin/sh", "-c", "/tmp/start.sh" ]
