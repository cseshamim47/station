#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    int r; 
    cin >> r;
    int cr = r%n;
    int cnt = 0;
    while(cnt != n)
    {
        cout << arr[cr] << " ";
        cr++; cnt++;
        cr = cr%n;
    }
    
}

int32_t main()
{
      //        Bismillah
    w(t)
    
}