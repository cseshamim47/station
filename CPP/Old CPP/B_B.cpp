//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
ll cnt;

int main()
{
      //        Bismillah
    int n;
    cin >> n;
    string str;
    cin >> str;
    for(int i = 1; i <= n; i++)
    {
        if(str[i-1] != '1') continue;
        if(i & 1)
        {
            cout << "Takahashi" << "\n";
        }
        else 
            cout << "Aoki" << "\n";
        break;
    }
}