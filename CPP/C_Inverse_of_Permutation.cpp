#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    n++;
    int arr[n],ans[n];
    for(int i = 1; i < n; i++)
    {
        cin >> arr[i];
        ans[arr[i]] = i;
    }
    for(int i = 1; i < n; i++)
    {
        cout << ans[i] << " ";
    }
    cout << "\n";
}

int main()
{
      //        Bismillah
    // w(t)
    solve();    
}