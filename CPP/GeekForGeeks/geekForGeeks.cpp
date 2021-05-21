#include <bits/stdc++.h>
using namespace std;

int main()
{
    int size, *p;
    scanf("%d",&size);

    p = new int[size];

    for(int i = 0; i < size; i++){
        scanf("%d", &p[i]);
    }

    for(int i = 0; i < size; i++) printf("%d ", p[i]);

    // scanf("%d",&size);

    // p = new int[size];

    for(int i = 3; i < size+2; i++){
        scanf("%d", &p[i]);
    }

    for(int i = 0; i < size; i++) printf("%d ", p[i]);
}