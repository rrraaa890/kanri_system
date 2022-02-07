FROM mysql/mysql-server:5.7.28

# コンテナ内の環境変数を指定
# 環境変数を渡すとビルド時に設定してくれるDockerイメージがある
# 利用の際はDocker Hubのサイトで確認する
ENV TZ=Asia/Tokyo \
  MYSQL_DATABASE=database \
  MYSQL_USER=root \
  MYSQL_PASSWORD=root \
  MYSQL_ROOT_PASSWORD=root

COPY ./my.cnf /etc/mysql/conf.d/my.cnf