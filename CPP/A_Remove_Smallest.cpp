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
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    sort(arr,arr+n);
    int cnt = 0;
    for(int i = 1; i < n; i++)
    {
        if(arr[i]-arr[i-1] > 1) cnt++;
    }
    if(!cnt) cout << "YES" << endl;
    else cout << "NO" << endl;
}

int main()
{
      //        Bismillah
    w(t)
    
}