# 大略的實做Oauth2

* 請用檔案裡test.sql匯入DB
    * mysql -u (db user) -p test_db <test.sql
* 首頁的部分有兩個連結
    * host路徑用來模擬server端(此頁面為空白)
    * client路徑用來模擬client(application)端
* client頁面中有兩個連結
    * login連到host的登入頁面並將callback的連結用get方法帶入
    * 登入成功login連結變為logout，若失敗則不會變換。
    * weather為天氣功能
* 登入成功host跳轉至callback連結頁面並用get方法帶入token與username
    * 登入成功即產生token並將該token存入db(表格：oauth_access_tokens)
* callback頁面將token存入session並跳轉回client頁面
* weather用post方法打天氣api(/host/weather_api)
    * weather_api頁面判斷token是否正確(比對token是否有在資料庫裡面紀錄)
    * 若token正確則呼叫氣象局api並回傳資料
    * 若不正確則回傳失敗(json格式)
    * /client/weather 成功取得資料後處理並顯示
