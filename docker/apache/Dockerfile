ARG APACHE_VERSION

FROM httpd:${APACHE_VERSION}

# Copy apache vhost file to proxy php requests to php-fpm container
RUN sed -i "s/#LoadModule\ rewrite_module/LoadModule\ rewrite_module/" /usr/local/apache2/conf/httpd.conf;

COPY fscorredores.conf /usr/local/apache2/conf/fscorredores.conf
RUN echo "Include /usr/local/apache2/conf/fscorredores.conf" \
    >> /usr/local/apache2/conf/httpd.conf
