p = 3
q = 2
r = 4
# a = 4+9+b
# a = b+c+c
# c = (b+c)&a
# c = a+a
# b = 12 & a
for r in range(4,6):
    q = p+5+p
for r in range(5,7):
    p = q+2+r
    
    # if((r^q^p)<(q+p+r)):
    #     continue
    # p = 7+q
    # q = q+p
print(p+q)