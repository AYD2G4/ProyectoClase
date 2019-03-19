FROM aydusacg4/p1_g4_dev:V2
RUN cd /var/www/html/ProyectoClase/ProyectoClase/ && git pull origin master

CMD ["apachectl", "-D", "FOREGROUND"]
CMD ["cd /var/www/html/ProyectoClase/ProyectoClase/ && npm run ps"]
CMD ["cd /var/www/html/ProyectoClase/ProyectoClase/ && npm run pc"]
ENTRYPOINT cd /var/www/html/ProyectoClase/ProyectoClase/ && yes | php artisan migrate:refresh && php artisan serve --host=0.0.0.0 --$


