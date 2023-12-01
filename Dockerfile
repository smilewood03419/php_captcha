# Используем официальный образ Apache + PHP как базовый образ
FROM php:7.4-apache

# Устанавливаем рабочую директорию внутри контейнера
WORKDIR /var/www/html

# Копируем файлы проекта в контейнер
COPY ./html /var/www/html

# Запускаем Apache сервер при старте контейнера
CMD ["apache2-foreground"]