#include<iostream>
#include<cstdio>
#include<cmath>
using namespace std;

int main()
{
    int n, m, i;
    scanf("%d%d", &n, &m);
        i=1;
        while(1)
        {
             if(m<i)
             {
                 break;
             }
             m = m-i;
             if(i==n)
             {
                 i=0;
             }
             i++;
        }
        printf("%d\n", m);
    
}