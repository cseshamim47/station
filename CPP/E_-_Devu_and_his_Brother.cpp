#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

int f(vector<int> &a, vector<int> &b, int k)
{
    int cnt = 0;
    for(int i = 0; i < a.size(); i++)
    {
        if(a[i] < k)
        {
            cnt += (k-a[i]);
        }
    }
    for(int i = 0; i < b.size(); i++)
    {
        if(b[i] > k)
        {
            cnt += (b[i]-k);
        }
    }

    return cnt;
}

void solve()
{
    int n,m;
    cin >> n >> m;
    vector<int> a,b;
    int x;

    for(int i = 0; i < n; i++)
    {
        cin >> x;
        a.push_back(x);
    }

    for(int i = 0; i < m; i++)
    {
        cin >> x;
        b.push_back(x);
    }
    
    int lo = 0,hi = 10;

    while(lo < hi)
    {
        int m1 = lo + (hi-lo)/3;
        int m2 = hi - (hi-lo)/3;
        // cout << m1 << " -> " << f(a,b,m1) << endl;
        // cout << m2 << " -> " << f(a,b,m2) << endl;
        // cout << lo << " " << hi << endl;
        // getchar();
        if(f(a,b,m1) < f(a,b,m2))
        {
            hi = m2-1;
        }else
        {
            lo = m1+1;
        }
    }
    // cout << min(f(a,b,lo),f(a,b,hi)) << endl;
    cout << f(a,b,lo) << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    // bruteforce();
}