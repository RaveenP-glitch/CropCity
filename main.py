#regex
import re

text = 'A random text'

pattern = re.compile("A")

result = pattern.search(text)

print(result)
