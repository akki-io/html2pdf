FROM akkica/laravel-web-wkhtmltopdf:8.1

COPY . /var/www/html
COPY ./.env.example /var/www/html/.env
RUN composer install --no-dev

CMD [ "/bin/sh", "-c", "/tmp/start.sh" ]
