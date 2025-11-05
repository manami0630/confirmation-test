# お問い合わせフォーム  

## 環境構築  

### Dockerビルド  
1. `git clone https://github.com/manami0630/confirmation-test.git`  
2. docker-compose up -d --build

* MySQLは、OSによって起動しない場合があるので、それぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。  

### Laravel環境構築  
1. docker-compose exec php bash 
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更  
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed 

## 使用技術  
- PHP 8.44  
- Laravel 8.83.29  
- MySQL 8.0.43

## ER図
<img width="919" height="533" alt="スクリーンショット 2025-11-06 020135" src="https://github.com/user-attachments/assets/004ad349-b859-42c6-927f-4e9c85085272" />

## URL  
- 開発環境: [http://localhost/](http://localhost/)  
- phpMyAdmin: [http://localhost:8080/](http://localhost:8080/)  
