#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int mx = 1;

void thanosSort(int* arr, int n)
{
    if(n==1) return;
    int cnt = 1;
    for(int i = 1; i < n; i++)
    {
        if(arr[i-1] <= arr[i]) 
        {
            cnt++;
            // cout << cnt << endl;
        }else
        {
            cnt = 1;
            break;
        }
    }
    // cout << mx << endl;
    mx = max(cnt,mx);
    thanosSort(arr,n/2);
    thanosSort(arr+n/2, n/2);
}

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];
    thanosSort(arr,n);
    cout << mx << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();    
}