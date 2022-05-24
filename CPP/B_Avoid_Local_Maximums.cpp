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
    int track[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];     
        track[i] = arr[i];   
    }

    int cnt = 0;
    for(int i = 1; i+1<n; i++)
    {
        if(arr[i] > arr[i-1] && arr[i] > arr[i+1])
        {
            if(track[i-1] == arr[i-1])
            {
                arr[i+1] = arr[i];
            }else
            {
                arr[i-1] = arr[i];
                cnt--;
            }
            cnt++;
        }
    }
    cout << cnt << endl;
    for(auto x : arr) cout << x << " ";
    cout << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}