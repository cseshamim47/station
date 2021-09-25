#include <stdio.h>



int main()
{
    int i,j;
    for(int i = 1; i < 6; i++)
    {
        for(j = 1; j < 4; j++)
        {
            printf("(%d %d), ",i,j);
            if(i % j == 0 && j%i == 0)
            {
                printf("(%d %d), ",i,j);
            }
        }
    }    
}

// 5
// 2 1 5 4 3