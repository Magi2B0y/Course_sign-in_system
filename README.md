# 课堂签到及评价系统

## 一、作者按

​			本系统的前端页面（./signup.html, ./feedback.html, ./admin/signin.html, ./admin/show.html）引自互联网，如有侵权请联系作者删除，望海涵。除此之外的所有实现均系原创，如需使用烦请联系作者。另外，如有谬误，敬请斧正！

## 二、系统简要说明

### （一）命名规范

![image-20210704115307896](C:/Users/672/AppData/Roaming/Typora/typora-user-images/image-20210704115307896.png)

### （二）数据库结构

-   数据库文件位于路径`./bupt.sql`

![image-20210704115516252](C:/Users/672/AppData/Roaming/Typora/typora-user-images/image-20210704115516252.png)

### (三)工作原理

![image-20210704115721975](C:/Users/672/AppData/Roaming/Typora/typora-user-images/image-20210704115721975.png)

### （四）辅助脚本

-   `./makeColumn.sh`用于自动天加签到列，并删除一定时间之前的无用签到信息
-   `./insert.py`用于批量插入学生信息
-   crontab位于`/etc/crontab`,将其设置为每周课程开始时间，执行makeColumn.sh脚本

![image-20210704115838817](C:/Users/672/AppData/Roaming/Typora/typora-user-images/image-20210704115838817.png)

## 三、系统使用方法

### （一）学生端

1.  学生扫描自`./index.html`展示的二维码![image-20210704122428434](C:/Users/672/AppData/Roaming/Typora/typora-user-images/image-20210704122428434.png)
2.  学生如实填写个人信息，当日已填过可跳至3![image-20210704122635078](C:/Users/672/AppData/Roaming/Typora/typora-user-images/image-20210704122635078.png)
3.   学生填写评价信息并提交![image-20210704123011651](C:/Users/672/AppData/Roaming/Typora/typora-user-images/image-20210704123011651.png)
4.  签到及评价完成![image-20210704123111263](C:/Users/672/AppData/Roaming/Typora/typora-user-images/image-20210704123111263.png)

### （二）教师端

1.  访问`./admin/signin.html`并填写登录信息![image-20210704123549230](C:/Users/672/AppData/Roaming/Typora/typora-user-images/image-20210704123549230.png)

2.  查看缺勤和评价信息![image-20210704123721090](C:/Users/672/AppData/Roaming/Typora/typora-user-images/image-20210704123721090.png)

![image-20210704124030509](image-20210704124030509.png)

【注】教师登录信息需管理员后台添加

## 四、作者及联系方式

-   陆君睿：15011083001（TEL），JohnDoe672（微信）
-   张靖宇：zjynb666888（微信）
-   陈鸣扬：YCcMcCY2356417（微信）
-   杜鑫：wyw15811554903（微信）

## 五、鸣谢

​			感谢北京邮电大学为本组创作提供的广阔平台，感谢袁开国老师为本组提供的优质指导，感谢本次管理组同学的缜密组织，感谢所有为本系统问世提供帮助的老师和同学们！



2021年7月4日

