#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int f(vector<int> &v, int dist)
{
    int days = 1, cur = 0;
    for(int i = 0; i < v.size(); i++)
    {
        if(cur+v[i] <= dist)
        {
            cur += v[i];
        }
        else if(v[i] > dist) return INT_MAX;
        else 
        {
            days++;
            cur = v[i];
        }
    }
    return days;
}

int Case;
void solve()
{
    int n,k;
    cin >> n >> k;
    n++; k++;
    vector<int> v;
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        v.push_back(x);
    }

    int l = 0;
    int r = 1e7;

    while(l < r)
    {
        int mid = (l+r)/2;
        if(f(v,mid) <= k)
        {
            r = mid;
        }else
        {
            l = mid+1;
        }
    }
    int cur = 0;
    cout << "Case " << ++Case << ": " << r << endl;
    int cnt = 1;
    for(int i = 0; i < n; i++)
    {
        if(cur+v[i] <= r && n-i-1>=k-cnt)
        {
            cur += v[i];
        }else
        {
            cout << cur << endl;
            cur = v[i];
            cnt++;
        }
    }
    cout << cur << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}