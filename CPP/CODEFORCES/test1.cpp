#include <bits/stdc++.h>
using namespace std;
int BigProblem(int n)
{
    int Sum = 0;
    for (int i = 1; i <= n; i++)
    {
        if (i % 2 == 0)
        {
            Sum += i;
        }
        else
        {
            Sum += (i * 2);
        }
    }
    return Sum;
}

int main()
{
    int t,n;
    scanf("%d",&t);
    while(t--){
        scanf("%d",&n);
        int Sum = 0;
        if(n%2 == 0) Sum = (3*n*n) + (2*n);
        else Sum = (3*n*n) + (4*n) + 1;
        printf("%d\n",Sum/4);
    }
}
