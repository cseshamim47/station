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
    int arr[n+1];
    int cnt = 0;
    int f = -100;
    int l = -100;
    for(int i = 1; i <= n; i++)
    {
        cin >> arr[i];
        if(f==-100 && arr[i] == 0) f = i-1;
        if(arr[i] == 0) l = i+1;
    }
    
    cout << l-f << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}