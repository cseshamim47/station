#include <stdio.h>

int main()
{
    char id[] = "0123012300505050";
    int size = sizeof(id)-1;
    int sum = 0;
    for(int i = 0; i < size; i++)
    {
        if(id[i] != '0')
        {
            sum += id[i] - '0'; 
        }
    }
    printf("%d",sum);
}