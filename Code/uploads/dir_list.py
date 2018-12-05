import os

file = open("list.txt",'w')
d = raw_input('Enter the directory address: ')
i=1
for f in os.listdir(d):
    s = str(i) + ".   " + f + "\n"
    file.write(s)
    i+=1
file.close()
