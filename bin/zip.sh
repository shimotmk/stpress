#!/bin/bash

#上の階層へ
cd ../

# 不要なファイルを除く
zip -r stpress.zip stpress -x "*/.*" "*/__*" "*bin*" "*node_modules*" "*vendor*" "*package.json" "*package-lock.json" "*composer.json" "*composer.lock" "*webpack.config*"

# zipから不要なファイルを削除
zip --delete stpress.zip  "stpress/.*" "stpress/README.md" "stpress/phpcs.xml"

mv stpress.zip _version/stpress-${1}.zip
