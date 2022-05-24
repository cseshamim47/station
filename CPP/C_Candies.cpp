#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int f(int n, int eat)
{
    int ans = 0;
    while(n >= 10 && n >= eat)
    {
        ans += eat;
        n-=eat;
        if(n >= 10)
        n -= (n/10);
    }
    if(n > 0)
    ans+=n;
    return ans;
}

void solve()
{
    int n;
    cin >> n;
    int l = 1;
    int h = 1e18;
    int k = (n+1)/2;
    while(l < h)
    {
        int mid = l+(h-l)/2;
        if(f(n,mid) < k)
        {
            l = mid + 1;
        }
        else 
        {
            h = mid;
        }
    }
    cout << h << endl;
}

int32_t main()
{
    solve();
}