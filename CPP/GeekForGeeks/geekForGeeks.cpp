#include <bits/stdc++.h>
using namespace std;

void fun(int *a)
{
    a = (int*)malloc(sizeof(int));
}
  
int main()
{
    int *p;
    fun(p);
    *p = 6;
    cout << *p;
    return 0;
}