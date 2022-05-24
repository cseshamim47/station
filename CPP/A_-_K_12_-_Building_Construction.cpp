#include <bits/stdc++.h>
using namespace std;

#define sq(x)   (x)*(x)
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void bruteforce()
{
    // int n = 5;
    // int arr[5] = {1,2,3,4,5};
    // int c[5] = {10,4,2,5,1};
    // int ans = INT_MAX;

    // for(int i = 0; i < n; i++)
    // {
    //     int cost = 0;
    //     for(int j = 0; j < n; j++)
    //     {
    //         cost += abs(arr[j].first - arr[i].first)*arr[j].second;   
    //     }
    //     ans = min(ans,cost);
    // }
    // cout << ans << endl;
}

int f(vector<pair<int,int>> arr, int i)
{
    int cost = 0;
    for(int j = 0; j < arr.size(); j++)
    {
        cost += abs(arr[j].first - arr[i].first)*arr[j].second;   
    }
    return cost;
}

void solve()
{
    int n;
    cin >> n;
    vector<pair<int,int>> p;

    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        p.push_back({x,0});
    }
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        p[i].second = x;
    }

    sort(all(p));

    int l = 0;
    int r = n-1;
    int ans = 0;
    while(l <= r)
    {
        int m1 = l+(r-l)/3;
        int m2 = r-(r-l)/3;
        int c1 = f(p,m1);
        int c2 = f(p,m2);
        if(c1 < c2)
        {
            r = m2-1;
        }else if(c1 > c2)
        {
            l = m1+1;
        }else
        {
            r = m2-1;
            l = m1+1;
        }
        ans = c1;
    }
    // for(auto x : p) cout << x.first << " " << x.second << endl;
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
    // bruteforce();
}