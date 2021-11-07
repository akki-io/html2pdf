FROM akkica/laravel-web-wkhtmltopdf:stable

COPY . /var/www/html
COPY ./.env.example /var/www/html/.env
RUN composer install

CMD [ "/bin/sh", "-c", "/tmp/start.sh" ]
