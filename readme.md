# COC Record

記錄桃花源部落的一舉一動


## 環境需求
### laravel 5.2.x 的環境需求
1. PHP >= 5.5.9
1. OpenSSL PHP Extension
1. PDO PHP Extension
1. Mbstring PHP Extension
1. Tokenizer PHP Extension

### node.js
1. node.js 本身
1. node.js 管理套件 npm
1. global gulp

		$ npm install --global gulp
1. global bower

        $ npm install --global bower

## 安裝說明
1. 到 https://developer.clashofclans.com/ 申請 api secret key
1. 執行以下命令

        $ php -r "copy('.env.example', '.env');"
        $ php artisan key:generate
1. 在 .env 的 COC_API_KEY 中填上申請的 api key
1. 如果需要 PROXY 設定，再請自行填入，這不強制
1. 設定 crontab（以定期更新線上的資料到資料庫）

        * * * * * root /path/to/php /path/to/artisan schedule:run >> /dev/null 2>&1
1. 調整以下資料夾讓網頁伺服器有寫入的權限

        storage/app storage/framework storage/logs
1. 最後再執行

        $ php artisan optimize
        $ php artisan migrate # 建立資料庫結構
        $ npm install # 安裝安裝前端套件所需要的套件
        $ bower install # 安裝前端套件
        $ gulp # 建立 css
1. 大功告成！

## 檢視 API 資料

    php artisan coc:fetchclan --dry-run
