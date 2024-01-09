t = int(input())
while t>0:
    n = int(input())
    li = list(map(int,input().strip().split()))[:n]
    # li(map(int,input("\nEnter the numbers : ").strip().split()))[:n]
    sum = []
    totalsum = 0
    for i in range(0,n):
        if i == 0:
            sum.append(li[i])
        else:
            sum.append(sum[i-1]+li[i])
        totalsum += li[i]
        # print(li[i])

    flag = False
    for i in range(0,n-1):
        right = totalsum-sum[i]
        left = sum[i]
        if (right*left)%2 != 0:
            print("YES")
            flag = True
            break
    if flag == False:
        print("NO")
    li.clear()
    t-=1


    