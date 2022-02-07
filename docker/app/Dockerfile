# どんなdockerイメージを利用して構築をするか
FROM php:7.4-apache

# 設定ファイルをdockerコンテナ内のPHP、Apacheに読み込ませる
ADD php.ini /usr/local/etc/php/
ADD 000-default.conf /etc/apache2/sites-enabled/

# Composerのインストール
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer


# ミドルウェアインストール
RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim \
libpng-dev \
libpq-dev \
tree \
xclip \
libzip-dev \
libfreetype6-dev \
libjpeg62-turbo-dev \
libwebp-dev \
libxpm-dev \
#docker-php-ext-* :php拡張機能インストール用スクリプト
&& docker-php-ext-install \
pdo_mysql \
zip \
&& docker-php-ext-configure \
gd \
  --with-freetype \
  --with-jpeg \
  --with-webp \
  --with-xpm \
&& docker-php-ext-install -j$(nproc) gd
# Node.jsインストール（npm同梱）
RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs
# Laravelで必要になるmodRewriteを有効化する
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite