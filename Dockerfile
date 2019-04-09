# Dev Dockerfile for GP Drupal 8 ebsite
FROM drupal:8

EXPOSE 80

WORKDIR /

COPY ./dockerAssets ./dockerAssets

RUN touch /root/.bashrc \
 && cat ./dockerAssets/bashrc.txt >> /root/.bashrc

WORKDIR /var/www/html

RUN rm -fR *.*
COPY ./*.* ./

WORKDIR /var/www
RUN chown -fR www-data ./html \
    && chgrp -fR www-data ./html

