// Print numbers from 1 to n in increasing order recursively.

#include <bits/stdc++.h>
using namespace std;
void print(int n)
{
    if(n == 0) return;
    print(n-1);
    cout << n << " ";
}
int main()
{
    //    Bismillah
    int n; 
    cin >> n;
    print(n);
}