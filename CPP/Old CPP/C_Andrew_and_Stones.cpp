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
    int arr[n];
    int one = 0;
    for(int i = 0; i < n; i++) 
    {
        cin >> arr[i];
       
        if(i != 0 && i != n-1)
        {
            if(arr[i]==1) one++;
        }
    }
    if((n==3 && arr[1]&1) || one == n-2) cout << -1 << endl;
    else
    {
        int cnt = 0;
        for(int i = 1; i < n-1; i++)
        {
            if(arr[i]%2==0)
            {
                cnt += (arr[i]/2);
            }
            else
            {
                cnt += (arr[i]+1)/2;
            }
        }
        cout << cnt << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}