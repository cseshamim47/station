//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve()
{
    int n, k;
    cin >> n >> k;
    int a[n],b[n];
    int sum = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> a[i];
        sum += a[i];
    }
    for(int i = 0; i < n; i++)
    {
        cin >> b[i];
    }
    if(k == 0) 
    {
        cout << sum << endl;
    }
    else
    {
        sort(a,a+n);
        sort(b,b+n,greater<int>());
        for(int i = 0; i < k; i++)
        {
            if(a[i] < b[i]) a[i] = b[i];
        }
        sum = accumulate(a,a+n,0);
        cout << sum << "\n";
    }
}

int main()
{
    int t;   cin >> t;   w(t);
}