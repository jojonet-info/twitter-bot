readme.md

# Twitter Bot

![copyright:jojo-net.info](https://img.shields.io/badge/copyright-jojonet-green.svg)
![version 1.0](https://img.shields.io/badge/version-1.0-red.svg)

[blog.jojo-net.info](http://blog.jojo-net.info/create-a-bot-twitter/ )　の twitter bot 実装コードです。

### ファイル構成

| ファイル名        | 役割           | 
| ------------- |:-------------:| 
| send_tweet.php| 実行されるファイル | 
| to_tweet.json | tweet情報を持つファイル | 
| vendor/*| ライブラリーファイル     | 

### Botの設定

*send_tweet.php*の20,21,22,23行のtwitterアカウント情報を更新します

```php
$consumerKey       = 'xxxx';
$consumerSecret    = 'xxxx';
$accessToken       = 'xxxx';
$accessTokenSecret = 'xxxx';

```

*to_tweet.json*のtweet情報を更新して、[json validator](http://jsonlint.com/)で必ず確認してください。

```json
{
    "tweets": [
        {
            "message": "投稿されるメッセージ",
            "image": "画像のURL(空の場合は非表示)"
        },
        {
           "message": "投稿されるメッセージ",
           "image": "画像のURL(空の場合は非表示)"
        }
     ]
}

```

### サーバー反映

プロジェクトを、対象サーバーにアップロードしてください。send_tweet.phpが実行されるようにcrontabにタスクを追加してください。

```shell
# 毎日の12:34分に実行
34 12 * * * cd /path/to/upload-folder/; php send_tweet.php > /dev/null 2>&1
```


