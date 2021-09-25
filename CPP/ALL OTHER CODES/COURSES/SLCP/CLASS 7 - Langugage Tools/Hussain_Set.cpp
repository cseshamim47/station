#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,qq;
    cin >> n >> qq;
    int arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];
    sort(arr,arr+n);
    int i = 1;
    int ai = n-1;
    queue<int> q;
    while(qq--)
    {
        int x;
        cin >> x;
        int ans = 0;
        for(; i <= x; i++)
        {
            if(ai >= 0 && (q.empty() || arr[ai] >= q.front()))
            {
                ans = arr[ai];
                ai--;
            }
            else
            {
                ans = q.front();
                q.pop();
            }
            q.push(ans/2);
        }
        cout << ans << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // w(t)
    solve();
    
}

// 8 5 3 1
// 1 3 5 8

// Q = 1 2 1
// 1
// 2
// 3
// 4
// 6
// 8