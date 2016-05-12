all:
	git pull
	composer install
	npm install
	bower install
	gulp
clean:
	rm -rf vendor
	rm -rf public/components
deploy:
	rsync -av --exclude "bootstrap/cache/" --exclude .git --exclude .env --exclude "node_modules" --exclude "storage/logs/*" --exclude "storage/framework/*" --exclude "storage/app/*" ./ git@mario.bency.org:/var/www/coc
