FROM mysql:5.6
ENV LANG C.UTF-8
ENV MYSQL_ROOT_PASSWORD root
ENV MYSQL_DATABASE test
ADD bak.sql /docker-entrypoint-initdb.d/
EXPOSE 3306