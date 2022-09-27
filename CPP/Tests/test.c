#include <stdio.h>
#include <math.h>

int main()
{

    int n;
    scanf("%d",&n);

    if(n%2 != 0) printf("Either\n");
    else if((n/2)%2 == 0) printf("Even\n");
    else printf("Odd\n");

        
}