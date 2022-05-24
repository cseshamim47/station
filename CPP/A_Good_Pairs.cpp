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
#define MAX 1000006

void f()
{}

int Case;
void solve()
{
    int n;
    cin >> n;
    int arr[n];
    int mn = INT_MAX;
    int mx = 0;
    int mnIdx = -1;
    int mxIdx = -1;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        if(mn > arr[i])
        {
            mn = arr[i];
            mnIdx = i+1;
        }
        if(mx < arr[i])
        {
            mx = arr[i];
            mxIdx = i+1;
        }
    }
    cout << mnIdx << " " << mxIdx << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //f();
}