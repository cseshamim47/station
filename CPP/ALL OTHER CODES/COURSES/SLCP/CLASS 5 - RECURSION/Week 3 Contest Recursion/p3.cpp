// Write a recursive function to calculate digits of a number.

#include <bits/stdc++.h>
using namespace std;

int digits(int n)
{
    if(n==0) return 0;
    digits(n/10);
    static int cnt = 0;
    cnt++;
    return cnt;   
}

int main()
{
    //    Bismillah
    int n;
    cin >> n;
    cout << digits(n) << endl;
}