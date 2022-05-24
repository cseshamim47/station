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
    map<int,int> mp;
    int arr[n];
    for(int i = 0; i < n; i++) 
    {
        cin >> arr[i];
        mp[arr[i]]++;
    }

    for(int i = 0; i < n; i++) 
    {
        if(mp[arr[i]] == 1)
        {
            cout << i+1 << endl;
            return;
        }
    }
   

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}