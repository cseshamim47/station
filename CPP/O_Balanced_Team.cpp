#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    int ans = 1;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        // if(i != 0 && abs(arr[i] - arr[i-1]) <=5) cnt++;
    }
    sort(arr,arr+n);
    int tmp = 1;
    int size = arr[n-1];
    int idx = 0;
    for(int i = 0; i < n; i++)
    {
        int sum = arr[i]+5;
        int ub = upper_bound(arr,arr+n,sum)-(arr+i);
        ans = max(ub,ans);   
    }
    // ans = max(ans,tmp);
    cout << ans << endl;
}

int main()
{
      //        Bismillah
    // w(t)
    solve();
}

