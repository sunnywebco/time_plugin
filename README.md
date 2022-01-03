
# Wordpress Plugin (نمایش اطلاعات بازار مالی فارکس - افزونه وردپرس زمان)

وب سرویس نمایش اطلاعات زمانی از قبیل زمان های شمسی ، قمری ، میلادی 

![image](https://user-images.githubusercontent.com/55010722/147907721-4ba8c281-3fc4-4113-95fc-298c18b9c7b2.png)

## Installation (روش نصب و استفاده)

- Go to “Plugins” in your WordPress dashboard

- Click on “Add New”

- Find your plugin via File upload

- Install your plugin

- Activate the plugin
  

## (Plugin Help Programming) راهنما برنامه نویسی افزونه

https://sunnyweb.ir/time_plugin/

## (Plugin installation file) فایل نصب افزونه

https://api.sunnyweb.ir/data/time_plugin.zip

## (Sunny Web token) دریافت توکن رایگان سانی وب

https://api.sunnyweb.ir/register


## Example Response (نمونه خروجی درخواست وب سرویس)

 https://api.sunnyweb.ir/api/time/[token]
 ```bash
 {
  "gregorianYear": 2022,
  "gregorianMonth": 1,
  "gregorianDay": 3,
  "gregorianDayName": "Monday",
  "jalaliYear": 1400,
  "jalaliMonth": 10,
  "jalaliDay": 13,
  "jalaliDayName": "دوشنبه",
  "hijriYear": 1443,
  "hijriMonth": 5,
  "hijriDay": 29,
  "hijriDayName": "الاثنين‬",
  "hour": 11,
  "minute": 5,
  "second": 37,
  "milliSecond": 528,
  "jalaliMonthName": "دی",
  "gregorianMonthName": "January",
  "hijriMonthName": "جمادي الاول",
  "gregorianMonthNameSmall": "Jan",
  "gregorianDayNameSmall": "Mon",
  "astrologicalSign": "جدی"
}
```



