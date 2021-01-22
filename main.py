#datetime
import datetime
import pytz


today = datetime.date.today()
print(today)

birthday = datetime.date(1996, 5, 2)
print(birthday)

days_since_bday = (today-birthday).days

print(days_since_bday)

tdelta = datetime.timedelta(days = 10)
print(today + tdelta)
print(today - tdelta)


print(today.day)
print(today.weekday())

print(datetime.time(7,2,20,15))

hour_delta = datetime.timedelta(hours=10)
print(datetime.datetime.now() + hour_delta)
print(datetime.datetime.now(tz=pytz.UTC))
