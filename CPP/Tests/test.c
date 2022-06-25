#include <stdio.h>
#include <math.h>


void leftShift(int m, int n)
{
    int ans = (m<<n);
    printf("%d\n",ans);
    /* 
        m = 5;
        n = 2;
        binary representation of 
        m = 5 = 000101
        left shift 1st time 001010 ---> 10
        left shift 2nd time 010100 -> 20  

        it's becoming double in each left shift.
    */
   
}

void rightShift(int m, int n)
{
    int ans = (m>>n);
    printf("%d\n",ans);
    /* 
        m = 20;
        n = 2;
        binary representation of 
        m = 20 = 010100
        right shift 1st time 001010 ---> 10
        right shift 2nd time 000101 ---> 5

        it's becoming half in each right shift.
    */
   
}

int main()
{
    int m,n;
    scanf("%d %d",&m,&n);
    leftShift(m,n);
    rightShift(m,n);
}