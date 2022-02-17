#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,m;
    cin >> n >> m;
    int arr[n];
   
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    
    map<int,int> one,zero;
    
    for(int i = 0; i < n; i++)
    {
        int v = arr[i];
        for(int j = 0; j < m; j++)
        {
            if(v&1) one[j]++;
            else zero[j]++;

            v = (v>>1);
        }
    }
    int ans = 0;
    for(int i = 0; i < m; i++)
    {
        if(one[i] > zero[i]) ans+=pow(2,i);
    }
    cout << ans << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}