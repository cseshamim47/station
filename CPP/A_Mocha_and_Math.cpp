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
    ll n;
    cin>>n;
    int a[n];
    for(int i=0;i<n;i++)
    {
      cin>>a[i];
    }
    int ans = a[0];
    for(int i=1;i<n;i++)
    {
     ans = ans&a[i];
    }

    cout<<ans<<'\n';
}

int main()
{
      //        Bismillah
    int t;   cin >> t;   w(t);
    

}