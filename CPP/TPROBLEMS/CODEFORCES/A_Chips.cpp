//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){}

int main()
{
      
    int n,m;
    cin >> n >> m;
    int i = 1;
    while(i <= m){
        m -= i;
        if(i == n) i = 0;
        i++;
    }

    cout << m << endl;

}