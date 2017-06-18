import json
import time
import datetime
from dateutil.parser import parse
from collections import Counter

def open_json_file(file='fr.json'):
    """open a json file"""
    with open(file) as data_file:
        data = json.load(data_file)
    return (data['jobs'])

data = open_json_file()

content = []
for job in data:
	job_date = parse(job['POSTDATE'])
	year = job_date.year
	month = job_date.month
	day = job_date.day
	job_date = datetime.date(year, month, day)
	unix_time = time.mktime(job_date.timetuple())
	content.append(unix_time)

content = dict(Counter(content))
content = json.dumps(content, ensure_ascii=False)

print(content)