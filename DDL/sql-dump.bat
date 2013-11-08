set path=%path%;E:\MySQL5.1\bin
mysqldump --user=root --password=root --host=localhost --port=3306 --default-character-set=cp932 koyo_db books > dump-books.txt

cmd /k