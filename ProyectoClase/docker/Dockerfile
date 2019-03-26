FROM aydusacg4/p1_g4:Version6
RUN rm -rf /var/www/html/ProyectoClase/
RUN git clone https://github.com/AYD2G4/ProyectoClase.git /var/www/html/ProyectoClase
RUN rsync -a -v --ignore-existing /var/www/laravel/* /var/www/html/ProyectoClase/ProyectoClase
RUN cp /var/www/html/ProyectoClase/ProyectoClase/.env.example /var/www/html/ProyectoClase/ProyectoClase/.env
RUN cd /var/www/html/ProyectoClase/ProyectoClase/ && yes | composer install && yes | php artisan key:generate
RUN chmod -R +777 /var/www/html/ProyectoClase

#####RUN curl -sL https://deb.nodesource.com/setup_8.x | sudo bash -
####RUN sudo apt install nodejs
####RUN npm config set strict-ssl false
####RUN composer require jkocik/laravel-profiler --dev
####RUN cd /var/www/html/ProyectoClase/ProyectoClase/ && yes | php artisan vendor:publish --provider="JKocik\Laravel\Profiler\ServiceProvider
####RUN cd /var/www/html/ProyectoClase/ProyectoClase/ && npm install laravel-profiler-client --save-dev


CMD ["apachectl", "-D", "FOREGROUND"]
ENTRYPOINT cd /var/www/html/ProyectoClase/ProyectoClase/ && yes | php artisan migrate:refresh



