#include <stdio.h>
#include <string.h>

int main()
{
    char s1[80], s2[80];
    gets(s1);    
    gets(s2);

    printf("lengths: %d %d\n",strlen(s1),strlen(s2));

    if(!strcmp(s1,s2)) printf("The strings are equal\n");

    strcat(s1,s2);
    strcpy(s2,"hello ");

    strcat(s2,s1);
    printf(s2);

    return 0;    
}


// 20-44221-3
x[4][1];
x[20][10];
0 4 8 12 
36

1000 + 4 * (4*10 + 1)

1000 + 160 + 1

1000+164 = 1164

1665
// 5
// 2 1 5 4 3

0 4 8 12 16 20 24 28 32 36