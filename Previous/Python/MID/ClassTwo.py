# Q1: Calculate length of a string

def length():
    str = "ajamarmonvalonai"
    print("Length of the given string is : ", len(str))

# length() # Uncomment to run Q1

# Q2: Takes a list of words and returns the largest word and length of the largest word

def findLargest():
    list = []
    n = int(input("Number of words you wanna take : "))
    for i in range(n):
        str = input()
        list.append(str)
    largestWord = max(list)
    length = len(largestWord)
    print("Largest word : ", largestWord)
    print("Lenth Largest word : ", length)

findLargest() # Uncomment to run Q2

# Q3: count the frequence of each word in given sequence 
def frequency():
    sentence = "are bhai kemon aso aso naki valo are bhai bhai naki kire bhai kotha shuno na bhai bhai ki koro khuda lagse khuda lagse khuda"
    map = dict()
    list = sentence.split()
    for word in list:
        if word in map:
            map[word] += 1
        else:
            map[word] = 1
    # print(map)
    for i,j in map.items():
        print(i,j)
# frequency() # Uncomment to run Q3


# Q4: Takes a word as input and returns maximum frequency charecter

def maxFreqWord():
    word = input("Enter a single word : ")
    map = {}
    for char in word:
        if char not in map:
            map[char] = 1
        else:
            map[char] += 1
    char = max(map, key = map.get)
    freq = max(map.values())
    print(char,freq)

# maxFreqWord() # Uncomment to run Q4

# Q5: Check if Substring is present in given string
def checkSubstring():
    str = "asifisabadboyshamimisagoodboy"
    if "shamim" in str:
        print("Substring found!!")
    else: print("Not found")
# checkSubstring() # Uncomment to run Q5

# Q6: Find sum of all items in a dictonary
def sumOfAll():
    map = {1:1,2:2,3:3,4:100}
    sumValues = 0
    sumKeys = 0
    for key,val in map.items():
        sumKeys += key
        sumValues += val
    print(sumKeys,sumValues)
# sumOfAll() # Uncomment to run Q6

# Q7: Convert list of list into dictonary
def convertListOfList():
    listOfList = [[1,2,3],[4,5,6,7],[8,9,10,11,12]]
    map = dict()
    for list in listOfList:
        key = list[0]
        if key not in map:
            map[key] = list[1:]
    print(map)
# convertListOfList() # Uncomment to run Q7

# Q8: Sort the dictonary by key
import collections
def dictSort():
    map = {5:3, 4:2, 1:7}
    for i in sorted(map.keys()):
        print(i, map[i])
    newMap = collections.OrderedDict(sorted(map.items()))  # another way
    print(newMap)

# dictSort() # Uncomment to run Q8

# list = [1,2,3,4,5]
# print(list[0::2])

