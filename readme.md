# COC Record

記錄桃花源部落的一舉一動

## 安裝說明

1. 需符合 laravel 5.2.x 的環境需求
1. 到 https://developer.clashofclans.com/ 申請 api secret key
1. 執行以下命令

        $ composer php -r "copy('.env.example', '.env');"
        $ php artisan key:generate
1. 在 .env 的 COC_API_KEY 中填上申請的 api key
1. 如果需要 PROXY 設定，再請自行填入，這不強制
1. 設定 crontab（以定期更新線上的資料到資料庫）

        * * * * * root /path/to/php /path/to/artisan schedule:run >> /dev/null 2>&1
1. 最後再執行

        $ php artisan optimize
        $ php artisan migrate
1. 大功告成！