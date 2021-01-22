#datetime
import datetime

today = datetime.date.today()
print(today)

birthday = datetime.date(1996, 5, 2)
print(birthday)

days_since_bday = (today-birthday).days

print(days_since_bday)