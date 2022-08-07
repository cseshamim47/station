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
    set<int> st;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    st.insert(arr[0]);
    int lastMax = arr[0];
    int cnt = 1;
    int ans = 1;
    int foundLastMax=true;
    for(int i = 1; i < n; i++)
    {
        if(arr[i] > lastMax)
        {
            if(cnt == lastMax) ans++;
            lastMax = arr[i];
            cnt++;
        }else cnt++;
    }
    cout << ans << endl;

    // cout << cnt << endl;
   
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}