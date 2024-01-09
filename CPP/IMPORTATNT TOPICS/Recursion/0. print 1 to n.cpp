#include <bits/stdc++.h>
using namespace std;

void print(int n)
{
    if(n == 0) return;
    cout << n << endl;
    print(n-1);
}

void printBackTrack(int i, int n)
{
    if(i > n) return;
    printBackTrack(i+1,n);
    cout << i << endl;
}
int main()
{
    //    Bismillah
    print(5);
    cout << "Backtracking : " << endl;
    printBackTrack(1,5);
}