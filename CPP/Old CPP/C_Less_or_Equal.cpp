#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
const int MAX = 1e9;

void f()
{}

int Case;
void solve()
{
    int n, k;
    cin >> n >> k;
    int arr[n];
    for(int i = 0; i < n; i++) cin >> arr[i];
    sort(arr,arr+n);

    if(k == 0)
    {
        if(arr[0] > 1)
        {
            cout << 1 << endl;
        }else cout << -1 << endl;
        return;
    }
    if(k == n && arr[n-1] <= MAX)
    {
        cout << MAX << endl;       
        return;
    }

    if(k != n && arr[k-1] < arr[k])
    {
        cout << arr[k-1] << endl;
    }
    else 
    cout << -1 << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //f();
}