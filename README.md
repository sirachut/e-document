# e-document
ระบบสารบัญเอกสาร ของมหาวิทยาลัยพะเยา จัดการและติดตามเอกสาร สามารถดูรายละเอียด ความต้องการ ได้ที่ https://trello.com/b/pFnUJJ1D/%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A-e-document

#ขั้นตอนการ clone ลงเครื่องต้องรัน command ดังนี้ 

1. Run composer  to install all dependencies: เพื่อสร้างโฟลเดอร์ vender ซึ่งเป็น Library ที่สำคัญของโปรเจค (เพราะโดยธรรมชาติ Git จะไม่ Commit  โฟลเดอร์ Vender)

$ composer install

2. Create your .env from .env.example : เพื่อสร้างไฟล์ config ของโปรเจค  (เพราะโดยธรรมชาติ Git จะไม่ Commit  ไฟล์ .env)

$ cp .env.example .env

3. Generate application key  : เพื่อสร้าง Key ให้กับ โปรเจค

$ php artisan key:generate

สุดท้าย ไปทำการแก้ไขไฟล์ .env

DB_CONNECTION=mysql          
DB_HOST=127.0.0.1            
DB_PORT=3306                 
DB_DATABASE=edocument     
DB_USERNAME=root             
DB_PASSWORD=      


