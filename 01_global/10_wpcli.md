WP-CLI
===

## Install

* [https://wp-cli.org/ja/](https://wp-cli.org/ja/)

```
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

```
php wp-cli.phar --info
```

```
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

```
wp --info
```


## For use MAMP-MySQL from WP-CLI

XX.XX.XX -> MAMP-PHP version

```
export PATH=/Applications/MAMP/Library/bin:${PATH}
export WP_CLI_PHP=/Applications/MAMP/bin/php/phpXX.XX.XX/bin/php
source ~/.zprofile
```
