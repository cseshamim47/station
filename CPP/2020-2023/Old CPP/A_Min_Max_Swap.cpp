#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int a[n];
    int b[n];

    for (int i = 0; i < n; i++)
    {
        cin >> a[i];
    }

    for (int i = 0; i < n; i++)
    {
        cin >> b[i];
    }

    for (int i = 0; i < n; i++)
    {
        if(a[i]<b[i]) swap(a[i],b[i]);
    }

    int y = *max_element(a,a+n);    
    int x = *max_element(b,b+n);   

    cout << x*y << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
}