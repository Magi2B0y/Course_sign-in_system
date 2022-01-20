import pymysql
import csv

db = pymysql.connect(user="bupt",password="4a617" ,host="localhost", database="bupt")
cursor = db.cursor()
f = open("t" + ".csv", "r", encoding='UTF-8')
fReader = csv.reader(f)
for i in fReader:
    sql = "insert into ykg2050911_i (class,id,name) values (" + i[4] + "," + i[5] + ",\"" + i[6] + "\");"
    cursor.execute(sql)
    print(i)
db.close()
f.close()
