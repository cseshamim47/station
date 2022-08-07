#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int Case;
void solve()
{
    int n,q; 
    cin >> n >> q;
    int arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];

    // q++;
    cout << "Case " << ++Case << ":" << "\n";
    while(q--)
    {
        int l,r;
        cin >> l >> r;
        if(l>r) swap(l,r);
        int mx = r-l+1;
        if(mx > 1000)
        {
            cout << 0 << "\n";
            continue;
        }
        vector<int> v;
        for(int i = l; i <= r; i++) v.push_back(arr[i]);
        sort(v.begin(),v.end());
        int mini = 100000;
        for(int i = 1; i < v.size(); i++)
        {
            mini = min(mini,v[i] - v[i-1]);
        }
        cout << mini << "\n";
    }
}

int32_t main()
{
      //        Bismillah
    ios::sync_with_stdio(false);
    cin.tie(NULL);
    w(t)
    
}