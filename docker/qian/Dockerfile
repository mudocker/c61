FROM dockerliweipei/xdebug:php7.0
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
#RUNa2enmod rewrite
RUN mkdir -p  /usr/local/etc/php
ENV GIT_ROOT  /var/www/html
ENV APACHE_DOCUMENT_ROOT=${GIT_ROOT}/qian
WORKDIR /etc/apache2/sites-enabled/
RUN sed -i "s#DocumentRoot /var/www/html/public#DocumentRoot ${APACHE_DOCUMENT_ROOT}#" 000-default.conf
WORKDIR ${GIT_ROOT}
ENV GIT=https://code.aliyun.com/liweipei/c61.git
RUN rm -rf .git
RUN git init
RUN git remote add origin ${GIT}
RUN git fetch --all&&git reset --hard origin/master
RUN rm -rf .git
RUN git init
RUN git remote add origin ${GIT}
RUN chmod -R 777 ${APACHE_DOCUMENT_ROOT}/Runtime
EXPOSE 80
CMD cd /usr/local && tail -f /dev/null