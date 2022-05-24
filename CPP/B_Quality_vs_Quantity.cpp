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
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    sort(arr,arr+n);

    int b = arr[1]+arr[0];
    int r = arr[n-1];

    int l = 2;
    int e = n-2;

    if(b < r)
    {
        cout << "YES" << endl; 
        return;
    }

    int f = 0;
    while(l < e)
    {
        b += arr[l++];
        r += arr[e--];
        if(b < r)
        {
           f = 1;
           break;
        }
    }
    if(f == 1)  cout << "YES" << endl; 
    else
    cout << "NO" << endl;


}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}