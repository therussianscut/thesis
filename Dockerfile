FROM composer:1.6.5 as build
WORKDIR /app
COPY . /app
RUN composer install

FROM php:7.2-apache
EXPOSE 80
COPY --from=build /app /app
RUN chown -R www-data:www-data /app \
    && a2enmod rewrite
