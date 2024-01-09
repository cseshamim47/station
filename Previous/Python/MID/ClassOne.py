# Q1: Swap two elements in a list

def swap():
    list = [1,2,3,4,5]
    i = int(input("Enter postion (0-4) : "))
    j = int(input("Enter postion (0-4) : "))
    temp = list[i]
    list[i] = list[j]
    list[j] = temp
    print(list)

# swap() # Uncomment to run Q1

# Q2: Write program to find largest number in a list

def maxNum():
    list = [1,2,3,4,5,100,4,123,12312,0]
    print("max Number : ", max(list))

# maxNum() # Uncomment to run Q2

# Q3 & Q5: find and count the number of all even odd in a list 
def evenOdd():
    list = [1,2,3,4,5,100,4,123,12312,0]
    even = []
    odd = []
    for i in list:
        if i % 2 == 0:
            even.append(i)
        else: odd.append(i)
    print("Even Numbers : ", even)
    print("Total Even Numbers : ", len(even))
    print("Odd Numbers : ", odd)
    print("Total Odd Numbers : ", len(odd))

# evenOdd() # Uncomment to run Q3

# Q4: sum of digits of all numbers in a list

def sumDig():
    list = [1,12,123,1234]
    sum = 0
    for i in list:
        num = i
        while num > 0:
            sum = sum + (num%10)
            num = int(num / 10)
    print(sum)

# sumDig() # Uncomment to run Q4


