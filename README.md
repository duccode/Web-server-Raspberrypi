1 - Cài đặt Apache : sudo apt install apache2 -y

2 - Cài đặt PHP : sudo apt install php -y

3 - Cài đặt MariaDb : sudo nano install mariadb-server

4 - Cài đặt Mysql : sudo mysql_secure_installation

5 - Cài đặt liên kết Mysql-PHP : sudo apt install php-mysql

6 - Cài đặt phpmyadmin : sudo apt install phpmyadmin "nơi lưu cơ sở dữ liệu""https://localhost/phpmyadmin"

link video hướng dẫn cài đặt"https://www.youtube.com/watch?v=smo5kjCXRjQ&t=339s"


hướng dẫn sử dụng:

1 - Tạo cơ sở dữ liệu : tạo csdl "home" table "device","sensordata"

Note: "usename phpmyadmin change "your_user"" "password phpmyadmin change "your_password""
 
2 - Truy cập đường dẫn : cd /var/www/html/RaspberryPi/master

	Chạy lệnh : gcc -std=c11 -Wall -g -D_BSD_SOURCE server-thread.c -o server-thread -lpthread
	
	tiếp theo chạy : ./server-thread
	
3 - Nạp chương trình cho esp: tải và cài đặt Arduino IDE.

4 - truy cập webserver : https://ip_raspi/RasberryPi

